<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pos\CustomerController;
use App\Models\Customer;


require __DIR__.'/auth.php';



Route::group(['prefix'=>'customer','as'=>'customer.'], function(){
    Route::get('/', 'AccountController@index')->name('index');

});


Route::controller(CustomerController::class)
->prefix('customer')
->as('customer.')
->middleware('authen')
->group(function () {
    Route::get('/all', 'index')->name('all');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/delete/{id}', 'destroy')->name('delete');
    Route::get('/edit/{id}','edit')->name('edit');
    Route::post('/update','update')->name('update');
    

});
