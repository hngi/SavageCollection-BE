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
Route::view('/', 'index');

Route::view('/all_post', 'all_post'); // Uncomment this when view ready

// Auth Routes. LOGIN, REGISTER, REST PASSWORD and FORGOT PASSWORD
Auth::routes();

// View and Controller for logged in dashboard
Route::get('/dashboard', 'DashboardController@home')->name('dashboard.home');
Route::get('/new_upload', 'DashboardController@newUpload')->name('dashboard.new_upload');

// Actions
Route::post('/new_upload', 'DashboardController@processNewUpload')->name('add.new_upload');
