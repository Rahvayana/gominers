<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog/{slug}', [HomeController::class, 'detailBlog'])->name('blog.detail');


Route::prefix('user')->group(function () {
    Route::get('/login', [CustomerController::class, 'login'])->name('frn.customer.login-view');
    Route::post('/login', [CustomerController::class, 'handleLogin'])->name('frn.customer.login-process');
    Route::get('/register', [CustomerController::class, 'register'])->name('frn.customer.register-view');
    Route::post('/register', [CustomerController::class, 'handleRegister'])->name('frn.customer.register-process');
    Route::get('/forgot-password', [CustomerController::class, 'forgot'])->name('frn.customer.forgot-view');
    Route::post('/forgot-password', [CustomerController::class, 'handleForgot'])->name('frn.customer.forgot-process');
    Route::post('/forgot-password/{id}', [CustomerController::class, 'changePassword'])->name('frn.customer.change-password');
    Route::get('/logout', [CustomerController::class, 'logout'])->name('frn.customer.logout');
    Route::get('/dashboard', [CustomerController::class, 'detail'])->name('frn.customer.detail');
    Route::post('/update-profile', [CustomerController::class, 'update'])->name('frn.customer.update');
    
});
//Email Verification
Route::post('/email/resend', [CustomerController::class, 'resend'])->name('verification.resend');
Route::get('/email/verify/{email}', [CustomerController::class, 'verify'])->name('verification.verify');
Route::get('/email/forgot/{email}', [CustomerController::class, 'forgotPassword'])->name('forgotpassword-view');
Route::get('/kota/{id}', [CustomerController::class, 'kota'])->name('kota');


Route::prefix('admin')->group(function () {
    Auth::routes();
    Route::get('/', [DashboardController::class, 'index'])->name('bcn.dashboard.index');
    
    //Customer
    Route::get('/customers', [UserController::class, 'index'])->name('bcn.customer.index');

    //Posts
    Route::get('/blogs', [BlogController::class, 'blog'])->name('bcn.post.blog');
    Route::get('/add-blog', [BlogController::class, 'addBlog'])->name('bcn.post.add-blog');
    Route::post('/add-blog-image', [BlogController::class, 'imageUpload'])->name('cms.blog.image.upload');
    Route::post('/save-blog', [BlogController::class, 'storeBlog'])->name('bcn.post.store-blog');

});

