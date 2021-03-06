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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {

    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/pegawai', 'PegawaiController@index');
    Route::post('/pegawai/create', 'PegawaiController@create');
    Route::get('/pegawai/{pegawai}/edit', 'PegawaiController@edit');
    Route::post('/pegawai/{pegawai}/update', 'PegawaiController@update');
    Route::get('/pegawai/{pegawai}/delete', 'PegawaiController@delete');
    Route::get('/pegawai/{pegawai}/profile', 'PegawaiController@profile');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,pegawai']], function () {

    Route::get('/dashboard', 'DashboardController@index');
});
