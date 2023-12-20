<?php

namespace App\Http\Controllers;

use App\Models\Pemesan;
use Illuminate\Http\Request;

class PemesanController extends Controller
{
    public function index(){
        $pemesan = Pemesan::all();
        return view('show_pemesan',['pemesan'=>$pemesan]);
    }
    public function create(){
        return view ('form_pemesan');
    }

    public function store(Request $request){
        $validateData=$request->validate([
            'no_ktp'=> 'required',
            'nama'=> 'required',
            'telp'=> 'required',
            'email'=> 'required',
            'alamat'=> 'required',
        ]);
        Pemesan::create($validateData);
        return redirect()->route('pemesan.index');
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
