<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pos\SupplierController;

require __DIR__.'/auth.php';

Route::controller(SupplierController::class)->group(function(){
    Route::middleware('authen')->group(function () {
        Route::get('supplier/all','SupplierAll')->name('supplier.all');
        Route::view('supplier/add','backend.supplier.supplier_add')->name('supplier.add');
        Route::post('supplier/store','SupplierStore')->name('supplier.store');
        Route::get('supplier/edit/{id}','SupplierEdit')->name('supplier.edit');

    });

});