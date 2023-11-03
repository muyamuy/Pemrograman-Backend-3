<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Method get
Route::get('/animals', [AnimalController::class, 'index']);

// Method post
Route::post('/animals', [AnimalController::class, 'store']);

// Method put
Route::put('/animals/{id}', [AnimalController::class, 'update']);

// Method delete
Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);

// Route menampilkan semua siswa 
Route::get("students", [StudentController::class, "index"]);

//membuat route method post
Route::post('/students', [StudentController::class, 'store']);


//Route method update
Route::put('/students/{id}', [StudentController::class, 'update']);

//Route method Delete
Route::delete('/students/{id}', [StudentController::class, 'destroy']);

//Route untuk mendapatkan detail resource
Route::get("students/{id}", [StudentController::class, "show"]);