<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
// Route::resource('/Admin/users','Admin\UsersController');
// ->middleware('can:manage-users')
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('users','UsersController');
});


Route::get('personnels','PersonnelsController@index');
Route::get('personnels/create','PersonnelsController@create');
Route::post('personnels','PersonnelsController@store');
Route::get('personnels/edit/{personnel}','PersonnelsController@edit');
Route::put('personnels/{personnel}','PersonnelsController@update');
Route::post('personnels/destroy/{personnel}','PersonnelsController@destroy');
