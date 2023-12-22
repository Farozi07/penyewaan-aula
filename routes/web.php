<?php

use App\Http\Controllers\PemesanController;
use Illuminate\Support\Facades\Route;
use App\Models\Aula;

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

Route::prefix('admin')->group(function(){
    Route::get('/manual-aula',function(){
        Aula::create(
            [
                'nama' => 'Aula A',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis dolores error temporibus! Voluptate aliquam quas cupiditate ipsa, porro magnam quibusdam omnis, animi harum aperiam consequatur facere est itaque laboriosam perspiciatis ipsam perferendis. Eos pariatur nam porro harum, sint enim iure ducimus, minima voluptates quidem sapiente, deleniti provident fugiat distinctio libero!'
            ]
        );

        Aula::create(
            [
                'nama' => 'Aula B',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis dolores error temporibus! Voluptate aliquam quas cupiditate ipsa, porro magnam quibusdam omnis, animi harum aperiam consequatur facere est itaque laboriosam perspiciatis ipsam perferendis. Eos pariatur nam porro harum, sint enim iure ducimus, minima voluptates quidem sapiente, deleniti provident fugiat distinctio libero!'
            ]
        );
    });
});


//Route Sewa
