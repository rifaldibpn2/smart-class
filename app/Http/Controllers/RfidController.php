<?php

namespace App\Http\Controllers;

use App\Models\KelasRfid;
use Illuminate\Http\Request;

class RfidController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->from;
        $to = $request->to;

        $rfid = KelasRfid::all();

        return view('rfid.index', [
            'from' => $from,
            'to' => $to,
            'rfid' => $rfid
        ]);
    }
}
