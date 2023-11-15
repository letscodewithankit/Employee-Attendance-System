<?php

use Illuminate\Support\Facades\Route;

Route::get('/employee',[\App\Http\Controllers\EmployeeController\EmployeeLogin::class,'login_page'])->name('employee_login');

Route::get('/logout',[\App\Http\Controllers\EmployeeController\DashboardController::class,'logout'])->name('logout_employee');

Route::post('/employee/store',[\App\Http\Controllers\EmployeeController\EmployeeLogin::class,'store'])->name('employee_validate');

Route::get('/employee/dashboard',[\App\Http\Controllers\EmployeeController\DashboardController::class,'dashboard_page'])->name('employee_dashboard');

Route::get('/employee/dashboard/webcam/store/{id}', [\App\Http\Controllers\EmployeeController\DashboardController::class, 'webcame'])->name('webcam_page');


Route::post('/employee/dashboard/webcam/store/{id}', [\App\Http\Controllers\EmployeeController\DashboardController::class, 'store'])->name('webcam');

Route::get('/employee/dashboard/view',[\App\Http\Controllers\EmployeeController\DashboardController::class,'view'])->name('table');

Route::get('/employee/dashboard/profile/',[\App\Http\Controllers\EmployeeController\DashboardController::class,'profile'])->name('profile_view');

Route::post('/employee/dashboard/profile/store',[\App\Http\Controllers\EmployeeController\DashboardController::class,'profile_update'])->name('pro_update');
