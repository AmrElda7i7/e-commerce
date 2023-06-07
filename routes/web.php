<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShoppingCartController;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\E_CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductDetailsController;

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

Route::get('/', [EcommerceController::class, 'home']);

Route::get('/checks', function () {

})->middleware('IsAdmin');

Auth::routes();
Route::middleware('auth')->group(function () {

    Route::get('/admin', [AdminController::class, 'home']);

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('account', function () {
        return view('e-commerce.account');
    });
    Route::resource('cart', ShoppingCartController::class);
    Route::patch('modifyQuantity/{id}', [ShoppingCartController::class, 'modifyQuantity'])->name('modifyQuantity');
    Route::get('credit', [PaymentController::class, 'credit'])->name('credit');
    Route::get('callback', [PaymentController::class, 'callback']);
    Route::resource('orders', OrderController::class);;
});
Route::get('E_categories/{id}', E_CategoryController::class)->name('E-categories');
Route::get('shop', ShopController::class)->name('shop');
Route::get('details/{id}', ProductDetailsController::class)->name('details');

Route::get('SignUp', function () {
    return view('e-commerce.login');
});
Route::get('search',[ProductController::class,'search'])->name('search');