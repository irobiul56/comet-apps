<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminPagecontroller;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Frontend\FrontendPageController;

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

    //Role Routes
    Route::resource('/role', RoleController::class);

     //Admin Routes
     Route::resource('/admin-user', AdminController::class);

     Route::get('/admin-user-status-update/{id}', [AdminController::class, 'adminStatus'])->name('admin.status.update');
     Route::get('/admin-user-trash-update/{id}', [AdminController::class, 'adminTrash'])->name('admin.trash.update');
     Route::get('/admin-trash-user', [AdminController::class, 'adminTrashUser'])->name('admin.trash.user');

});


// Rontend Routes
Route::get('/', [FrontendPageController::class, 'showhomepage'])->name('show.home.page');