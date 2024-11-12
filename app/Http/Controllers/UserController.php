<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\alert;

class UserController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    // fungsi login user
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user = User::where('email', $request->password, $user->password)){
            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function showRegistrationForm(){
        return view('auth.register');
    }

    // fungsi register user
    public function register(Request $request){
        $validateData = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        if($validateData->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Validation error.',
                'errors' => $validateData->errors(),
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');

        // $token = $user->createToken('auth_token')->plainTextToken;

        // return response()->json([
        //     'message' => 'User successfully registered',
        //     'user' => $user,
        //     // 'token' => $token
        // ], 201);
    }
}
