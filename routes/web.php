<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.masterPage');
});
Route::get('/login', function () {
    return view('admin.login');
});
Route::get('/register', function () {
    return view('admin.register');
});
Route::post('/register-submit',[adminController::class,'register']);
Route::post('/login-submit',[adminController::class,'login']);
