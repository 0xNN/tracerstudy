<?php

use App\Http\Controllers\F1Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\KuesionerMasterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PertanyaanController;

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

Auth::routes();

// Route::resource('user', App\Http\Controllers\UserController::class);
Route::resource('Kuesioner',App\Http\Controllers\KuesionerController::class);
Route::resource('Master',App\Http\Controllers\MasterController::class);
Route::resource('F1',App\Http\Controllers\F1Controller::class);
Route::post('/F1/import', [App\Http\Controllers\F1Controller::class, 'import']);
Route::resource('Pertanyaan',App\Http\Controllers\PertanyaanController::class);
Route::resource('SubPertanyaan',App\Http\Controllers\SubPertanyaanController::class);
Route::resource('Jawaban',App\Http\Controllers\JawabanController::class);
Route::resource('SubJawaban',App\Http\Controllers\SubJawabanController::class);
Route::resource('TipePertanyaan',App\Http\Controllers\TipePertanyaanController::class);
Route::get('/Pertanyaan/getData', [App\Http\Controllers\PertanyaanController::class,'getData']);
Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::resource('jawaban_user', App\Http\Controllers\JawabanUserController::class);

Route::resource('tipe', App\Http\Controllers\TipeController::class);
Route::resource('pertanyaan_tipe', App\Http\Controllers\PertanyaanTipeController::class);
Route::resource('kuesioner_master', App\Http\Controllers\KuesionerMasterController::class);
Route::resource('pertanyaan_jawaban', App\Http\Controllers\PertanyaanJawabanController::class);
Route::resource('f1jawaban', App\Http\Controllers\F1JawabanController::class);
Route::resource('profil', App\Http\Controllers\ProfilController::class);

Route::get('Kuesioner/get-data/{id}',[App\Http\Controllers\KuesionerController::class, 'getData'])->name('Kuesioner.getData');
Route::post('kuesioner_master/simpan_pertanyaan', [\App\Http\Controllers\KuesionerMasterController::class, 'simpanPertanyaan'])->name('kuesioner_master.simpan-pertanyaan');
Route::get('kuesioner_master/{id}/edit_pertanyaan', [App\Http\Controllers\KuesionerMasterController::class, 'editPertanyaan'])->name('kuesioner_master.edit_pertanyaan');
// Route::group(['middleware' => ['auth', 'roles']],function(){
//     Route::resource('user', App\Http\Controllers\UserController::class);
//     Route::resource('Kuesioner',App\Http\Controllers\KuesionerController::class);
//     Route::resource('Master',App\Http\Controllers\MasterController::class);
//     Route::resource('F1',App\Http\Controllers\F1Controller::class);
//     Route::post('/F1/import', [App\Http\Controllers\F1Controller::class, 'import']);
//     Route::resource('Pertanyaan',App\Http\Controllers\PertanyaanController::class);
//     Route::resource('SubPertanyaan',App\Http\Controllers\SubPertanyaanController::class);
//     Route::resource('Jawaban',App\Http\Controllers\JawabanController::class);
//     Route::resource('SubJawaban',App\Http\Controllers\SubJawabanController::class);
//     Route::resource('TipePertanyaan',App\Http\Controllers\TipePertanyaanController::class);
//     Route::get('/Pertanyaan/getData', [App\Http\Controllers\PertanyaanController::class,'getData']);
//     Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');
// });

Route::get('/contoh', function() {
    return view('contoh');
});

Route::get('/kuesioner_master/export/kuesioner',[KuesionerMasterController::class,'export'])->name('export.kuesioner');
Route::get('/pertanyaan/get-pertanyaan', [PertanyaanController::class, 'getPertanyaan'])->name('Pertanyaan.getPertanyaan');
Route::post('F1/sync',[F1Controller::class, 'sync_alumni'])->name('F1.sync');

Route::get('Kuesioner/data/print/{nim}', [KuesionerController::class, 'print'])->name('kuesioner.print');

Route::get('logout', [HomeController::class, 'logout'])->name('logout');
