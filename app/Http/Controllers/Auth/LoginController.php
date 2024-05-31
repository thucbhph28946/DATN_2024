<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if (!auth()->attempt($request->only('email', 'password'))) { // check người dùng | ! khác
            return response()->json(['success' => false, 'message' => 'Tài khoản hoặc mật khẩu không đúng.'], 401);
        }

        $user = auth()->guard('api')->user(); // lấy data
        $user->tokens()->delete(); // xoá token
        $deviceName = $request->input('device_name', $request->email); // tạo tên
        $token = $user->createToken($deviceName, $user->withAccessTokenAbilities()); // tạo mới token

        $data = [
            'success' => true,
            'message' => 'Đăng nhập thành công',
            'data' => new UserResource($user),
            'extra' => [
                'authToken' => $token->plainTextToken,
                'tokenType' => 'Bearer',
                'role' => $user->role,
            ],
        ];

        return response()->json($data, 200);
    }
    public function logout(Request $request)
    {
        if (Auth::guard('api')->check()) { // check login
            Auth::guard('api')->user()->tokens()->delete();
            return response()->json(['success'=>true,'message' => 'Đăng xuất thành công'], 200);
        } else {
            return response()->json(['success'=>false,'message' => 'Không tìm thấy người dùng đăng nhập'], 404);
        }
    }



}
