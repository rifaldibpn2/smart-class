<?php

namespace App\Http\API;

use App\Models\DataSensor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class SensorApi extends Controller
{
    public function index()
    {
        try {
            $data = DataSensor::all();
            
            return response()->json(['message' => 'Success', 'data' => $data]);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed', 'error' => $e->getMessage()]);
        }
    }

    public function addData(Request $request)
    {
        try {
            $request->validate([
                'kelas_id' => 'required',
                'humidity' => 'required',
                'projector' => 'required',
                'temperature' => 'required',
                'time' => 'required',
                'date' => 'required',
            ]);

            $dataSensor = DataSensor::create([
                'kelas_id' => $request->kelas_id,
                'humidity' => $request->humidity,
                'projector' => $request->projector,
                'temperature' => $request->temperature,
                'time' => $request->time,
                'date' => $request->date,
            ]);

            $data = DataSensor::where('id', $dataSensor->id)->get();

            return response()->json(['message' => 'Success Add Sensor', 'data' => $data]);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed', 'error' => $e->getMessage()]);
        }
    }
}
