<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.masterPage');
});
Route::get('/login', function () {
    return view('admin.login');
})->name('login');
Route::get('/register', function () {
    return view('admin.register');
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
    Route::get('admin/view-product',[productController::class,'viewProduct']);
    Route::get('admin/add-product',[productController::class,'addProduct']);
    Route::post('admin/addProductSubmit',[productController::class,'addProductSubmit']);
    Route::get('admin/edit-product',[productController::class,'editProduct']);
    Route::get('admin/purchase',[productController::class,'purchase']);
    Route::post('/admin/purchase-submit',[productController::class,'purchaseSubmit']);
});