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

// Route::post('users', function () {
//     if (Request::ajax()) {
//         return view('users');
//     }
// });

Route::resource('users', 'UsuarioController');

Route::delete('users', 'UsuarioController@destroy')->name('users.destroy');

Route::put('users/update', 'UsuarioController@update')->name('users.update');

Route::post('users/store', 'UsuarioController@store')->name('users.store');

Route::get('patient', function () {
    return view('patient');
});

Route::get('tests', function () {
    return view('tests');
});

Route::get('calendar', function () {
    return view('calendar');
});