<?php

namespace App\Http\Controllers;

use App\Models\CopyStatus;
use Illuminate\Http\Request;

class CopyStatusController extends Controller
{

    public function index()
    {
        $copystatuses = CopyStatus::all();
        return response()->json($copystatuses);
    }


    public function store(Request $request)
      {
            $copystatus =  CopyStatus::create($request->all());
            return response()->json($copystatus, 201);
      }
}
