<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesan;
use App\Models\Sewa;
use App\Models\Aula;

use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function dashboard(){
        return view ('dashboard');
    }
    public function list(){
        $data=Sewa::with(['pemesan','aula'])->where('status',false)->get();
        // return $data;
        return view ('list_pemesan',compact('data'));
    }
    public function booked(){
        $data=Sewa::with(['pemesan','aula'])->where('status',true)->get();
        // return $data;
        return view ('booked',compact('data'));
    }
    public function status(Request $request, $id){
    $sewa = Sewa::find($id);
    $sewa->update(['status' => true]);
    return redirect()->route('admin.list')->with('success', 'Pesanan telah Diterima.');
    }
    public function arsip(){
        $data=Sewa::with(['pemesan','aula'])->onlyTrashed()->get();
        // return $data;
        return view ('arsip_pemesan',compact('data'));
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
        Sewa::find($id)->delete();
        return redirect(route('admin.booked'))->with('success','Data berhasil diarsip');
    }
}
