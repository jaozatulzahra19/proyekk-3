<?php

use App\Http\Controllers\GejalaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\RuleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [HomeController::class, 'index']);
Route::get('/datapengguna', [HomeController::class, 'datapengguna']);
Route::get('logout', [LoginController::class, 'logout']);
//datagejala
Route::get('/datagejala', [GejalaController::class, 'index'])->name('gejala.index');
Route::get('/datagejala/create', [GejalaController::class, 'create'])->name('gejala.create');
Route::post('/datagejala', [GejalaController::class, 'store'])->name('gejala.store');
Route::delete('/datagejala/{id}', [GejalaController::class, 'destroy'])->name('gejala.destroy');
Route::get('/datagejala/{id}/edit', [GejalaController::class, 'edit'])->name('gejala.edit');
Route::put('/datagejala/{id}', [GejalaController::class, 'update'])->name('gejala.update');
//datapenyakit
Route::get('/datapenyakit', [PenyakitController::class, 'index'])->name('penyakit.index');
Route::get('/datapenyakit/create', [PenyakitController::class, 'create'])->name('penyakit.create');
Route::post('/datapenyakit', [PenyakitController::class, 'store'])->name('penyakit.store');
Route::delete('/datapenyakit/{id}', [PenyakitController::class, 'destroy'])->name('penyakit.destroy');
Route::get('/datapenyakit/{id}/edit', [PenyakitController::class, 'edit'])->name('penyakit.edit');
Route::put('/datapenyakit/{id}', [PenyakitController::class, 'update'])->name('penyakit.update');
//datarule
Route::get('/rule', [RuleController::class, 'index'])->name('indexrule');
Route::post('/rule/insertrule', [RuleController::class, 'insertrule'])->name('insertrule');
Route::get('/editrule/{id}', [RuleController::class, 'editrule'])->name('editrule');
Route::post('/updaterule/{id}', [RuleController::class, 'updaterule'])->name('updaterule');
Route::delete('/deleterule/{id}', [RuleController::class, 'destroy'])->name('destroy');
//diagnosa
Route::get('/diagnosa', [DiagnosaController::class, 'diagnosa'])->name('diagnosa');
Route::post('/insertdiagnosa', [DiagnosaController::class, 'insertdiagnosa'])->name('insertdiagnosa');
Route::delete('/diagnosa/{id}', [DiagnosaController::class, 'destroy'])->name('destroy');