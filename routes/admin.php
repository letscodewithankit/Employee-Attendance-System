<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin',[\App\Http\Controllers\AdminController\AdminLoginController::class,'admin_login_page'])->name('admin');

Route::post('/admin/login',[\App\Http\Controllers\AdminController\AdminLoginController::class,'admin_login_authenticate'])->name('admin_login_check');

Route::get('/admin/dashboard',[\App\Http\Controllers\AdminController\DashboardController::class,'admin_dashboard'])->name('dashboardview');
