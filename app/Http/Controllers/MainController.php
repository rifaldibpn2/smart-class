<?php

namespace App\Http\Controllers;

use App\Models\DataSensor;
use App\Models\Kelas;
use App\Models\Rfid;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->page ?: 1;

        $kelas = Kelas::all();
        $kelas_count = $kelas->count();

        $sensor = DataSensor::all();
        $sensor_count = $sensor->count();

        $users = User::all();
        $users_count = $users->count();

        $data = DataSensor::latest()->first();

        $rfid = Rfid::paginate(5);

        $temperature = DataSensor::select('temperature', 'created_at')->latest()->limit(20)->get();
        $humidity = DataSensor::select('humidity', 'created_at')->latest()->limit(20)->get();
        $projector = DataSensor::select('projector', 'created_at')->latest()->limit(20)->get();

        // dd($rfid);

        return view('main', [
            'kelas_count' => $kelas_count,
            'users_count' => $users_count,
            'sensor_count' => $sensor_count,
            'data' => $data,
            'rfid' => $rfid,
            'temperature' => $temperature,
            'humidity' => $humidity,
            'projector' => $projector,

        ]);
    }

    public function inactive()
    {
        return view('auth.inactive');
    }
}
