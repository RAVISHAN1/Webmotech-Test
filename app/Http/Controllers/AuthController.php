<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->plainTextToken;

            return response()->json([
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'message' => 'Login successful.'
            ]);
        }

        return response()->json(['message' => 'Invalid credentials.'], 401);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Create the user
        $user = User::create([
            'fname'     => $request->input('first_name'),
            'lname'     => $request->input('last_name'),
            'external_user_id' => User::max('external_user_id') + 1,
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password')),
        ]);

        $token = $user->createToken('AuthToken')->plainTextToken;

        return response()->json(
            [
                'user' => $user->refresh(),
                'access_token' => $token,
                'message' => 'Registration successful.'
            ],
            201
        );
    }
}
