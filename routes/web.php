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

// This will be replaced with homepage
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes. LOGIN, REGISTER, REST PASSWORD and FORGOT PASSWORD
Auth::routes();

// View and Controller for logged in dashboard
Route::get('/dashboard', 'HomeController@index')->name('home');
