<?php

use App\Http\Controllers\AdminController;
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

//Home
Route::get('/',[PemesanController::class,'index'])->name('pemesan.index');

//Route Admin
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/admin/list',[AdminController::class,'list'])->name('admin.list');
Route::get('/admin/arsip',[AdminController::class,'arsip'])->name('admin.arsip');
Route::get('/admin/create',[AdminController::class,'create'])->name('admin.create');
Route::post('/admin/store',[AdminController::class,'store'])->name('admin.store');
Route::post('/admin/delete/{id}',[AdminController::class,'delete'])->name('admin.delete');



//Route Pemesan
Route::get('/pemesan/create',[PemesanController::class,'create'])->name('pemesan.create');
Route::post('/pemesan/store',[PemesanController::class,'store'])->name('pemesan.store');


//Test Routing
Route::get('/app',function(){
    return view('layouts.app');
});

Route::get('/test',function(){
    return view('test');
});
Route::get('/login',function(){
    return view('login');
});

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
