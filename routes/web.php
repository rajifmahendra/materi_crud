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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/karyawans', 'KaryawanController@index')->name('karyawans.index');
// Route::get('/karyawans/create', 'KaryawanController@create')->name('karyawan.create');
// Route::post('/karyawans', 'KaryawanController@store')->name('karyawan.store');
// Route::get('/karyawans/{karyawan}', 'KaryawanController@show')->name('karyawans.show');
// Route::get('/karyawans/{karyawan}/edit', 'KaryawanController@edit')->name('karyawans.edit');
// Route::patch('/karyawans/{karyawan}', 'KaryawanController@update')->name('karyawans.update');
// Route::delete('/karyawan/{karyawan}', 'KaryawanController@destroy')->name('karyawans.destroy');

Route::resource('karyawans','KaryawanController');

// Route::get('/file-upload', 'FileUploadController@fileUpload');
// Route::post('/file-upload', 'FileUploadController@prosesfileUpload');

// Route::get('/file-upload-rename', 'FileUploadController@fileUploadRename');
// Route::post('/file-upload-rename', 'FileUploadController@prosesFileUploadRename');

// Route::get('/daftar-karyawan', 'DataController@daftarKaryawan')->middleware('data');
// Route::get('/tabel-karyawan', 'DataController@tabelKaryawan');
// Route::get('/blog-karyawan', 'DataController@blogKaryawan')->middleware('data');


// Route::get('/', 'SessionController@index');
// Route::get('/buat-session', 'SessionController@buatSession');
// Route::get('/akses-session', 'SessionController@aksesSession');
// Route::get('/hapus-session', 'SessionController@hapusSession');
// Route::get('/flash-session', 'SessionController@flashSession');


// Route::get('/login', 'LoginController@login');
// Route::post('/login', 'LoginController@prosesLogin');
// Route::get('/logout', 'LoginController@logout');
// Route::redirect('/', '/login');


// Route::get('/daftar-karyawan', 'DataController@daftarKaryawan')
// ->middleware('auth');
// Route::get('/tabel-karyawan', 'DataController@tabelKaryawan')
// ->middleware('auth');
// Route::get('/blog-karyawan', 'DataController@blogKaryawan')
// ->middleware('auth');



Route::get('/', 'BagianController@index')->middleware('auth');
Route::resource('bagians','BagianController')->middleware('auth');
// Route::get('bagians/{bagian}', 'BagianController@show')->name('bagians.show')->middleware('auth')->middleware('can:view,bagian');
Route::resource('gallery', 'GalleryController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
