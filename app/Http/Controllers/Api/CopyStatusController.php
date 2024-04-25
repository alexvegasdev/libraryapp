<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\CopyStatus;
use Illuminate\Http\Request;

class CopyStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:copy.store')->only('store');
        $this->middleware('can:copy.update')->only('update');
        $this->middleware('can:copy.destroy')->only('destroy');
        $this->middleware('can:copy.index')->only('index');
        $this->middleware('can:copy.show')->only('show');
    }

    public function index()
    {
        return response()->json(CopyStatus::get());
    }

    public function store(Request $request)
    {
            $copystatus =  CopyStatus::create($request->all());
            return response()->json($copystatus, 201);
    }

    public function update(Request $request, $id)
    {
        $copystatus = CopyStatus::findOrFail($id);
        $copystatus->update($request->all());
        return response()->json($copystatus);

    }

    public function show($id)
    {
        $copystatus = CopyStatus::findOrFail($id);
        return response()->json($copystatus);
    }

    public function destroy($id)
    {
        $copystatus = CopyStatus::findOrFail($id);
        $copystatus->delete();
        return response()->json(["success"=>"Deleted copystatus"]);
    }
}
