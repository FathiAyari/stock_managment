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
        $user = User::where('email', $request->email)->first();
if($user){
    return response([
        'error' => "used email",

    ], 300);
}
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
    public function login(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response(['error' => "user not found"], 422);
        }
        $token = $user->createToken('forumapp')->plainTextToken;
        return response([
            'user' => $user,
            'token' => $token
        ], 200);
    }
}
