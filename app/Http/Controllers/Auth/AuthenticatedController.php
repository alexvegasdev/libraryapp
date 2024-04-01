<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthenticatedController extends Controller
{
    public function store(LoginRequest $request)
    {
        if (Auth::attempt($request->all())) {
            return response()->json(['token' => $request->user()->createToken('token')->plainTextToken], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Credenciales inválidas.'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return new JsonResponse([
            'message' => 'Cerró sesión exitosamente.',
        ], Response::HTTP_OK);
    }
}
