<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class StudentController extends Controller
{
    //get
    public function index()
    {
        $students = Student::all();
        //jika data kosong kirim status code 204
        if ($students->isEmpty()) {
            $data = [
                "message" => "Resource is empty"
            ];
            return response()->json($data, 204);
        }
        $data = [
            "message" => "Get all resource",
            "data" => $students
        ];

        //kirim data dan respon code
        return response()->json($data, 200);
    }
     //Snow
     public function show($id){
        $student = Student::find($id);
        
        if ($student){
            $data = [
                'message' => 'Get detail student',
                'data' => $student,
            ];
            return response()->json($data. 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];
            return response()->json($data, 404);
        }
    }
    //post
    public function store(Request $request)
    {
        //validasi request
        $request->validate([
            "nama" => "required",
            "nim" => "required",
            "email" => "required|email",
            "jurusan" => "required"
        ]);
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];
        $student = Student::create($input);

        $data = [
            'message' => 'Student is created succesfully',
            'data' => $student,
        ];
        return response()->json($data, 201);
    }
    //update
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if ($student) {
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ];
            $student->update($input);

            $data = [
                'message' => 'Student is updated',
                'data' => $student,
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];
            return response()->json($data, 404);
        }
    }
    //delete
    public function destroy($id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->delete();
            $data = [
                'message' => 'Student is deleted'
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];
        }
        return response()->json($data, 404);
    }
   
}
