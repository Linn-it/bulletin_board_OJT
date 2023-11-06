<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $inputField = $request->validate([
            'name' => ['required', 'min:3', 'max:30'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => 'required',
        ]);

        $inputField['created_user_id'] = Auth::user()->id ?? 1;
        $inputField['updated_user_id'] = Auth::user()->id ?? 1;

        $registerUser = User::create($inputField);

        auth()->login($registerUser);

        return redirect('/posts');
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $inputField = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($inputField, $request['remember'])) {
            $request->session()->regenerate();

            if (isset($request['remember'])) {
                setcookie('email', $request['email'], time() + 3600);
                setcookie('password', $request['password'], time() + 3600);
            } else {
                setcookie('email', '');
                setcookie('password', '');
            }

            return redirect('/posts');
        }

        return back()->withErrors(['email' => 'Invalid Crendentials'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function forgetPage()
    {
        return view('auth.forget-password');
    }

    public function forgetPassword(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        if (!empty($user)) {
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user, $token));
            return redirect('/forget-password')->with('message', 'Reset Password link send to your email!');
        } else {
            dd('Error email');
        }
    }

    public function resetPage($token)
    {
        return view('auth.reset-password', [
            'token' => $token
        ]);
    }

    public function resetPassword(Request $request)
    {
        $intputField = $request->validate([
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => 'required'
        ]);

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('/login');
    }

    public function changePasswordPage()
    {
        return view('auth.change-password');
    }

    public function changePassword(Request $request)
    {
        $inputField = $request->validate([
            'currentPassword' => ['required'],
            'newPassword' => ['required', 'min:6'],
            'password_confirmation' => ['required', 'same:newPassword']
        ]);
        $loginUser = Auth::user();

        // password matches
        if (!Hash::check($request['currentPassword'], $loginUser['password'])) {
            return back()->withErrors(['currentPassword' => 'CurrentPassword is wrong!'])->onlyInput('currentPassword');
        }

        // current password and new Password same
        if (strcmp($request['currentPassword'], $request['newPassword']) == 0) {
            return back()->withErrors(["newPassword" => "New Password cannot be same as your current password."])->onlyInput('newPassword');
        }

        $user = User::find($loginUser['id']);
        $user['password'] = Hash::make($request['newPassword']);
        $user->save();
        return redirect('/users')->with('message', 'Changed Password Successfully!');
    }
}
