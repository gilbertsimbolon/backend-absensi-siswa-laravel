<?php

namespace App\Http\Controllers;

use App\Models\ParentOfStudent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParentOfStudentController extends Controller
{
    public function store(Request $request){
        $validator = $request->validate([
            'mother_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'kk_number' => 'required|string|max:16',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:parent_of_students, email',
            'password' => 'required|string|min:8',
        ]);

        $parent = ParentOfStudent::create([
            'mother_name' => $request->mother_name,
            'father_name' => $request->father_name,
            'kk_number' => $request->kk_number,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' =>Hash::make($request->email),
        ]);

        return response()->json([
            'message' => 'Data Parent berhasil dibuat!',
            'parent' => $parent
        ], 200);
    }
}
