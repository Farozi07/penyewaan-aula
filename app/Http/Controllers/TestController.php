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
        $events = [];
        $data = Sewa::all();
        if($data->count()){
           foreach ($data as $key => $value) {
             $events[] = Calendar::event(
                 $value->title,
                 true,
                 new \DateTime($value->start),
                 new \DateTime($value->end.' +1 day')
             );
           }
        }
       $calendar = Calendar::addEvents($events);
       return view('fullcalendar', compact('calendar'));
    }
}
