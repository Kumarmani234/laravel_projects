<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('Admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/logout','destroy')->name('RLOGOUT');
    Route::get('/showprofile','showprofiledata')->name('SHOWPROFILE');
    Route::get('/editprofile','editprofiledata')->name('EDITPROFILE');
    Route::post('/updateprofile','updateprofiledata')->name('UPDATEPROFILE');
});


Route::controller(ProductsController::class)->group(function () {
    
    Route::get('showproducts', 'index')->middleware("auth")->name('SHOWPRODUCTS');
    Route::get('addproducts', 'create')->middleware("auth")->name('ADDPRODUCTS');
    Route::get('showcart', 'addedproducts')->middleware("auth")->name('SHOWCARTS');
    Route::post('storeproducts', 'store')->middleware("auth")->name('STOREPRODUCTS');
   
});

Route::post('/addcart/{id}', [ProductsController::class,'addcart']);

require __DIR__.'/auth.php';