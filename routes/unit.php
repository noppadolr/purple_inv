<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pos\UnitController;

require __DIR__.'/auth.php';

Route::controller(UnitController::class)->group(function(){
    Route::middleware('authen')->group(function () {
        Route::get('unit/all','UnitAll')->name('unit.all');
        Route::get('unit/create','Create')->name('unit.create');
        Route::post('unit/store','Store')->name('unit.store');
        Route::get('unit/edit/{id}','edit')->name('unit.edit');
        Route::post('unit/update','update')->name('unit.update');
        Route::get('unit/delete/{id}', 'destroy')->name('unit.delete');


    });

});