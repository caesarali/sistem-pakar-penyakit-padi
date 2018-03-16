<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');
Route::get('/penyakit', 'HomeController@penyakit')->name('penyakit');
Route::get('/penyakit/detail/{penyakit}', 'HomeController@detail')->name('detail');
Route::get('/gejala', 'HomeController@gejala')->name('gejala');
Route::get('/tentang', function() {
	return view('tentang');
})->name('tentang');
Route::group(['prefix' => 'konsultasi'], function() {
	Route::get('/', 'KonsultasiController@pasienForm')->name('pasienForm');
	Route::post('/', 'KonsultasiController@storePasien')->name('storePasien');
	Route::post('/diagnosa', 'KonsultasiController@diagnosa')->name('diagnosa');
	Route::get('/{pasien_id}/hasil', 'KonsultasiController@hasilDiagnosa')->name('hasilDiagnosa');
});

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {
	Route::resource('/gejala', 'Dashboard\GejalaController');
	Route::resource('/penyakit', 'Dashboard\PenyakitController');
});
