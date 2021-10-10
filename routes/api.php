<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/result', [ApiController::class,'result'])->name('api.result');

Route::get('/jumlah_alumni_per_provinsi', [HomeController::class, 'jumlah_alumni_per_provinsi']);
Route::get('/jumlah_alumni_per_kabupaten', [HomeController::class, 'jumlah_alumni_per_kabupaten']);
