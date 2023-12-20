<?php

use App\Http\Controllers\PemesanController;
use Illuminate\Support\Facades\Route;

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


//Route Pemesan
Route::get('/',[PemesanController::class,'index'])->name('pemesan.index');
Route::get('/pemesan/create',[PemesanController::class,'create'])->name('pemesan.create');
Route::post('/pemesan/store',[PemesanController::class,'store'])->name('pemesan.store');
Route::get('/pemesan/edit/{pemesan}',[PemesanController::class,'edit'])->name('pemesan.edit');
Route::put('/pemesan/update/{pemesan}',[PemesanController::class,'update'])->name('pemesan.update');
Route::post('/pemesan/delete/{pemesan}',[PemesanController::class,'delete'])->name('pemesan.delete');


//Route Sewa
