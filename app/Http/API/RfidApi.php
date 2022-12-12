<?php

namespace App\Http\API;

use App\Http\Controllers\Controller;
use App\Models\Rfid;
use Exception;
use Illuminate\Http\Request;

class RfidApi extends Controller
{
    public function getRfid()
    {
        try {
            $data = Rfid::all();

            return response()->json(['message' => 'Success', 'data' => $data]);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed', 'error' => $e->getMessage()]);
        }
    }

    public function storeRfid(Request $request)
    {
        try {
            $request->validate([
                'rfid_number' => 'required',
                'status' => 'required',
                'date' => 'required',
                'time' => 'required',
            ]);

            $check = Rfid::where('rfid_number', $request->rfid_number)->get();

            if ($check->count() > 0) {
                $rfid = Rfid::where('rfid_number', $request->rfid_number)->update([
                    'rfid_number' => $request->rfid_number,
                    'status' => $request->status,
                    'date' => $request->date,
                    'time' => $request->time,
                ]);
            } else {
                $rfid = Rfid::create([
                    'rfid_number' => $request->rfid_number,
                    'status' => $request->status,
                    'date' => $request->date,
                    'time' => $request->time,
                ]);
            }

            return response()->json(['message' => 'Success', 'data' => $rfid]);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed', 'error' => $e->getMessage()]);
        }
    }
}
