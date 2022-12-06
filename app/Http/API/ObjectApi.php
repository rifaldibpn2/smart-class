<?php
namespace App\Http\API;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ObjectApi extends Controller
{
    public function index()
    {
        $data = Kelas::all();
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function updateData(Request $request) {
        $data = $request->all();

        $cl = Kelas::findOrFail(1);

        $cl->update($data);

        return response()->json(['message' => 'Updated!']);
    }
}
