<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\userPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
});
Route::get('/shop',[userPageController::class,'shop']);
Route::get('/login', function () {
    return view('admin.login');
})->name('login');
Route::get('/register', function () {
    return view('admin.register');
});
Route::get('/about', function () {
    return view('user.about');
});
Route::get('/user-login', function () {
    return view('user.login');
});
Route::get('/user-register', function () {
    return view('user.register');
});
Route::post('/register-submit',[adminController::class,'register']);
Route::post('/login-submit',[adminController::class,'login']);
Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[adminController::class,'dashboard']);
    Route::get('/admin/logout',[adminController::class,'logout']);
    Route::get('/admin/view-categories',[categoryController::class,'viewCategory']);
    Route::post('/admin/add-category',[categoryController::class,'addCategory']);
    Route::post('admin/edit-category',[categoryController::class,'editCategory']);
    Route::post('admin/delete-category',[categoryController::class,'deleteCategory']);
    Route::get('admin/stock',[productController::class,'stock']);
    Route::get('admin/view-product',[productController::class,'viewProduct']);
    Route::get('admin/add-product',[productController::class,'addProduct']);
    Route::post('admin/addProductSubmit',[productController::class,'addProductSubmit']);
    Route::get('admin/edit-product',[productController::class,'editProduct']);
    Route::get('admin/purchase',[productController::class,'purchase1']);
    Route::get('admin/purchase1',[productController::class,'purchase']);
    Route::post('/admin/purchase-submit',[productController::class,'purchaseSubmit']);
    Route::get('/admin/purchase-invoice',[productController::class,'purchaseInvoice']);
    Route::get('/admin/purchase-invoice/{id}',[productController::class,'purchaseInvoiceDetail']);
});