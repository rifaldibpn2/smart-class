<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MainController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $kelas_count = $kelas->count();

        $users = User::all();
        $users_count = $users->count();

        return view('main', [
            'kelas_count' => $kelas_count,
            'users_count' => $users_count,
        ]);
    }

    public function inactive()
    {
        return view('auth.inactive');
    }
}
