<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Copy;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    public function index()
    {
        $copies= Copy::all();
        return response()->json($copies);
    }

    public function store(Request $request)
    {

        $copy = Copy::create($request->all());
        return response()->json($copy, 201);
    }

    public function show($id)
    {
        $copy = Copy::findOrFail($id);
        return response()->json($copy);
    }

    public function update(Request $request, $id)
    {

        $copy = Copy::findOrFail($id);
        $copy->update($request->all());
        return response()->json($copy);
    }

    public function destroy($id)
    {
        $copy = Copy::findOrFail($id);
        $copy->delete();
        return response()->json(null, 204);
    }

}

























/*
    public function store(Request $request)
    {
        

        
        $request->validate([
            'book_id' => 'required',
            'status_id' => 'required',
        ]);

        $copy = Copy::create($request->only(['book_id', 'status_id']));

        return response()->json([
            'book_id' => $copy->book_id,
            'status_id' => $copy->status_id
        ], 201);
    }*/