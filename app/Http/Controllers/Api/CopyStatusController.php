<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\CopyStatus;
use Illuminate\Http\Request;

class CopyStatusController extends Controller
{

    public function index()
    {
        $copystatuses = CopyStatus::all();
        return response()->json($copystatuses);
        $this->middleware('can:copy.store')->only('store');
        $this->middleware('can:copy.update')->only('update');
        $this->middleware('can:copy.destroy')->only('destroy');
        $this->middleware('can:copy.index')->only('index');
        $this->middleware('can:copy.show')->only('show');
    }


    public function store(Request $request)
    {
            $copystatus =  CopyStatus::create($request->all());
            return response()->json($copystatus, 201);
    }
}
