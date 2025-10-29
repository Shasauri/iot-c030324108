<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Lamp;

class LampController extends Controller
{
    /**
     *
     * @return void
     */
    public function index()
    {
        // get data lamps
        $lamps = Lamp::latest()->get();

        // return response
        return response()->json([
            'success' => true,
            'message' => 'List Data Lamps',
            'data'    => $lamps
        ]);
    }

    /**
     * Update Lamp Status
     *
     * @param mixed $id
     * @return void
     */
    public function updateLamp($id)
    {
        // find lamp
        $lamp = Lamp::findOrFail($id);

        // update lamp
        if ($lamp->status == 1){

            // update lamp
            $lamp->update(['status' => 0]);

            // insert history
            $lamp->histories()->create([
                'status' => 'OFF'
            ]);

            // return response
            return response()->json([
                'success' => true,
                'message' => $lamp->name . ' Berhasil Dimatikan',
                'data'    => $lamp
            ]);
        } elseif ($lamp->status == 0){

            // update lamp
            $lamp->update(['status' => 1]);

            // insert history
            $lamp->histories()->create([
                'status' => 'ON'
            ]);

            // return response
            return response()->json([
                'success' => true,
                'message' => $lamp->name . ' Berhasil Dihidupkan',
                'data'    => $lamp
            ]);
        }
   }
}
