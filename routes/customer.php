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
    Route::get('/all', 'index')->name('index');

});