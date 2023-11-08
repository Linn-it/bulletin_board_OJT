<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

// Auth
Route::get('/register', [AuthController::class, 'registerPage'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/forget-password', [AuthController::class, 'forgetPage'])->middleware('guest');
Route::post('/forget-password', [AuthController::class, 'forgetPassword']);

Route::get('/login', [AuthController::class, 'loginPage'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/reset-password/{token}', [AuthController::class, 'resetPage'])->middleware('guest');
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/change-password', [AuthController::class, 'changePasswordPage']);
Route::post('/change-password', [AuthController::class, 'changePassword']);


// Posts
Route::get('/posts', [PostController::class, 'showPost'])->middleware('auth');

Route::get('/post/create', [PostController::class, 'createPage'])->middleware('auth');

Route::post('/create-confirm', [PostController::class, 'createConfirmPage']);

Route::post('/post/create', [PostController::class, 'create']);

Route::get('/post/edit/{id}', [PostController::class, 'editPage'])->middleware('auth');

Route::post('/edit-confirm/{id}', [PostController::class, 'editConfirmPage']);

Route::put('/post-update/{id}', [PostController::class, 'postUpdate']);

Route::get('post/detail/{id}', [PostController::class, 'postDetailPage'])->middleware('auth');

Route::delete('/post-delete/{id}', [PostController::class, 'destroy']);

Route::get('/posts/my-post', [PostController::class, 'showOwnPost']);


// Users
Route::get('/users', [UserController::class, "showUser"])->middleware(['auth', 'admin']);

Route::get('/user/create', [UserController::class, 'createPage'])->middleware('auth');

Route::post('/create/confirm', [UserController::class, 'createConfirmPage']);

Route::post('/user/create', [UserController::class, 'create']);

Route::get('/user-detail/{id}', [UserController::class, 'userDetailPage'])->middleware('auth');

Route::get('/user/edit/{id}', [UserController::class, 'userEditPage'])->middleware('auth');

Route::put('/user/edit/{id}', [UserController::class, 'userUpdate']);

Route::delete('/user-delete/{id}', [UserController::class, 'destroy']);

// Export & Import
Route::get('/post_export', [PostController::class, 'getPostData'])->name('post_export');

Route::get('/my-post/post_export', [PostController::class, 'getOwnPostData'])->name('my-post/post_export');

Route::get('/post_import', [PostController::class, 'showImport']);

Route::post('/import_post', [PostController::class, 'importExcel']);
