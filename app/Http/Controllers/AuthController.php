<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'password' => 'required|string',
        ]);

        try {
            $user = User::create([
                'name' => $validatedData['username'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'password' => bcrypt($validatedData['password']),
            ]);

            $token = $user->createToken('auth-token')->plainTextToken;
            return response()->json(['token' => $token], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to register'], 500);
        }
    }
}
