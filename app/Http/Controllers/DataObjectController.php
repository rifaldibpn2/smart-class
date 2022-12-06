<?php

namespace App\Http\Controllers;

use App\Models\DataObject;
use Illuminate\Http\Request;

class DataObjectController extends Controller
{
    public function index()
    {
        $DataObject = DataObject::all();

        return view('dataobject.index', ['DataObject' => $DataObject]);
    }

    public function create()
    {
        return view('dataobject.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        DataObject::create($data);
        return redirect()->route('dataobject');
    }

    public function edit($id)
    {
        $dataobject = DataObject::findOrFail($id);

        return view('dataobject.edit', ['dataobject' => $dataobject]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $DataObject = DataObject::findOrFail($id);
        $DataObject->update($data);

        return redirect()->route('dataobject');
    }

    public function destroy($id)
    {
        $data = DataObject::findOrFail($id);
        $data->delete();

        return redirect()->route('dataobject');
    }
}
