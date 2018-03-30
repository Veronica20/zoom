<?php

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


Route::get('/','LoginController@index');
Route::get('/registration','RegistrationController@registration')->middleware('checkRegistration');
Route::post('/registration','RegistrationController@registration')->name('registration');

Route::get('/loan','RegistrationController@loan')->middleware('checkLoan');
Route::post('/loan','RegistrationController@loan')->name('loan');

Route::get('/personal','RegistrationController@personal')->middleware('checkPersonal');
Route::post('/personal','RegistrationController@personal')->name('personal');

Route::get('/hurray','RegistrationController@hurray')->name('hurray')->middleware('successMidw');;

Route::get('/logout','RegistrationController@logout')->name('logout');

Route::get('/login','LoginController@index')->name('login');
Route::get('/','LoginController@index')->name('login');
Route::post('/login','LoginController@index');
