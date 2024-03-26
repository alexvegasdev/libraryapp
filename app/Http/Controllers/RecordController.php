<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use App\Models\Record;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::with('copies')->get();
        return response()->json($records);
    }

    public function asociate(Request $request)
    {
        $request->validate([
            'record_id' => 'required|exists:records,id',
            'copy_id' => 'required|exists:copies,id',
        ]);
    
        $record = Record::findOrFail($request->record_id);
        $copy = Copy::findOrFail($request->copy_id);
        
        if ($copy->status_id == 1) {
            $record->copies()->attach($request->copy_id);
    
            $copy->status_id = 2; 
            $copy->save();

            $pivotInfo = $record->copies()->where('copies.id', $request->copy_id)->first()->pivot;
            
            return response()->json($pivotInfo, 201);
        } else {
            return response()->json(['message' => 'La copia ya está reservada y no se puede asociar a este registro.'], 409);
        }
    }

    public function store(Request $request)
    {
        $record = Record::create($request->all());
        return response()->json($record, 201);
    }

    public function show($id)
    {
        $record = Record::findOrFail($id);
        return response()->json($record);
    }

    public function update(Request $request, $id)
    {

        $record = Record::findOrFail($id);
        $record->update($request->all());
        return response()->json($record);
    }

    public function destroy($id)
    {
        $record = Record::findOrFail($id);

        $copies = $record->copies;

        foreach ($copies as $copy) {
            $copy->status_id = 1;
            $copy->save();
        }

        $record->copies()->detach();

        $record->delete();

        return response()->json(['message' => 'Record eliminado con éxito.']);
    }

}
