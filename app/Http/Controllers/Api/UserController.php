<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('can:users.store')->only('store');
        // $this->middleware('can:users.update')->only('update');
        // $this->middleware('can:users.destroy')->only('destroy');
        // $this->middleware('can:users.show')->only('update');
        // $this->middleware('can:users.index')->only('destroy');
    }
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }
}
