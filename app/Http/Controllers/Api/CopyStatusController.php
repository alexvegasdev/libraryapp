<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\LoanStatus;
use Illuminate\Http\Request;

class CopyStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:copystatuses.store')->only('store');
        $this->middleware('can:copystatuses.update')->only('update');
        $this->middleware('can:copystatuses.destroy')->only('destroy');
        $this->middleware('can:copystatuses.index')->only('index');
        $this->middleware('can:copystatuses.show')->only('show');
    }

    public function index()
    {
        return response()->json(LoanStatus::get());
    }

    public function store(Request $request)
    {
            $loanStatus =  LoanStatus::create($request->all());
            return response()->json($loanStatus, 201);
    }

    public function update(Request $request, $id)
    {
        $loanStatus = loanStatus::findOrFail($id);
        $loanStatus->update($request->all());
        return response()->json($loanStatus);

    }

    public function show($id)
    {
        $loanStatus = loanStatus::findOrFail($id);
        return response()->json($loanStatus);
    }

    public function destroy($id)
    {
        $loanStatus = loanStatus::findOrFail($id);
        $loanStatus->delete();
        return response()->json(["success"=>"Deleted loanstatus"]);
    }
}
