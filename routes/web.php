<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\LoginPegawaiController;
use App\Http\Controllers\LoginCamatController;
use App\Http\Controllers\DownloadFileController;
use App\Http\Controllers\KodeSuratController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\PegawaiPengelolaController;
use App\Http\Controllers\PegawaiCamatController;
use App\Http\Controllers\SettingCamatController;
use App\Http\Controllers\SettingPegawaiController;
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
    return view('admin.index');
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


#pegawai
Route::resource('pegawais', PegawaiController::class);

#pegawai camat 
Route::resource('camats', PegawaiCamatController::class);

## ADMIN PEGAWAI

Route::get('admin_pegawai', function () {
    return view('admin_pegawai.index');
});
#login pegawai
Route::resource('loginpegawai' , LoginPegawaiController::class);
#logout admin
Route::get('logoutpegwai', [LoginPegawaiController::class, 'logout'])->name('logoutpegawai');
#kode_surat
Route::resource('kode',KodeSuratController::class);
#agenda
Route::resource('agenda',AgendaController::class);
#suratkeluar
Route::resource('suratkeluar', SuratKeluarController::class);
#suratmasuk
Route::resource('suratmasuk', SuratMasukController::class);
#settingcamat
Route::resource('settingpegawai', SettingPegawaiController::class);

#downloadfile
Route::resource('downloadfile', DownloadFileController::class);


#halaman pengelola camat
Route::get('pengelola_camat', function () {
    return view('pengelola_camat.index');
});
#pegelolagsurat
Route::resource('pengelolas', PegawaiPengelolaController::class);
#login pengelola camat
Route::resource('logincamat', LoginCamatController::class);
#logout pengelola
Route::get('logoutpengelola', [LoginCamatController::class, 'logout'])->name('logoutpengelola');
#disposisi
Route::resource('disposisi', DisposisiController::class);
#settingcamat
Route::resource('settingcamat', SettingCamatController::class);









