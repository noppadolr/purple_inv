<?php


use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\Pos\CategoryController;


require __DIR__.'/auth.php';

Route::controller(CategoryController::class)->group(function(){
    Route::middleware('authen')->group(function () {
        Route::get('category/all','CategoryAll')->name('category.all');
        Route::view('category/add','backend.category.category_add')->name('category.add');
        Route::post('category/store','Store')->name('category.store');
        Route::get('category/edit/{id}','edit')->name('category.edit');
        Route::post('category/update','update')->name('category.update');
        Route::get('category/delete/{id}', 'delete')->name('category.delete');
        // Route::get('supplier/view/{id}','view')->name('supplier.view');

    });

});