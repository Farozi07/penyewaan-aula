<?php

namespace App\Http\Controllers;

use App\Models\Pemesan;
use App\Models\Sewa;
use App\Models\Aula;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PemesanController extends Controller
{
    public function index(){
        return view('index');
    }
    public function create(){
        $aula = Aula::all();
        return view ('form_pemesan',['aula'=>$aula]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'no_ktp'=>'required',
            'nama'=>'required',
            'telp'=>'required',
            'email'=>'required',
            'start'=>'required',
            'finish'=>'required',
            'alamat'=>'required',
            'aula'=>'required |in:1,2,3',
            'keperluan'=>'required',

        ], [
            'required' =>  'Data Tidak Boleh Kosong',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // buat data pemesan
        $pemesan = Pemesan::create([
            'no_ktp' => $request->no_ktp,
            'nama' => $request->nama,
            'telp' => $request->telp,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        $sewa = Sewa::create([
            'aula_id' => $request->aula,
            'pemesan_id' => $pemesan->id,
            'start' => $request->start,
            'finish' => $request->finish,
            'keperluan' => $request->keperluan,
            'status' => false,
        ]);
        return redirect()->route('pemesan.index')->with('success', 'Data berhasil disimpan.');

    }
    public function update($id){

    }
}
