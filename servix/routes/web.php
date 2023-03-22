<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
});


Route::prefix("admin")->group(function () {
    Route::controller(AdminController::class)->group(function () {
        //without auth middleware
        Route::match(["post", "get"], '/login', 'adminlogin')->name('admin.login');

        // routes with middleware
        Route::middleware('auth:admin')->group(function () {
            Route::get('/', 'index')->name('admin.panel');
            Route::get("/staff/manage","manageStaff")->name("admin.staff.manage");
            Route::get("/staff/create","insertStaff")->name("admin.staff.create");
            Route::post("/staff/create","staffUpload")->name("admin.staff.store");
            Route::post("/staff/destroy","deleteStaff")->name("admin.staff.delete");
            Route::post("/staff/edit","editStaff")->name("admin.staff.edit");
            Route::get('/logout', 'adminlogout')->name('admin.logout');

        });
    });
});


Route::prefix("staff")->group(function () {
    Route::controller(StaffController::class)->group(function () {
        // without auth middleware 
        Route::match(["post", "get"], '/login', 'staffLogin')->name('staff.login');

        // with middle staff login required
        Route::middleware("auth:staff")->group(function () {
            Route::get('/requestForm', 'requestForm')->name('request.form');
            Route::get('/', 'index')->name('staff.panel');
        });
    });
});

Route::get('/staff/requestForm', [StaffController::class, 'requestForm'])->name('request.form');
Route::get('/staff/panel',[StaffController::class, 'staffpanel'])->name('staff.panel');