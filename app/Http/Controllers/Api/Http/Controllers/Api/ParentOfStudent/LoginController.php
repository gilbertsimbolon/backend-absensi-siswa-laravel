<?php

namespace App\Http\Controllers\Api\Http\Controllers\Api\ParentOfStudent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        // set validasi
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        // get email dan password dari input
        $credentials = $request->only('email', 'password');

        // check jika email dan password tidak sesuai
        if(!$token = auth()->guard('api_parent_of_students')->attempt($credentials)){
            // respon login gagal
            return response()->json([
                'success' => false,
                'message' => 'Email or Password is incorrect'
            ], 401);
        }
        // respon login sukses dengan generate token
        return response()->json([
            'success' => true,
            'user' => auth()->guard('api_parent_of_students')->user(),
            'token' => $token
        ], 200);
    }

    public function getUser()
    {
        return response()->json([
            'success' => true,
            'user' => auth()->guard('api_parent_of_students')->user()
        ], 200);
    }

    public function refreshToken(Request $request)
    {
        $refreshToken = JWTAuth::refresh(JWTAuth::getToken());

        // set user dengan token baru
        $user = JWTAuth::setToken($refreshToken)->toUser();

        // set header "Authorization" dengan type Bearer + token baru
        $request->header->set('Authorization','Bearer'.$refreshToken);

        // respon data user dengan token baru
        return response()->json([
            'success' => true,
            'user' => $user,
            'token' => $refreshToken,
        ], 200);
    }

    public function logout()
    {
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        // respon sukses logout
        return response()->json([
            'success' => true,
        ], 200);
    }
}
