<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Show the login form
    public function loginForm()
    {
        return view('auth.login'); // Make sure this view file exists
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Get the authenticated user
        $user = Auth::user();

        // Use Sanctum's createToken method to generate a token
        $token = $user->createToken('YourAppName')->plainTextToken;

        return response()->json(['token' => $token]);
    }

    public function logout(Request $request)
    {
        // Revoke the token that was used for the request
        $request->user()->tokens()->delete(); // Revoking all tokens for this user

        return response()->json(['message' => 'Successfully logged out.']);
    }
}
