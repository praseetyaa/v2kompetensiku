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

// Letakkan fungsi ini pada route paling atas
\Ajifatur\FaturCMS\FaturCMS::routes();

// Home
Route::get('/', 'HomeController@index')->name('site.home');

// Search
Route::get('/search', 'HomeController@search')->name('site.search');

// Program
Route::get('/program', 'ProgramController@index')->name('site.program.index');
Route::get('/program/{permalink}', 'ProgramController@detail')->name('site.program.detail');

// Acara
Route::get('/acara', 'AcaraController@index')->name('site.acara.index');
Route::get('/acara/{permalink}', 'AcaraController@detail')->name('site.acara.detail');

// Artikel
Route::get('/artikel', 'ArtikelController@index')->name('site.artikel.index');
Route::get('/artikel/{permalink}', 'ArtikelController@detail')->name('site.artikel.detail');
Route::get('/artikel/kategori/{category}', 'ArtikelController@category')->name('site.artikel.category');
Route::get('/artikel/tag/{tag}', 'ArtikelController@tag')->name('site.artikel.tag');

// Program
Route::get('/mentor', 'MentorController@index')->name('site.mentor.index');

// Halaman
Route::get('/{permalink}', 'HalamanController@detail')->name('site.halaman.detail');

