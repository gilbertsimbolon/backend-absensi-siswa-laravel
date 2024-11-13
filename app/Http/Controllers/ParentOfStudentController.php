<?php

namespace App\Http\Controllers;

use App\Models\ParentOfStudent;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ParentOfStudentController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api_parent_of_students', ['except' => ['login', 'store']]);
    }

    public function store(){
        $validator = Validator::make(request()->all(), [
            'mother_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'kk_number' => 'required|string|max:16',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'email' => 'required|string|unique:parent_of_students',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response()->json($validator->messages());
        }

        $parent = ParentOfStudent::create([
            'mother_name' => request()->mother_name,
            'father_name' => request()->father_name,
            'kk_number' => request()->kk_number,
            'phone' => request()->phone,
            'address' => request()->address,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
        ]);

        if($parent){
            return response()->json(['message' => 'Pendaftaran Berhasil!!']);
        }else{
            return response()->json(['message' => 'Pendaftaran Gagal!!']);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api_parent_of_students')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function dashboard(){
        // mengambil data orang tua yang sedang login
        $parent = Auth::user();

        $students = $parent->students;

        // Comment : Greetings
        $currentHour = Carbon::now()->format('H');
        $greeting = '';

        if($currentHour >= 5 && $currentHour < 12){
            $greeting = 'Selamat Pagi, Orang Tua';
        }elseif($currentHour >= 12 && $currentHour < 18){
            $greeting = 'Selamat Siang, Orang Tua';
        }else{
            $greeting = 'Selamat Malam, Orang Tua';
        }

        $studentName = $students->first()->name;

        $fullGreeting = "{$greeting} {$studentName}!";

        // Informasi absensi
        

        // mengembalikan nilai json
        return response()->json([
            'status' => true,
            // 'message' => 'Data berhasil diambil.',
            'greetings' => $fullGreeting,
        ]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }


    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
