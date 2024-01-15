<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PemesanController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Models\Aula;
use App\Models\Pemesan;
use App\Models\Sewa;

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
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/list',[AdminController::class,'list'])->name('admin.list');
    Route::get('/booked',[AdminController::class,'booked'])->name('admin.booked');
    Route::get('/list/arsip',[AdminController::class,'arsip'])->name('admin.list.arsip');
    Route::get('/create',[AdminController::class,'create'])->name('admin.create');
    Route::post('/store',[AdminController::class,'store'])->name('admin.store');
    Route::post('/status/{id}',[AdminController::class,'status'])->name('admin.status');
    Route::post('/delete/{id}',[AdminController::class,'delete'])->name('admin.arsip');

//Route Menambahkan Data Aula
    Route::get('/manual-aula',function(){
        Aula::create(
            [
                'nama' => 'Aula Bhinneka Tunggal Ika',
                'deskripsi' => '100 S.D 150 Orang'
            ]
        );

        Aula::create(
            [
                'nama' => 'Aula Garuda',
                'deskripsi' => '100 S.D 150 Orang'
            ]
        );
        Aula::create(
            [
                'nama' => 'Aula Akcaya',
                'deskripsi' => '40 Orang'
            ]
        );
    });
});



//Route Pemesan
Route::get('/pemesan/create',[PemesanController::class,'create'])->name('pemesan.create');
Route::post('/pemesan/store',[PemesanController::class,'store'])->name('pemesan.store');


//Test Routing

Route::get('/app',function(){
    return view('layouts.app');
});

Route::get('/test',[TestController::class,'index'])->name('test');
Route::get('/test/list',[TestController::class,'listEvent'])->name('list.event');


Route::prefix('admin')->group(function(){
    Route::get('/tambah-pemesan',function(){
        $pemesan=Pemesan::create(
            [
                'no_ktp'=>'1234567891',
                'nama'=>'Alex',
                'telp'=>'1234567890',
                'email'=>'alex@gmail.com',
                'alamat'=>'AA'
            ]
        );
        Sewa::create(
            [
                'aula_id'=>1,
                'pemesan_id'=>$pemesan->id,
                'start'=>'2024-01-13',
                'finish'=>'2024-01-13',
                'keperluan'=>'AA',
                'status'=>false
            ]
        );
        $pemesan2=Pemesan::create(
            [
                'no_ktp'=>'1234567892',
                'nama'=>'Alex',
                'telp'=>'1234567890',
                'email'=>'alex@gmail.com',
                'alamat'=>'AA'
            ]
        );
        Sewa::create(
            [
                'aula_id'=>1,
                'pemesan_id'=>$pemesan2->id,
                'start'=>'2024-01-13',
                'finish'=>'2024-01-13',
                'keperluan'=>'AA',
                'status'=>false
            ]
        );
        $pemesan3=Pemesan::create(
            [
                'no_ktp'=>'1234567893',
                'nama'=>'Alex',
                'telp'=>'1234567890',
                'email'=>'alex@gmail.com',
                'alamat'=>'AA'
            ]
        );
        Sewa::create(
            [
                'aula_id'=>2,
                'pemesan_id'=>$pemesan3->id,
                'start'=>'2024-01-13',
                'finish'=>'2024-01-13',
                'keperluan'=>'AA',
                'status'=>false
            ]
        );
        $pemesan4=Pemesan::create(
            [
                'no_ktp'=>'1234567894',
                'nama'=>'Alex',
                'telp'=>'1234567890',
                'email'=>'alex@gmail.com',
                'alamat'=>'AA'
            ]
        );
        Sewa::create(
            [
                'aula_id'=>2,
                'pemesan_id'=>$pemesan4->id,
                'start'=>'2024-01-13',
                'finish'=>'2024-01-13',
                'keperluan'=>'AA',
                'status'=>false
            ]
        );
    });
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
