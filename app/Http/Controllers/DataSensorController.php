<?php

namespace App\Http\Controllers;

use App\Models\DataSensor;
use Illuminate\Http\Request;

class DataSensorController extends Controller
{
    public function index()
    {
        $DataSensor = DataSensor::all();

        return view('datasensor.index', ['DataSensor' => $DataSensor]);
    }

    public function create()
    {
        return view('datasensor.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        DataSensor::create($data);
        return redirect()->route('datasensor');
    }

    public function edit($id)
    {
        $datasensor = DataSensor::findOrFail($id);

        return view('datasensor.edit', ['datasensor' => $datasensor]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $DataSensor = DataSensor::findOrFail($id);
        $DataSensor->update($data);

        return redirect()->route('datasensor');
    }

    public function destroy($id)
    {
        $data = DataSensor::findOrFail($id);
        $data->delete();

        return redirect()->route('datasensor');
    }
}
