<?php

namespace App\Http\Controllers;

use App\Models\Pemesan;
use Illuminate\Http\Request;
use App\Models\Sewa;
use App\Models\Aula;

use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function dashboard(){
        return view ('dashboard');
    }
    public function list(Request $request){
        $search = $request->input('search');

        $pemesan = Pemesan::when($search, function ($query, $search) {
                            return $query->where('nama', 'like', '%' . $search . '%')
                                         ->orWhere('no_ktp', 'like', '%' . $search . '%');
                        })->paginate(10);
        $pemesan=Pemesan::all();
        return view ('list_pemesan',['pemesan'=>$pemesan]);
    }
    public function arsip(Request $request){
        $search = $request->input('search');

        $pemesan = Pemesan::onlyTrashed()
                        ->when($search, function ($query, $search) {
                            return $query->where('nama', 'like', '%' . $search . '%')
                                         ->orWhere('no_ktp', 'like', '%' . $search . '%');
                        })->paginate(10);

        return view('arsip_pemesan', ['pemesan' => $pemesan]);
    }
    public function create(){
        $aula = Aula::all();
        return view ('admin_create',['aula'=>$aula]);
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
        return redirect()->route('admin.list')->with('success', 'Data berhasil disimpan.');
    }
    public function delete($id){
        Pemesan::find($id)->delete();
        return redirect(route('admin.list'))->with('success','Data berhasil berhasil dihapus');
    }
}
