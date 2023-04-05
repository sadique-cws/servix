<?php

use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Storage; //This is for image upload, 


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
   
});


Route::controller(RequestController::class)->group(function () {
 
    Route::get('/requestForm','requestForm')->name('request.form');
    Route::post( '/requestForm', 'requestCreate')->name('request.create');
    
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
            Route::post("/staff/delete","delete")->name("admin.staff.delete");
            Route::get("/staff/edit/{id}","editStaff")->name('admin.staff.edit');
            Route::get("/staff/view/{id}","viewStaff")->name('admin.staff.view');
            Route::post("/staff/update/{id}","update")->name('admin.staff.update');
            Route::get('/logout', 'adminlogout')->name('admin.logout');
            Route::get('/staff/search',"search")->name('admin.staff.search');
            Route::get('/staff/status/{staff}',"status")->name('admin.staff.status');

        });
    });
});


Route::prefix("staff")->group(function () {
    Route::controller(StaffController::class)->group(function () {
        // without auth middleware 
        Route::match(["post", "get"], '/login', 'stafflogin')->name('staff.login');

        // with middle staff login required
        Route::middleware("auth:staff")->group(function () {
            Route::get('/request/all', [RequestController::class,'allRequests'])->name('request.all');
            Route::get('/', 'index')->name('staff.panel');
            Route::get('/logout', 'stafflogout')->name('staff.logout');
                
        });
    });
});





// This is route is for image upload.
Route::post('/upload', function (Illuminate\Http\Request $request) {
    $path = $request->file('image')->store('images', 's3');
    return back()
        ->with('success','Image uploaded successfully.')
        ->with('image',$path);
});

