<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
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

Route::get('/home', function () {
    return view('home');
});
Route::get('/posts', [PostController::class, 'getPosts'])->name('posts.index');
// Admin Login Routes
Route::get('/admin/login', [AdminController::class, 'index']);
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::middleware(['auth', 'checkUserRole'])->group( function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
});
