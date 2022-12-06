<?php
namespace App\Http\API;

use App\Models\DataSensor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SensorApi extends Controller
{
    public function index()
    {
        $data = DataSensor::all();
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function addData(Request $request) {
        $data = $request->all();

        $cl = DataSensor::create($data);

        return response()->json(['message' => 'Added!']);
    }
}

?>