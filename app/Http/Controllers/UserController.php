<?php

namespace App\Http\Controllers;

use App\Exports\postExport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function showUser()
    {
        return view('user.users', [
            'users' => User::latest()->filter(request(['name', 'email', 'fromDate', 'toDate']))->paginate(3)
        ]);
    }

    public function createPage()
    {
        return view('user.create');
    }

    public function createConfirmPage(Request $request)
    {
        $inputField = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:30'],
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
            'password_confirmation' => ['required'],
            'profile' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'type' => ['required'],
            'dob' => [],
            'address' => ['max:255'],
            'phone' => ['nullable', 'digits:11']
        ]);

        if ($request->hasFile('profile')) {
            $inputField['profile'] = $request->file('profile')->store('img', 'public');
        }

        return view('user.create-confirm', ['datas' => $inputField]);
    }

    public function create(Request $request)
    {
        $inputField = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'type' => $request['type'],
            'phone' => $request['phone'],
            'dob' => $request['dob'],
            'address' => $request['address'],
            'profile' => $request['profile'],
            'created_user_id' => Auth::user()->id ?? 1,
            'updated_user_id' => Auth::user()->id ?? 1,
        ];

        User::create($inputField);
        return redirect('/users')->with('message', 'New User Created Successfully!');
    }

    public function userDetailPage(User $id)
    {
        return view('user.user-detail', [
            'data' => $id
        ]);
    }

    public function userEditPage(User $id)
    {
        return view('user/edit', [
            'data' => $id
        ]);
    }

    public function userUpdate(Request $request, User $id)
    {
        $inputField = [
            'name' => $request['name'],
            'email' => $request['email'],
            'type' => $request['type'],
            'phone' => $request['phone'],
            'dob' => $request['dob'],
            'address' => $request['address'],
            'profile' => $request['profile'],
            'create_user_id' => Auth::user()->id ?? 1,
            'update_user_id' => Auth::user()->id ?? 1,
        ];

        if ($request->hasFile('profile')) {
            $inputField['profile'] = $request->file('profile')->store('img', 'public');
        }

        $id->update($inputField);
        return redirect('/users')->with('message', 'User Updated Successfully!');
    }

    public function destroy(User $id)
    {
        $id->delete();
        return redirect('/users')->with('message', 'User Deleted Successfully!');
    }
}
