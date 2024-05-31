<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Resources\UserResource;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users',
            // 'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'phone' => $request->phone,
            'role' => 0,
            'password' => Hash::make($request->password),
        ]);
        // token check login FE
        $user->tokens()->delete();

        $deviceName = $request->input('device_name', $request->email);
        $token = $user->createToken($deviceName);

        $data = [
            'success' => true,
            'result' => new UserResource($user),
            'extra' => [
                'authToken' => $token->plainTextToken,
                'tokenType' => 'Bearer',
            ],
        ];

        return response()->json($data, 201);
    }
}
