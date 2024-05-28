<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\categoryController;
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
});