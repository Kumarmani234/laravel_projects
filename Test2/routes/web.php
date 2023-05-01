<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postscontroller;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\studentController;

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
  
Route::get('/', function (){
    return view('welcome');
});

Route::get('Kumar',function(){
    return view('Kumar');
});

//Route to srting,Route to view and Route to controller to view.
Route::get('/mani',function(){
    return view('mani');
})->name('ARoute')->middleware('ChecksalaryMW');

Route::get('/Contactus',function(){
    return view('Contactus');
})->name('CRoute');



Route::get('/',[Homecontroller::class,'home'])
->name('home.index');
Route::get('/contacts',[Homecontroller::class,'cont'])
->name('home.contacts');




//Getting the object of array by using fake API
Route::controller(postscontroller::class)->group(function () {
        Route::get('/posts', 'getAllPost');
        // Route::post('/posts/store', 'store');
        // Route::put('/posts/update', 'update');
        // Route::delete('/posts/delete', 'delete');
        Route::get('/posts/{id}', 'getById');
});


Route::resource('students', studentController::class);




Route::get('alert',function() {
    return view ('components.alert');
});


Route::get('anonymouscalling',function() {
    return view ('components.anonymouscalling');
});









