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

        // dd($rfid);

        return view('main', [
            'kelas_count' => $kelas_count,
            'users_count' => $users_count,
            'sensor_count' => $sensor_count,
            'data' => $data,
            'rfid' => $rfid,
        ]);
    }

    public function inactive()
    {
        return view('auth.inactive');
    }
}
