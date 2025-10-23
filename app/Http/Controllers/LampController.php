<?php

namespace App\Http\Controllers;
use App\Models\Lamp;

use Illuminate\Http\Request;

class LampController extends Controller
{
    //
    public function index(){
        $lamps = Lamp::latest()->get();
        return view('lamps.index',compact('lamps'));
    }
}
