<?php

use App\Http\Controllers\API\Api1Controller;
use App\Http\Controllers\API\AuthController;
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
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'daftar']);
Route::post('/regiskonsultan', [AuthController::class, 'daftarKonsultan']);
Route::post('/regiskontraktor', [AuthController::class, 'daftarKontraktor']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/gejala', [Api1Controller::class, 'getGejala'])->name('gejala');
Route::get('/resdiagnosa', [Api1Controller::class, 'resDiagnosa'])->name('resdiagnosa');
Route::post('/diagnosa', [Api1Controller::class, 'diagnosa'])->name('diagnosa');