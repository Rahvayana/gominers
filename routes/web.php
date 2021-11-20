<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OngkirController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
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
Route::get('/product/{slug}', [HomeController::class, 'detailProduct'])->name('product.detail');
Route::post('/add-product-cart', [HomeController::class, 'addCart'])->name('product.add-cart');
Route::post('/order', [CustomerController::class, 'order'])->name('product.order');






Route::prefix('user')->group(function () {
    Route::get('/login', [CustomerController::class, 'login'])->name('frn.customer.login-view');
    Route::post('/login', [CustomerController::class, 'handleLogin'])->name('frn.customer.login-process');
    Route::get('/register', [CustomerController::class, 'register'])->name('frn.customer.register-view');
    Route::post('/register', [CustomerController::class, 'handleRegister'])->name('frn.customer.register-process');
    Route::get('/forgot-password', [CustomerController::class, 'forgot'])->name('frn.customer.forgot-view');
    Route::post('/forgot-password', [CustomerController::class, 'handleForgot'])->name('frn.customer.forgot-process');
    Route::post('/forgot-password/{id}', [CustomerController::class, 'changePassword'])->name('frn.customer.change-password');
    Route::get('/logout', [CustomerController::class, 'logout'])->name('frn.customer.logout');
    Route::get('/dashboard-profile', [CustomerController::class, 'detail'])->name('frn.customer.detail');
    Route::get('/dashboard-shop', [CustomerController::class, 'shop'])->name('frn.customer.shop');
    Route::post('/update-profile', [CustomerController::class, 'update'])->name('frn.customer.update');
    Route::post('/upgrade-profile', [CustomerController::class, 'upgrade'])->name('frn.customer.upgrade');
    Route::get('/add-product', [CustomerController::class, 'addProduct'])->name('frn.customer.shop-add');
    Route::post('/save-product', [CustomerController::class, 'saveProduct'])->name('frn.customer.shop-save');
    Route::get('/checkout', [CustomerController::class, 'checkout'])->name('frn.customer.checkout');
    Route::post('/delete-cart', [CustomerController::class, 'deleteCart'])->name('frn.customer.delete-cart');
    Route::post('/process-cart', [CustomerController::class, 'processCart'])->name('frn.customer.process-cart');
    Route::post('/update-shop', [CustomerController::class, 'updateShop'])->name('frn.customer.update-shop');
    
});
//Email Verification
Route::post('/email/resend', [CustomerController::class, 'resend'])->name('verification.resend');
Route::get('/email/verify/{email}', [CustomerController::class, 'verify'])->name('verification.verify');
Route::get('/email/forgot/{email}', [CustomerController::class, 'forgotPassword'])->name('forgotpassword-view');
Route::get('/kota/{id}', [CustomerController::class, 'kota'])->name('kota');
Route::post('/otp-verification/', [CustomerController::class, 'otpSend'])->name('otp-sent');
Route::post('/otp-verify/', [CustomerController::class, 'otpVerif'])->name('otp-verify');

//Raja Ongkir
Route::get('/provinsi', [OngkirController::class, 'provinsi']);
Route::get('/provinsi/{id}', [OngkirController::class, 'kota']);
Route::post('/cost/', [OngkirController::class, 'cost']);


Route::prefix('admin')->group(function () {
    Auth::routes();
    Route::get('/', [DashboardController::class, 'index'])->name('bcn.dashboard.index');
    
    //Customer
    Route::get('/customers', [UserController::class, 'index'])->name('bcn.customer.index');
    Route::get('/customers-verify', [UserController::class, 'verify_user'])->name('bcn.customer.verify-user');
    Route::get('/customers/{id}', [UserController::class, 'detail'])->name('bcn.customer.detail');
    Route::get('/customers/verify/{id}', [UserController::class, 'detailVerify'])->name('bcn.customer.verify-detail');
    Route::post('/customers/verify/{id}', [UserController::class, 'processVerify'])->name('bcn.customer.verify-process');

    //Posts
    Route::get('/posts', [BlogController::class, 'blog'])->name('bcn.post.blog');
    Route::get('/add-blog', [BlogController::class, 'addBlog'])->name('bcn.post.add-blog');
    Route::post('/add-blog-image', [BlogController::class, 'imageUpload'])->name('cms.blog.image.upload');
    Route::post('/save-blog', [BlogController::class, 'storeBlog'])->name('bcn.post.store-blog');
    Route::get('/videos', [BlogController::class, 'video'])->name('bcn.post.video');
    Route::post('/save-video', [BlogController::class, 'storeVideo'])->name('bcn.post.store-video');
    

    //Products
    Route::get('/products', [ProductController::class, 'index'])->name('bcn.post.product');

    //Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('bcn.setting.index');
    Route::post('/save-rajaongkir', [SettingController::class, 'saveRajaongkir'])->name('bcn.setting.save-rajaongkir');
    Route::post('/save-midtrans', [SettingController::class, 'saveMidtrans'])->name('bcn.setting.save-midtrans');

});

