<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('modules.dashboard.index');
    });

    Route::get('/forbidden', function () {
        return view('modules.forbidden.forbidden_area');
    });
    
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store/{user?}', [UserController::class, 'store'])->name('user.store');
    // Route::post('/users/{user}/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/users/{user}/edit',[UserController::class, 'edit'])->name('user.edit');
    Route::get('/user/delete-{user}',[UserController::class, 'delete'])->name('user.delete');

});

Route::get('/', function () {
    return redirect()->to('/admin');
});

// Auth Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login/post', [LoginController::class, 'login'])->name('login.post');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');