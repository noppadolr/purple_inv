<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pos\ProductController;
use App\Models\Product;


require __DIR__.'/auth.php';


Route::controller(ProductController::class)
->prefix('product')
->as('.product')
->middleware('authen')
->group(function () {
    Route::get('/all', 'index')->name('all');
    // Route::get('/create', 'create')->name('create');
    // Route::post('/store', 'store')->name('store');
    // Route::get('/delete/{id}', 'destroy')->name('delete');
    // Route::get('/edit/{id}','edit')->name('edit');
    // Route::post('/update','update')->name('update');
    

});