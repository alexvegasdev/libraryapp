<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
      public function store(Request $request)
            {
                  $role = Role::create($request->all());
                  return response()->json($role, 201);
            }
}
