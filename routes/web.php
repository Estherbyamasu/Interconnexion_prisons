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
Route::get('provinces','ProvincesController@index');
Route::get('provinces/create','ProvincesController@create');
Route::post('provinces','ProvincesController@store');
Route::get('provinces/edit/{province}','ProvincesController@edit');
Route::get('provinces/show/{province}','ProvincesController@show');
Route::put('provinces/{province}','ProvincesController@update');
Route::post('provinces/destroy/{province}','ProvincesController@destroy');
// Route::resourse('provinces','ProvincesController');

Route::get('communes','CommunesController@index');
Route::get('communes/create','CommunesController@create');
Route::post('communes','CommunesController@store');
Route::get('communes/edit/{commune}','CommunesController@edit');
// Route::get('communes/show/{commune}','ProvincesController@show');
Route::put('communes/{commune}','CommunesController@update');
Route::post('communes/destroy/{commune}','CommunesController@destroy');