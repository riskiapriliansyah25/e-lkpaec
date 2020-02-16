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
Route::get('/e-learning/login', 'AuthController@user');
Route::post('/userlogin', 'AuthController@userlogin');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
Route::get('/_logout', 'AuthController@_logout');
Route::get('/register', 'AuthController@register');

Route::group(['middleware' => ['auth', 'CheckRole:pimpinan']], function(){
    Route::get('/pimpinan', 'PimpinanController@index');

    Route::get('/pimpinan/pendaftar', 'PimpinanController@pendaftar');
    Route::get('/pimpinan/pendaftar/exportpdf', 'DaftarController@exportPdf');

    Route::get('/pimpinan/siswa', 'PimpinanController@siswa');
    Route::get('/pimpinan/siswa/{siswa}', 'PimpinanController@showSiswa');
    Route::get('/pimpinan/siswa/exportpdf', 'SiswaController@exportPdf');
    Route::get('/pimpinan/siswa/exportpdf/{siswa}', 'SiswaController@exportPdfsiswa');

    Route::get('/pimpinan/instruktur', 'PimpinanController@instruktur');
    Route::get('/pimpinan/instruktur/exportpdf', 'InstrukturController@exportPdf');
    
    Route::get('/pimpinan/kelas', 'PimpinanController@kelas');
    Route::get('/pimpinan/kelas/{coba}', 'PimpinanController@showKelas');

    Route::get('/pimpinan/buku', 'PimpinanController@buku');

    Route::get('/pimpinan/nilai-ujian', 'PimpinanController@nilaiUjian');
    Route::get('/pimpinan/nilai-ujian/exportpdf', 'PimpinanController@exportPdf');


});

Route::group(['middleware' => ['auth', 'CheckRole:admin']], function(){
    //ADMIN
    Route::get('/admin', 'AdminController@index');   
    //user
    Route::get('/user/daftar', 'UserController@daftar');
    Route::post('/user/daftar', 'UserController@store');
    Route::delete('/user/{user}', 'UserController@destroy');
    
    //pendaftar
    Route::get('/pendaftar', 'DaftarController@index');
    Route::get('/pendaftar/{daftar}', 'DaftarController@show');
    Route::get('/pendaftar/{daftar}/register', 'DaftarController@register');
    Route::post('pendaftar/{daftar}/register', 'DaftarController@update');
    Route::post('/pendaftar/{daftar}/register', 'DaftarController@store');
    Route::get('/pendaftarr/export', 'DaftarController@exportPdf');
    Route::delete('/pendaftar/{daftar}', 'DaftarController@destroy');
    Route::get('/pendaftar/laporan', 'DaftarController@laporan');
    //Siswa
    Route::get('/siswa/exportpdf', 'SiswaController@exportPdf');
    Route::get('/siswa/exportpdf/{siswa}', 'SiswaController@exportPdfsiswa');
    Route::resource('siswa', 'SiswaController');
    //Instruktur
    Route::get('/instruktur/exportpdf', 'InstrukturController@exportPdf');
    Route::get('/instruktur/exportpdf/{instruktur}', 'InstrukturController@exportPdfinstruktur');
    Route::resource('instruktur', 'InstrukturController');
    //Buku
    Route::resource('buku', 'BukuController'); 
    //Kelas
    Route::resource('coba', 'CobaController');

    //pembayaran
    Route::resource('paket', 'PaketController');
    Route::get('/pembayaran' , 'PembayaranController@index');
    Route::get('/pembayaran/show/{siswa}', 'PembayaranController@show');
    Route::post('/pembayaran/show/{siswa}', 'PembayaranController@store');
    Route::delete('/pembayaran/show/{pembayaran}/{siswa}', 'PembayaranController@destroy');
    Route::get('/pembayaran/exportpdf/{pembayaran}', 'PembayaranController@exportPdf');



        //soal Ujian
        Route::get('/soal', 'SoallController@index');
        Route::post('/soal', 'SoallController@store');
        Route::get('/soal/ubah/{soal}', 'SoallController@editSoal');
        Route::patch('/soal/{soal}', 'SoallController@updateSoal');
        Route::get('/soal/details/{soal}', 'SoallController@detailSoal');
        Route::delete('/soal/details/{soal}/{detailsoal}', 'SoallController@deleteDetailSoal');
        Route::get('/soal/details/data-soal/{soal}/{detailsoal}', 'SoallController@showDetailSoal');
        Route::patch('/soal/details/data-soal/{soal}/{detailsoal}', 'SoallController@updateDetailSoal');
        Route::get('/soal/details/distribusi/{soal}', 'SoallController@distribusiSoal');
        Route::post('/soal/details/distribusi', 'SoallController@storeDistribusi');
        Route::post('/soal/deleteDistribusi', 'SoallController@deleteDistribusiUjian');
        Route::delete('/soal/{soal}', 'SoallController@delete');
        Route::post('/soal/details/{soal}', 'SoallController@storedetailSoal');

         //laporan ujian
        Route::get('/laporanujian', 'LaporanController@indexUjian');
        route::post('/laporanujian', 'LaporanController@resetUjian');
        Route::get('/laporanujian/detail-kelas/{coba}', 'LaporanController@detailKelas');
        Route::get('/laporanujian/{siswa}/{soal}', 'LaporanController@detailHasil');
    
});

Route::group(['middleware' => ['auth', 'CheckRole:admin,instruktur']], function(){
    //Materi
    Route::get('/materii', 'MateriController@index');
    Route::get('/materi/{materi}', 'MateriController@show');
    Route::get('/materi/{materi}/edit', 'MateriController@edit');
    Route::patch('/materi/{materi}', 'MateriController@update');
    Route::delete('/materi/{materi}', 'MateriController@destroy');
    Route::post('/materi/distribusi', 'MateriController@storeDistribusiMateri');
    Route::post('/materi/deleteDistribusi', 'MateriController@deleteDistribusiMateri');

    Route::post('/materii', 'MateriController@store');
    //kelas
    Route::get('/kelas', 'InstrukturController@kelas');
    Route::get('/kelas/{id}', 'InstrukturController@showkelas');
    //siswa
    Route::get('/siswa/{siswa}', 'SiswaController@show');
    

    //soal Latihan
    Route::get('/soal-latihan', 'SoallController@indexLatihan');
    Route::post('/soal-latihan', 'SoallController@storeLatihan');
    Route::get('/soal-latihan/ubah/{soallatihan}', 'SoallController@editSoalLatihan');
    Route::patch('/soal-latihan/ubah/{soallatihan}', 'SoallController@updateSoalLatihan');
    Route::get('/soal-latihan/details/data-soallatihan/{soallatihan}/{detailsoallatihan}', 'SoallController@showDetailSoalLatihan');
    Route::patch('/soal-latihan/details/data-soallatihan/{soallatihan}/{detailsoallatihan}', 'SoallController@updateDetailSoalLatihan');
    Route::delete('/soal-latihan/details/{soallatihan}/{detailsoallatihan}', 'SoallController@deleteDetailSoalLatihan');
    Route::delete('/soal-latihan/{soallatihan}', 'SoallController@deleteLatihan');
    Route::get('/soal-latihan/details/{soallatihan}', 'SoallController@detailSoalLatihan');
    Route::post('/soal-latihan/details/{soallatihan}', 'SoallController@storeDetailSoalLatihan');
    Route::post('/soal-latihan/distribusi', 'SoallController@distribusiLatihan');
    Route::post('/soal-latihan/deleteDistribusi', 'SoallController@deleteDistribusi');
    
    ///laporan latihan
    Route::get('/laporanlatihan', 'LaporanController@indexLatihan');
    Route::get('/laporanlatihan/detail-latihan/{coba}', 'LaporanController@detailLatihan');
    Route::get('/laporanlatihan/detail-latihan/{coba}/paket-latihan/{soallatihan}', 'LaporanController@paketLatihan');
    Route::post('/laporanlatihan/detail-latihan/reset', 'LaporanController@resetLatihan');
    Route::get('/laporanlatihan/detail-latihan/{coba}/paket-latihan/{soallatihan}/{siswa}', 'LaporanController@getLatihan');

    //rapot
    Route::get('/rapot', 'RapotController@index');
    Route::get('/rapot/detail/{coba}', 'RapotController@detailKelas');
    Route::get('/rapot/detail/{coba}/get-rapot/{siswa}', 'RapotController@getRapot');
    Route::post('/rapot/storerapot', 'RapotController@storeRapot');
    Route::delete('/rapot/detail/{coba}/get-rapot/{siswa}/{rapot}', 'RapotController@deleteRapot');
    Route::get('/rapot/exportpdf/{rapot}', 'RapotController@exportPdf');

    Route::get('/rapot/kriteria', 'RapotController@kriteria');
    Route::post('/rapot/kriteria', 'RapotController@storeKriteria');
    Route::get('/rapot/kriteria/{kriteria}', 'RapotController@showKriteria');
    Route::patch('/rapot/kriteria/{kriteria}', 'RapotController@updateKriteria');
    Route::delete('/rapot/kriteria/{kriteria}', 'RapotController@deleteKriteria');
});

Route::group(['middleware' => ['auth', 'CheckRole:admin,instruktur']], function(){
    //User
    Route::get('/user', 'UserController@index');
    Route::get('/user/{user}/changepassword', 'UserController@changepassword');
    Route::get('/user/{user}/profile', 'UserController@profile');
    Route::patch('/user/{user}/profile', 'UserController@updateprofile');
    Route::patch('/user/{user}', 'UserController@updatepassword');
    Route::patch('/user/resetpassword/{user}', 'UserController@resetpassword');
});
Route::group(['middleware' => ['auth', 'CheckRole:siswa']], function(){
    
    //e-learning
    Route::get('/e-learning', 'ElearningController@index');
        Route::group(['prefix' => 'e-learning'], function(){
            Route::get('/materi', 'ElearningController@materi');
            Route::get('/materi/{materi}', 'ElearningController@materiShow');
            //latihan
            Route::get('latihan', 'SiswaController@latihan');
            Route::get('latihan/detail/{id}', 'SiswaController@detailLatihan');
            Route::get('latihan/finish/{id}', 'SiswaController@finishLatihan');
            Route::get('latihan/get-soal/{id}', 'SiswaController@getSoalLatihan');
            Route::post('latihan/jawab', 'SiswaController@jawabLatihan');
            Route::post('latihan/kirim-jawaban', 'SiswaController@kirimJawabanLatihan');

            //ujian
            Route::get('ujian', 'SiswaController@ujian');
            Route::get('ujian/detail/{id}', 'SiswaController@detailUjian');
            Route::get('ujian/finish/{id}', 'SiswaController@finishUjian');
            Route::get('ujian/get-soal/{id}', 'SiswaController@getSoal');
            Route::post('ujian/jawab', 'SiswaController@jawab');
            Route::post('ujian/kirim-jawaban', 'SiswaController@kirimJawaban');

            //profile
            Route::get('profile', 'ElearningController@profile');
            Route::get('profile/gantipassword', 'ElearningController@gantiPassword');
            Route::patch('profile', 'ElearningController@updateProfile');
            Route::patch('profile/gantipassword', 'ElearningController@updatePassword');
        });

        //tes
        Route::get('/e-learning/tespenempatan', 'UjianController@tespenempatan');
});


