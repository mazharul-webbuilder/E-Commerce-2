<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryContoller;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;

//Front-Routes

Route::get('/', [EcommerceController::class, 'index'])->name('home');
Route::get('/product-by-category/{id}', [EcommerceController::class, 'categoryProduct'])->name('category.grid');
Route::get('/productdetail/{id}', [EcommerceController::class, 'detail'])->name('detail.product');
Route::get('/product-by-subcategory/{id}', [EcommerceController::class, 'subcategoryProduct'])->name('product.by.subcategory');

Route::post('/cart/{id}', [CartController::class, 'cart'])->name('cart.product');
Route::get('/cart-products', [CartController::class, 'cartProduct'])->name('showcart');
Route::get('/cart-product-remove/{id}', [CartController::class, 'remove'])->name('cart.product.remove');
Route::post('/update-cart/{id}', [CartController::class, 'update'])->name('cart.update');

Route:: get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route:: post('/checkout', [CheckoutController::class, 'checkout'])->name('customer.checkout');

Route:: get('/customer-dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard')->middleware('customer2');
Route:: get('/customer-register', [CustomerController::class, 'register'])->name('customer.register')->middleware('customer');
Route:: post('/customer-new', [CustomerController::class, 'create'])->name('customer.new')->middleware('customer');
Route:: get('/customer-login', [CustomerController::class, 'login'])->name('customer.login')->middleware('customer');
Route:: post('/customer-login-check', [CustomerController::class, 'loginCheck'])->name('customer.login.check');
Route:: get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');





Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route:: get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route:: get('/add-category', [CategoryContoller::class, 'add'])->name('category.add');
    Route:: post('/create-category', [CategoryContoller::class, 'create'])->name('category.create');
    Route:: get('/create-edit/{id}', [CategoryContoller::class, 'edit'])->name('category.edit');
    Route:: post('/create-update/{id}', [CategoryContoller::class, 'update'])->name('category.update');
    Route:: post('/create-update/{id}', [CategoryContoller::class, 'delete'])->name('category.delete');
    Route:: get('/manage-category', [CategoryContoller::class, 'manage'])->name('category.manage');

    Route:: get('/add-subcategory', [SubCategoryController::class, 'add'])->name('subcategory.add');
    Route:: post('/create-subcategory', [SubCategoryController::class, 'create'])->name('subcategory.create');
    Route:: get('/edit-subcategory/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route:: post('/update-subcategory/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route:: post('/delete-subcategory/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
    Route:: get('/manage-subcategory', [SubCategoryController::class, 'manage'])->name('subcategory.manage');

    Route:: get('/add-brand', [BrandController::class, 'add'])->name('brand.add');
    Route:: post('/add-brand', [BrandController::class, 'create'])->name('brand.create');
    Route:: get('/edit-brand/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route:: post('/update-brand/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route:: post('/delete-brand/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    Route:: get('/manage-brand', [BrandController::class, 'manage'])->name('brand.manage');

    Route:: get('/add-unit', [UnitController::class, 'add'])->name('unit.add');
    Route:: post('/create-unit', [UnitController::class, 'create'])->name('unit.create');
    Route:: get('/edit-unit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route:: post('/update-unit/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route:: post('/delete-unit/{id}', [UnitController::class, 'delete'])->name('unit.delete');
    Route:: get('/manage-unit', [UnitController::class, 'manage'])->name('unit.manage');

    Route:: get('/add-product', [ProductController::class, 'add'])->name('product.add');
    Route:: get('/detail-product/{id}', [ProductController::class, 'detail'])->name('product.detail.admin');
    Route:: get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route:: post('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route:: post('/delete-product/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route:: post('/create-product', [ProductController::class, 'create'])->name('product.create');
    Route:: get('/get-product-sub-category-by-category-id', [ProductController::class, 'getProductSubCategory'])->name('product.subcategory');
    Route:: get('/manage-product', [ProductController::class, 'manage'])->name('product.manage');

    Route:: get('/manage-order', [OrderController::class, 'manage'])->name('order.manage');
    Route:: get('/detail-order/{id}', [OrderController::class, 'detail'])->name('order.detail');
    Route:: get('/edit-order/{id}', [OrderController::class, 'edit'])->name('order.edit');
    Route:: post('/update-order/{id}', [OrderController::class, 'update'])->name('order.update');
    Route:: post('/delete-order/{id}', [OrderController::class, 'delete'])->name('order.delete');
    Route:: get('/order-invoice/{id}', [OrderController::class, 'makeInvoice'])->name('order.invoice');
    Route:: get('/print-invoice/{id}', [OrderController::class, 'printInvoice'])->name('order.print');

    Route:: get('/add-user', [UserController::class, 'add'])->name('user.add');
    Route:: post('/add-user', [UserController::class, 'create'])->name('user.create');
    Route:: get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route:: post('/update-user/{id}', [UserController::class, 'update'])->name('user.update');
    Route:: post('/delete-user/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route:: get('/manage-user', [UserController::class, 'manage'])->name('user.manage');

    Route:: get('/add-setting', [SettingController::class, 'add'])->name('setting.add');
    Route:: post('/create-setting', [SettingController::class, 'create'])->name('setting.create');
    Route:: get('/edit-setting/{id}', [SettingController::class, 'edit'])->name('setting.edit');
    Route:: post('/edit-setting/{id}', [SettingController::class, 'update'])->name('setting.update');
    Route:: post('/delete-setting/{id}', [SettingController::class, 'delete'])->name('setting.delete');
    Route:: get('/manage-setting', [SettingController::class, 'manage'])->name('setting.manage');

});
