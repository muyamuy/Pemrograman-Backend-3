<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //get
    public function index()
    {
        $students = Student::all();
        $data = [
            "message" => "Get all resource",
            "data" => $students
        ];

        //kirim data dan respon code
        return response()->json($data, 200);
    }
    //post
    public function store(Request $request)
    {
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

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->nama = $request->input('nama', $student->nama);
        $student->nim = $request->input('nim', $student->nim);
        $student->email = $request->input('email', $student->email);
        $student->jurusan = $request->input('jurusan', $student->jurusan);

        $student->save();

        $data = [
            'message' => 'Student is updated successfully',
            'data' => $student,
        ];

        return response()->json($data, 200);
    }
    //delete
    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->delete();

        $data = [
            'message' => 'Student has been deleted successfully',
        ];

        return response()->json($data, 200);
    }
}
