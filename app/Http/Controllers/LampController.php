<?php

namespace App\Http\Controllers;


use App\Models\Lamp;

class LampController extends Controller
{
    public function index()
    {
        $lamps = Lamp::latest()->get();

        return view('lamps.index', compact('lamps'));
    }

    public function updateLamp($id){
        $lamp = Lamp::findOrFail($id);

        if ($lamp->status == 1){

            $lamp->update(['status' => 0]);

            $lamp->histories()->create(['status' => 'OFF']);

            return response()->json([
                'success' => true,
                'message' => $lamp->name . 'Berhasil Dimatikan',
                'data' => $lamp
            ]);
        } elseif ($lamp->status == 0){

            $lamp->update(['status' => 1]);

            $lamp->histories()->create(['status' => 'ON']);

            return response()->json([
                'success' => true,
                'message' => $lamp->name . 'Berhasil Dihidupkan',
                'data' => $lamp
            ]);
        }
    }
}
