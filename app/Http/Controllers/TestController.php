<?php

namespace App\Http\Controllers;
use App\Models\Pemesan;
use App\Models\Sewa;
use App\Models\Aula;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $events=[];
        $datas=Sewa::with(['pemesan','aula'])->where('status',true)->get();

        foreach ($datas as $data) {
            $events[]=[
                'nama'=>$data->aula->nama,
                'start'=>$data->start,
                'finish'=>$data->finish,
            ];
        }
        // return $events;
        return view('test', compact('events'));
    }
}
