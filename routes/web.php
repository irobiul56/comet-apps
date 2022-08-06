<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminPagecontroller;
use App\Http\Controllers\Admin\PermissionController;

//Admin Auth Routes
Route::group(['middleware' => 'admin.redirect'], function(){

Route::get('/admin-login', [AdminAuthController::class, 'showloginpage'])->name('admin.login.page');
Route::post('/admin-login', [AdminAuthController::class, 'login'])->name('admin.login');

});



//Admin page Routes
Route::group(['middleware' => 'admin'], function(){
    
    Route::get('/dashboard', [AdminPagecontroller::class, 'showDasPage'])->name('admin.Dasboard.page');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    //permissions routes

    Route::resource('/permission', PermissionController::class);

});