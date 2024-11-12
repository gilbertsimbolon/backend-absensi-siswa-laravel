<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentOfStudent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ParentOfStudentResources;
use ParentIterator;

class ParentOfStudentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum')->only('store');
    // }

    public function store(Request $request){

        // set header
        // header('Content-Type: application/json');

        // Comment: sistem error

        // // validasi input
        // $validateData = $request->all([
        //     'mother_name' => 'required|string|max:255',
        //     'father_name' => 'required|string|max:255',
        //     'kk_number' => 'required|string|max:16',
        //     'phone' => 'required|string|max:15',
        //     'address' => 'required|string|max:255',2
        //     'email' => 'required|string|max:255|unique:parent_of_students,email',
        //     'password' => 'required|string|min:8',
        // ]);

        // // buat data parentofstudent
        // $parent = ParentOfStudent::create([
        //     'mother_name' => $request->mother_name,
        //     'father_name' => $request->father_name,
        //     'kk_number' => $request->kk_number,
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // if($parent){
        //     return response()->json([$parent, true, 'registrasi berhasil dilakukan']);
        // }else{
        //     return response()->json([null, false, 'registrasi gagal dilakukan']);
        // }

        // if ($parent){
        //     return (new ParentOfStudentResources($parent, true, 'registrasi berhasil dilakukan'))
        //     -> response()
        //     -> setStatusCode(201);
        // }else{
        //     return (new ParentOfStudentResources(null, false, 'registrasi gagal dilakukan'))
        //     -> response()
        //     -> setStatusCode(502);
        // }

        // Comment: sistem baru

        // Validasi Data
        $validateData = Validator::make($request->all(), [
            'mother_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'kk_number' => 'required|string|max:16',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:parent_of_students,email',
            'password' => 'required|string|min:8',
        ]);

        // Jika Validasi Data Gagal.
        if($validateData->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validateData->errors()
            ], 403);
        }

        // Membuat dan memasukkan data kedalam ParentOfStudent
        $parent = ParentOfStudent::create([
            'mother_name' => $request->mother_name,
            'father_name' => $request->father_name,
            'kk_number' => $request->kk_number,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Registrasi berhasil dilakukan!',
            'data' => $parent
        ], 201);
    }

    // fungsi showDashboard()
    public function showDashboard($parent_id){
        $parent = ParentOfStudent::with('student')->findOrFail($parent_id);

        return view('parent.dashboard', [
            'parent' => $parent,
            'student' => $parent->student,
            'attendanceStatus' => $parent->student->attendanceStatus(),
        ]);
    }
}
