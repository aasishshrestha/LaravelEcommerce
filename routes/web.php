<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
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

Route::get('/register', [AuthController::class, 'create'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.user');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.user');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.user');
Route::get('/403',function(){
    return view('user.pages.403');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

Route::post('/search',[HomeController::class, 'search'])->name('shop.search');

Route::get('/shop/{id}', [HomeController::class, 'show'])->name('show.product');
Route::get('/checkout/{id}', [HomeController::class, 'checkout'])->middleware('auth')->name('checkout');

Route::post('/payment', [PaymentController::class,'khaltiPayment'])->name('payment');
Route::get('/epayment/verify', [PaymentController::class,'verifyPayment']);
Route::get('/after/payment/{pidx}', [PaymentController::class,'paySuccess'])->name('pay.success');


Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/admin', function () {
        return view('dashboard.admin.index');
    });

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{slug}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/edit/{slug}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{slug}', [CategoryController::class, 'destroy'])->name('category.destroy');


    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/edit/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});
