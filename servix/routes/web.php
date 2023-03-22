<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AdminController;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
});


Route::prefix("admin")->group(function () {
    Route::controller(AdminController::class)->group(function () {
        //without auth middleware
        Route::match(["post", "get"], '/login', 'adminlogin')->name('admin.login');

        Route::middleware('auth:admin')->group(function () {
            Route::get('/', 'index')->name('admin.panel');
        });
    });
});


Route::prefix("staff")->group(function () {
    Route::controller(StaffController::class)->group(function () {
        // without auth middleware 
        Route::match(["post", "get"], '/login', 'staffLogin')->name('staff.login');

        // with middle staff login required
        // Route::middleware("auth")->group(function () {
            Route::get('/requestForm', 'requestForm')->name('request.form');
            Route::get('/', 'index')->name('staff.panel');
        // });
    });
});
