<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $is_accepted = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        /** @var User $user */
        $user = auth()->user();
        $token_result = $user->createToken('Personal Access Token')->plainTextToken;

        return response()->json([
            'token' => $token_result,
        ]);
    }

    public function refreshToken()
    {
        /** @var User $user */
        $user = auth()->user();
        $token_result = $user->refresh();

        return response()->json([
            'token' => $token_result,
        ]);
    }
}
