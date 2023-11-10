<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //membuat fitur register
    public function register(Request $request) {
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        $user = User::create($input);
        $data = [
            'message' => 'User is created successfully'
        ];

        //Mengirim response JSON
        return response()->json($data, 200);
    }
    
    public function login(Request $request) {
        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

        //Mengambil data user (DB)
        $user = User::where('email', $input['email'])->first();

        $isLoginSuccessfully = (
            $input['email'] == $user->email
            &&
            Hash::check($input['password'], $user->password)
        );
        if ($isLoginSuccessfully) {
            //membuat token
            $token = $user->createToken('auth_token');
            $data = [
                'message' => 'Login successfully',
                'token' => $token->plainTextToken
            ];
            //mengembalikan response JSON
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Username or Password is wrong'
            ];
            return response()->json($data,401);
        }
    }
}
