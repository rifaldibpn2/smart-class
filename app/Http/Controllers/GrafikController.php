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

        if ($from != NULL && $to != NULL) {
            $data = DataSensor::where("kelas_id", "=", $id)
                ->where("created_at", ">=", $from)
                ->where("created_at", "<=", $to)
                ->orderBy("date", "asc")
                ->limit(20)
                ->get();
        } else {
            $data = DataSensor::where('kelas_id', $id)
                ->orderBy("date", "asc")
                ->limit(20)
                ->get();
        }

        return view('datasensor.graph', [
            'id' => $id,
            'from' => $from,
            'to' => $to,
            'kelas' => $kelas,
            'data' => $data,
        ]);
    }

    public function table(Request $request)
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

        if ($from == NULL && $to == NULL) {
            $data = DataSensor::where('kelas_id', $id)->get();
        } else {
            $data = DataSensor::where('kelas_id', $id)->whereBetween("created_at", [$from, $to])->get();
        }

        return view('datasensor.table', [
            'id' => $id,
            'from' => $from,
            'to' => $to,
            'kelas' => $kelas,
            'data' => $data,
        ]);
    }
}
