<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class GrafikController extends Controller
{

    public function grafik()
    {
        return view('datasensor.graph');
    }

}
