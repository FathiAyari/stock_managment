<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $request->validated();
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $user = User::create($userData);
        $token = $user->createToken('forumapp')->plainTextToken;
        return response([
            'user' => $user,
            'token' => $token,
            'message' => 'welcome'
        ], 200);

    }
    public function login(LoginRequest $request)
    {
        $request->validated();
        $user = User::whereEmail($request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response(['message' => "les informations d'identification test"], 422);
        }
        $token = $user->createToken('forumapp')->plainTextToken;
        return response([
            'user' => $user,
            'token' => $token
        ], 200);
    }
}
