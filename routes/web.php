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

Route::get('sercives','SercivesController@index');
Route::get('sercives/create','SercivesController@create');
Route::post('sercives','SercivesController@store');
Route::get('sercives/edit/{sercive}','SercivesController@edit');
Route::get('sercives/show/{sercive}','SercivesController@show');
Route::put('sercives/{sercive}','SercivesController@update');
Route::post('sercives/destroy/{sercive}','SercivesController@destroy');
