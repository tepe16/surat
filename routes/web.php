<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\LoginPegawaiController;
use App\Http\Controllers\DownloadFileController;
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
    return view('welcome');
});


#hal admin
Route::get('admin', function () {
    return view('admin.index');
});

#login admin
Route::resource('loginadmin' , LoginAdminController::class);
#logout admin
Route::get('logout', [LoginAdminController::class, 'logout'])->name('logout');
#user
Route::resource('users' , UserController::class);

#bagian
Route::resource('bagians', BagianController::class);

#jenis
Route::resource('jenis', JenisController::class);

#instansi
Route::resource('instansi', InstansiController::class);

#pegawai
Route::resource('pegawais', PegawaiController::class);

## ADMIN PEGAWAI

Route::get('admin_pegawai', function () {
    return view('admin_pegawai.index');
});
#login pegawai
Route::resource('loginpegawai' , LoginPegawaiController::class);
#logout admin
Route::get('logoutpegwai', [LoginPegawaiController::class, 'logout'])->name('logoutpegawai');
#suratkeluar
Route::resource('suratkeluar', SuratKeluarController::class);
#suratmasuk
Route::resource('suratmasuk', SuratMasukController::class);
#disposisi
Route::resource('disposisi', DisposisiController::class);
#downloadfile
Route::resource('downloadfile', DownloadFileController::class);



















