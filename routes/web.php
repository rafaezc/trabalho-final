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
    return view('app');
});

Route::resource('users', 'UserController');

Route::delete('users', 'UserController@destroy')->name('users.destroy');

Route::put('users/update', 'UserController@update')->name('users.update');

Route::post('users/store', 'UserController@store')->name('users.store');

Route::resource('patients', 'PatientController');

Route::post('patients', 'PatientController@search')->name('patients.search');

Route::delete('patients', 'PatientController@destroy')->name('patients.destroy');

Route::put('patients/update', 'PatientController@update')->name('patients.update');

Route::any('patients/{id}', 'PatientController@show')->name('patients.show');

Route::post('patients/store', 'PatientController@store')->name('patients.store');

Route::resource('tests', 'TestController');

Route::delete('tests', 'TestController@destroy')->name('tests.destroy');

Route::put('tests/update', 'TestController@update')->name('tests.update');

Route::post('tests/store', 'TestController@store')->name('tests.store');

Route::get('calendar', function () {
    return view('calendar');
});