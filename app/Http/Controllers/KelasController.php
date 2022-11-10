<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $Kelas = Kelas::all();

        return view('kelas.index', ['Kelas' => $Kelas]);
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Kelas::create($data);
        return redirect()->route('kelas');
    }

    public function edit($id)
    {
        $Kelas = Kelas::findOrFail($id);

        return view('kelas.edit', ['Kelas' => $Kelas]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $Kelas = Kelas::findOrFail($id);
        $Kelas->update($data);

        return redirect()->route('kelas');
    }

    public function destroy($id)
    {
        $data = Kelas::findOrFail($id);
        $data->delete();

        return redirect()->route('kelas');
    }
}
