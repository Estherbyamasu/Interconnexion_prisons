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
Route::get('communes/show/{commune}','ProvincesController@show');
Route::put('communes/{commune}','CommunesController@update');
Route::post('communes/destroy/{commune}','CommunesController@destroy');

// Route::post('provinces/storecommune','ProvincesController@storecommune');
// Route::resourse('provinces','ProvincesController');
Route::get('collines','CollinesController@index');
Route::get('collines/create','CollinesController@create');
Route::post('collines','CollinesController@store');
Route::get('collines/edit/{colline}','CollinesController@edit');
Route::get('collines/show/{colline}','ProvincesController@show');
Route::put('collines/{colline}','CollinesController@update');
Route::post('collines/destroy/{colline}','CollinesController@destroy');
// Route::get('communes/{id}', 'CollinesController@communes');
// Route::resourse('collines','CollinesController');

// Route::resource('collines', 'CollinesController', ['only' => [
//      'edit', 'update'
//  ]]);
    
Route::get('prisons','PrisonsController@index');
Route::get('prisons/create','PrisonsController@create');
Route::post('prisons','PrisonsController@store');
Route::get('prisons/edit/{prison}','PrisonsController@edit');
Route::get('prisons/show/{prison}','PrisonsController@show');
Route::put('prisons/{prison}','PrisonsController@update');
Route::post('prisons/destroy/{prison}','PrisonsController@destroy');


