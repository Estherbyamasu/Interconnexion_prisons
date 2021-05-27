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



Route::get('prisonniers','PrisonniersController@index');
Route::get('prisonniers/create','PrisonniersController@create');
Route::post('prisonniers','PrisonniersController@store');
Route::get('prisonniers/edit/{prisonnier}','PrisonniersController@edit');
Route::put('prisonniers/{prisonnier}','PrisonniersController@update');
Route::post('prisonniers/destroy/{prisonnier}','PrisonniersController@destroy');

Route::get('prisonnier_prisons','Prisonnier_prisonsController@index');
Route::get('prisonnier_prisons/create','Prisonnier_prisonsController@create');
Route::post('prisonnier_prisons','Prisonnier_prisonsController@store');
Route::get('prisonnier_prisons/edit/{prisonnier_prison}','Prisonnier_prisonsController@edit');
Route::put('prisonnier_prisons/{prisonnier_prison}','Prisonnier_prisonsController@update');
Route::post('prisonnier_prisons/destroy/{prisonnier_prison}','Prisonnier_prisonsController@destroy');


Route::get('fonctions','FonctionsController@index');
Route::get('fonctions/create','FonctionsController@create');
Route::post('fonctions','FonctionsController@store');
Route::get('fonctions/edit/{fonction}','FonctionsController@edit');
Route::put('fonctions/{fonction}','FonctionsController@update');
Route::post('fonctions/destroy/{fonction}','FonctionsController@destroy');


Route::get('services','ServicesController@index');
Route::get('services/create','ServicesController@create');
Route::post('services','ServicesController@store');
Route::get('services/edit/{service}','ServicesController@edit');
Route::get('services/show/{service}','ServicesController@show');
Route::put('services/{service}','ServicesController@update');
Route::post('services/destroy/{service}','ServicesController@destroy');


Route::get('occupations','OccupationsController@index');
Route::get('occupations/create','OccupationsController@create');
Route::post('occupations','OccupationsController@store');
Route::get('occupations/edit/{occupation}','OccupationsController@edit');
Route::put('occupations/{occupation}','OccupationsController@update');
Route::post('occupations/destroy/{occupation}','OccupationsController@destroy');

Route::get('categories','CategoriesController@index');
Route::get('categories/create','CategoriesController@create');
Route::post('categories','CategoriesController@store');
Route::post('categorie','CategoriesController@storeprod');
Route::get('categories/edit/{category}','CategoriesController@edit');

Route::get('categories/show/{category}','CategoriesController@show');
Route::put('categories/{category}','CategoriesController@update');

Route::post('categories/destroy/{category}','CategoriesController@destroy');

