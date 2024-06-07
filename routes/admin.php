<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

require __DIR__.'/auth.php';


Route::controller(AdminController::class)->group(function(){

    Route::get('admin/login','AdminLoginPage')->name('admin.login');

    Route::middleware('authen')->group(function () {
        Route::get('admin/dashboard','AdminDashboard')->name('admin.dashboard');
        Route::get('admin/logout','AdminLogout')->name('admin.logout');
        Route::get('admin/profile','Profile')->name('admin.profile');
        Route::post('admin/profile/update','UpdateProfile')->name('admin.profile.update');
        Route::post('admin/password/update','UpdatePassword')->name('admin.password.update');
        
    });

});

