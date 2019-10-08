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

Route::get('/', 'HomeController@index');
Route::get('/daftar', 'HomeController@daftar');
Route::post('/daftar', 'HomeController@store');

//AUTH
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/e-learning', 'AuthController@user');
Route::post('/userlogin', 'AuthController@userlogin');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
Route::get('/_logout', 'AuthController@_logout');
Route::get('/register', 'AuthController@register');

Route::group(['middleware' => ['auth', 'CheckRole:admin']], function(){
    //ADMIN
    Route::get('/admin', 'AdminController@index');   
    //user
    Route::get('/user/daftar', 'UserController@daftar');
    Route::post('/user/daftar', 'UserController@store');
    Route::get('/user/{user}/changepassword', 'UserController@changepassword');
    Route::get('/user/{user}/profile', 'UserController@profile');
    Route::patch('/user/{user}/profile', 'UserController@updateprofile');
    Route::patch('/user/{user}', 'UserController@updatepassword');
    //pendaftar
    Route::get('/pendaftar', 'DaftarController@index');
    Route::get('/pendaftar/{daftar}/register', 'DaftarController@register');
    Route::post('pendaftar/{daftar}/register', 'DaftarController@update');
    Route::post('/pendaftar/{daftar}/register', 'DaftarController@store');
    Route::delete('/pendaftar/{daftar}', 'DaftarController@destroy');
    //Siswa
    Route::get('/siswa/cari', 'SiswaController@cari');
    Route::resource('siswa', 'SiswaController'); 
    //Instruktur
    Route::get('/instruktur/cari', 'InstrukturController@cari');
    Route::resource('instruktur', 'InstrukturController');
    //Buku
    Route::get('/buku/cari', 'BukuController@cari');
    Route::resource('buku', 'BukuController'); 
    //Kelas
    Route::resource('coba', 'CobaController');
    //soal
    Route::get('/soal', 'UjianController@index');
    
});
Route::group(['middleware' => ['auth', 'CheckRole:admin,siswa,instruktur']], function(){
    //User
    Route::get('/user', 'UserController@index');
    //e-learning
    Route::get('/e-learning/home', 'ElearningController@index');
    Route::get('/e-learning/materi', 'ElearningController@materi');
    Route::get('/e-learning/latihan', 'ElearningController@latihan');
    Route::get('/e-learning/latihan/detail/{soal}', 'ElearningController@soal');
    Route::get('/e-learning/nilai', 'ElearningController@nilai');
    Route::get('/e-learning/tespenempatan', 'UjianController@tespenempatan');
    Route::post('/e-learning/latihan', 'UjianController@latihanstore');
});

Route::group(['middleware' => ['auth', 'CheckRole:admin,instruktur']], function(){
    //Materi
    Route::get('/materii', 'MateriController@index');
    Route::get('/materi/{materi}', 'MateriController@show');
    Route::delete('materi/{materi}', 'MateriController@destroy');
    Route::post('/materii', 'MateriController@store');
    //kelas
    Route::get('/kelas', 'InstrukturController@kelas');
    Route::get('/kelas/{id}', 'InstrukturController@showkelas');
    //siswa
    Route::get('/siswa/{siswa}', 'SiswaController@show');
    //soal
    Route::get('/soal', 'SoalController@index');
    Route::post('/soal', 'SoalController@storesoal');
    Route::get('/soal/details/{soal}', 'SoalController@details');
    Route::post('/soal/details/{soal}', 'SoalController@storedetail');
    Route::post('/soal/details/{soal}/distribusi', 'SoalController@storedistribusi');
    Route::delete('/soal/details/{distribusisoal}', 'SoalController@destroydistribusi');
    Route::get('/soal/details/data-soal/{detailsoal}', 'SoalController@detailsoal');
    Route::patch('/soal/details/data-soal/{detailsoal}', 'SoalController@updatesoal');
});


