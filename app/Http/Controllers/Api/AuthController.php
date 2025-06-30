<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Validator;
use Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' =>'required|string|max:255',
            'email' =>'required|string|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        //jika validasi gagal

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->Hash::make($request->password),
        ]);

        return response()->json([
            'data' => $user,
            'message' =>'Akun berhasil dibuat mantap',
        ],201);

    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email','password'))) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = User::where('email', $request->email)->firstorfail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'access_token' => $token,
            'token_type'   => 'Bearer Token',
        ], 200);


    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'message'   => 'Logout berhasil',
        ], 200);
    }
}
