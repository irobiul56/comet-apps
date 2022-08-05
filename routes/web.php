<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminPagecontroller;
use Illuminate\Support\Facades\Route;

//Admin Auth Routes

Route::get('/admin-login', [AdminAuthController::class, 'showloginpage'])->name('admin.login.page');
Route::post('/admin-login', [AdminAuthController::class, 'login'])->name('admin.login');

//Admin page Routes
Route::get('/dashboard', [AdminPagecontroller::class, 'showDasPage'])->name('admin.Dasboard.page');