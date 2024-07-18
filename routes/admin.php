<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;

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

//Auth::routes([
////    'verify' => true
//]);

Route::prefix('admin')->as('admin.')->group(function () {
//    Route::prefix('catalogues')->as('catalogues.')->group(function() {
//        Route::get('/',             [CatalogueController::class,'index'])->name('index');
//        Route::get('create',        [CatalogueController::class,'create'])->name('create');
//        Route::post('store',        [CatalogueController::class,'store'])->name('store');
//        Route::get('show/{id}',     [CatalogueController::class,'show'])->name('show');
//        Route::get('{id}/edit',     [CatalogueController::class,'edit'])->name('edit');
//        Route::put('{id}/update',   [CatalogueController::class,'update'])->name('update');
//        Route::delete('{id}/destroy', [CatalogueController::class,'destroy'])->name('destroy');
//    });
    Route::get('/', function () {return view('admin.dashboard');})->name('dashboard');
    Route::resource('products',     ProductController::class);
    Route::resource('categories',   CategoryController::class);
    Route::resource('brands', BrandController::class);
});
