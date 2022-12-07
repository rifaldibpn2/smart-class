<?php

namespace App\Http\Controllers;

use App\Models\DataSensor;
use App\Models\Kelas;
use Illuminate\Http\Request;

class GrafikController extends Controller
{

    public function grafik(Request $request)
    {
        $id = $request->id;
        $from = $request->from;
        $to = $request->to;

        if ($id == NULL) {
            $kelas = Kelas::all();
            if ($kelas->isEmpty()) {
                $id = null;
            } else {
                $first = $kelas->first();
                $id = $first->id;
            }
        }

        $kelas = Kelas::all();

        $data = DataSensor::where('kelas_id', $id)->get();

        return view('datasensor.graph', [
            'id' => $id,
            'from' => $from,
            'to' => $to,
            'kelas' => $kelas,
            'data' => $data,
        ]);
    }
}
