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
    Route::get('/infections', 'InfectionController@index');
});

// Rotas WEB

Route::get('/', 'HomeController@index')->name('home');

Route::get('/data', 'InfectionController@index')->name("data");

Route::get('/contribute', 'ContactController@sendContribution')->name("contribute");

Route::get('/error', function () {
    return view('welcome');
})->name("error");

Route::get('/infection', function () {
    return view('welcome');
})->name("new-case");

Route::redirect('/coffee', 'https://pag.ae/blkPnYf')->name('coffee');

Route::get('/cancel', function () {
    return view('sad');
})->name("paypal-cancel");

Route::get('/completed', function () {
    return view('thanks');
})->name("paypal-completed");
