<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceMapController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', [PlaceMapController::class,'index'])->name('frontpage');
Route::get('/place/data', 'DataController@places')->name('place.data'); // DATA TABLE CONTROLLER

Route::group(['middleware' => ['auth']], function () {
    Route::resource('places', 'PlaceController');
});
