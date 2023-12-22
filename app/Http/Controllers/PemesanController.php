<?php

namespace App\Http\Controllers;

use App\Models\Pemesan;
use App\Models\Sewa;
use App\Models\Aula;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PemesanController extends Controller
{
    public function index(){
        $pemesan = Pemesan::all();
        return view('show_pemesan',['pemesan'=>$pemesan]);
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

        //memasukkan data ke database
        try {
            DB::transaction(function () use ($request) {
                // Simpan data Pemesan
                $pemesan = Pemesan::create([
                    'no_ktp' => $request->no_ktp,
                    'nama' => $request->nama,
                    'telp' => $request->telp,
                    'email' => $request->email,
                ]);

                // Simpan data Aula
                $aula = Aula::create([
                    'id' => $request->aula,
                ]);

                // Simpan data Sewa
                Sewa::create([
                    'aula_id' => $aula->id,
                    'pemesan_id' => $pemesan->id,
                    'start' => $request->start,
                    'finish' => $request->finish,
                    'keperluan' => $request->keperluan,
                    'status' => false,
                ]);
            });

            return redirect()->route('pemesan.index')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('pemesan.create')->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    // return redirect()->route('pemesan.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit(Pemesan $pemesan){
        return view ('editpemesan')->with('pemesan',$pemesan);
    }

    public function update(Request $request, Pemesan $pemesan){
        $validateData=$request->validate([
            'no_ktp'=> 'required',
            'nama'=> 'required',
            'telp'=> 'required',
            'email'=> 'required',
            'alamat'=> 'required',
        ]);
        $pemesan->update($validateData);
        return redirect()->route('pemesan.index',['pemesan'=>$pemesan->id])->with('Pesan',"Update data {$validateData['nama']} berhasil");
    }

    public function delete(Pemesan $pemesan){
        $pemesan->delete();
        return redirect(route('pemesan.index'))->with('pesan',"Hapus data $pemesan->nama berhasil");
    }
}
