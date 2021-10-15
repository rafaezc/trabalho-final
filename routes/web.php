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

// discriminar todas as rotas .index

Route::get('/', function () {
    return view('app');
});

Route::resource('users', 'UserController');

Route::delete('users', 'UserController@destroy')->name('users.destroy');

Route::put('users/update', 'UserController@update')->name('users.update');

Route::post('users/store', 'UserController@store')->name('users.store');

// Route::resource('patients', 'PatientController');

// Route::any('patients/searchi', 'PatientController@index')->name('patients.index');

Route::any('patients/search', 'PatientController@search')->name('patients.search');

Route::put('patients/delete/{id}', 'PatientController@destroy')->name('patients.destroy');

Route::put('patients/update/{id}', 'PatientController@update')->name('patients.update');

Route::any('patients/show/{id}', 'PatientController@show')->name('patients.show');

Route::post('patients/store', 'PatientController@store')->name('patients.store');

Route::resource('tests', 'TestController');

Route::delete('tests', 'TestController@destroy')->name('tests.destroy');

Route::put('tests/update', 'TestController@update')->name('tests.update');

Route::post('tests/store', 'TestController@store')->name('tests.store');

Route::any('pastschedules', 'ScheduleController@indexold')->name('schedules.indexold');

Route::any('schedules', 'ScheduleController@index')->name('schedules.index');

Route::delete('schedules', 'ScheduleController@destroy')->name('schedules.destroy');

Route::put('schedules/update', 'ScheduleController@update')->name('schedules.update');

Route::post('schedules/store', 'ScheduleController@store')->name('schedules.store');

Route::resource('testresults', 'TestResultsController');

Route::put('testresults/delete/{id}', 'TestResultsController@destroy')->name('testresults.destroy');

Route::put('testresults/update/{id}', 'TestResultsController@update')->name('testresults.update');

Route::post('testresults/store', 'TestResultsController@store')->name('testresults.store');