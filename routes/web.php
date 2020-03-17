<?php

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

// Rotas de API

Route::middleware(['check.ip'])->group(function () {
    Route::get('/cities', 'CityController@index');
    Route::get('/cities/{id}', 'CityController@show');
    Route::get('/infections', 'InfectionController@index');
});

// Rotas WEB

Route::get('/', 'HomeController@index')->name('home');

Route::get('/data', 'InfectionController@index')->name("data");

Route::get('/contribute', 'ContactController@createContribution')->name("contribute.create");
Route::post('/contribute', 'ContactController@storeContribution')->name("contribute.store");

Route::get('/contributors', 'HomeController@contributors')->name('contributors');

Route::get('/error', function () {
    return view('welcome');
})->name("error");

Route::redirect('/coffee', 'https://pag.ae/blkPnYf')->name('coffee');

Route::get('/cancel', function () {
    return view('sad');
})->name("donate-cancel");

Route::get('/completed', function () {
    return view('thanks');
})->name("donate-completed");
