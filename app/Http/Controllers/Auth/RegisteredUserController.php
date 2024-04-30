<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Auth\RegisteredUserRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class RegisteredUserController extends Controller
{
    public function store(RegisteredUserRequest $request)
    {
        $user = User::create([
            'dni' => $request->dni,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
        ]);

        $user->assignRole('Customer');

        return new JsonResponse(
            data: $user,
            status: Response::HTTP_CREATED
        );
    }
}
