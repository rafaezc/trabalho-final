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
    return redirect('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
   
    Route::resource('users', 'UserController');

    Route::delete('users', 'UserController@destroy')->name('users.destroy');

    Route::put('users/update', 'UserController@update')->name('users.update');

    Route::post('users/store', 'UserController@store')->name('users.store');

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

    // Route::resource('testresults', 'TestResultsController');

    Route::delete('patients/deletetestorschedule/{id}', 'PatientController@deletetestorschedule')->name('patients.deletetestorschedule');

    Route::put('patients/updatetestorschedule/{id}', 'PatientController@updatetestorschedule')->name('patients.updatetestorschedule');

    Route::post('patients/storetestorschedule/{id}', 'PatientController@storetestorschedule')->name('patients.storetestorschedule');

});

Route::any('login', 'AuthController@index')->name('login.index');

Route::post('', 'AuthController@authenticate')->name('login.authenticate');

Route::any('logout', 'AuthController@logout')->name('login.logout');

Route::get('/reports', function () {
    return view('reports');
});