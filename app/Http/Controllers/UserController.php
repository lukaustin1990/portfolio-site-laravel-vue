<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function signup(Request $request)
    {
        // 1. validate
        $data = $request->validate([
            "email" => "required|email|unique:users,email",
            "password" => "required|string|min:6|confirmed"
        ]);

        // 2. create user
        $user = User::create([
            "email" => $data["email"],
            "password" => bcrypt($data["password"])
        ]);
        
        // 3. log them in
        Auth::login($user);
        
        // 4. return response
        return response()->json([
            "success" => true,
            "user" => $user->only(["id", "email"])
        ], 201);
    }    

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required|string"
        ]);

        $remember = $request->boolean("remember");

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return response()->json([
                "success" => true,
                "user" => Auth::user()->only(["id", "email"])
            ], 200);
        }

        return response()->json(["message" => "Invalid credentials"], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(["message" => "Logged out successfully"], 200);
    }
}
