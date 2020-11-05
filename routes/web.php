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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/safeetest', 'HomeController@safeetest')->name('safeetest');
Route::get('/newForm', 'SafeeController@form')->name('newForm2');
Route::post('/submitForm', 'SafeeController@submitForm')->name('submit');
Route::get('/listingform', 'SafeeController@listingform')->name('listing');
Route::get('/edituser/{id}', 'SafeeController@edituser')->name('edituser');
Route::post('/updateuser', 'SafeeController@updateuser')->name('updateuser');
