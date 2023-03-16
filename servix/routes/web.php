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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::match(["post","get"],'/admin/login', [HomeController::class, 'adminlogin'])->name('admin.login');
Route::get('/register', [HomeController::class, 'register'])->name('register');

Route::get('/admin/panel',[AdminController::class, 'adminpanel'])->name('admin.panel');

Route::match(["post","get"],'/staff/login', [StaffController::class, 'stafLogin'])->name('staf.login');
Route::get('/staff/requestForm', [StaffController::class, 'requestForm'])->name('request.form');
Route::get('/staff/panel',[StaffController::class, 'staffpanel'])->name('staff.panel');