<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\BpjsController;
use App\Http\Controllers\PemeriksaanfreeController;
use App\Http\Controllers\pemeriksaanBpjsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\RiwayatBpjsController;
use App\Exports\PendaftaranExport;
use App\Exports\PemeriksaanExport;
use App\Exports\PemeriksaanBpjsExport;
use App\Exports\BpjsExport;
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
    return view('login.main');
});
//login
Route::get('/login', [LoginController::class, 'main'] );
Route::post('/login', [LoginController::class, 'authenticate'] );
Route::post('/logout', [LoginController::class, 'logout'] );
//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'] )->name('login')->middleware('auth');

//pendaftaran
Route::resource('/dashboard/pendaftaran',PendaftaranController::class)->middleware('auth');
//Route::get('/dashboard/pendaftaran/search',PendaftaranController::class,'search')->name('pendaftaran.search');


//Pemeriksaan Umum
Route::resource('/dashboard/pemeriksaan',PemeriksaanController::class)->middleware('auth');


//Bpjs
Route::resource('/dashboard/bpjs',BpjsController::class)->middleware('auth');

//Pemeriksaan Bpjs
Route::resource('/dashboard/pemeriksaanbpjs',pemeriksaanBpjsController::class)->middleware('auth');

//Pemeriksaan Free
Route::resource('/dashboard/pemeriksaanfree',PemeriksaanfreeController::class)->middleware('auth');

//User
Route::resource('/dashboard/user',UserController::class)->middleware('auth');

//Riwayat
Route::resource('/dashboard/riwayat',RiwayatController::class)->middleware('auth');
Route::resource('/dashboard/riwayatbpjs',RiwayatBpjsController::class)->middleware('auth');
Route::get('/dashboard/pemeriksaan/done/{id}', [PemeriksaanController::class, 'done'])->name('done')->middleware('auth');
Route::get('/dashboard/pemeriksaanfree/selesai/{id}', [PemeriksaanfreeController::class, 'selesai'])->name('selesai')->middleware('auth');
//Export
Route::get('export-csv-pendaftaran', function () {
    return Excel::download(new PendaftaranExport, 'pendaftaranUmum.csv');
});

Route::get('export-csv-pemeriksaan', function () {
    return Excel::download(new PemeriksaanExport, 'PemeriksaanUmum.csv');
});

Route::get('export-csv-bpjs', function () {
    return Excel::download(new BpjsExport, 'pendaftaranBpjs.csv');
});
Route::get('export-csv-pemeriksaanbpjs', function () {
    return Excel::download(new PemeriksaanBpjsExport, 'pemeriksaanBpjs.csv');
});

Route::get('/export-pdf-pendaftaran', [PendaftaranController::class, 'pendaftaranPDF']);
Route::get('/export-pdf-pemeriksaanUmum', [PemeriksaanController::class, 'pemeriksaanUmumPDF']);
Route::get('/export-pdf-pemeriksaanBpjs', [PemeriksaanfreeController::class, 'pemeriksaanBpjsPDF']);
Route::get('/export-pdf-pendaftaranBpjs', [BpjsController::class, 'pendaftaranBpjsPDF']);