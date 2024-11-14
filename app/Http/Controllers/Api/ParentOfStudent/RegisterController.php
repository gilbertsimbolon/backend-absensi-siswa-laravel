<?php

namespace App\Http\Controllers\Api\ParentOfStudent;

use Illuminate\Http\Request;
use App\Models\ParentOfStudent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'mother_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'kk_number' => 'required|string|max:16',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'email' => 'required|string|unique:parent_of_students',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
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

        // set header authorization dengan type bearer + token baru
        $request->headers->set('Authorization', 'Bearer' . $parent);

        if ($parent) {
            return response()->json([
                'status' => true,
                'message' => 'Pendaftaran Berhasil!!'
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Pendaftaran Gagal!!',
            ], 400);
        }
    }
}
