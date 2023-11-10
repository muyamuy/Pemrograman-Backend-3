<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AuthController;
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

Route::middleware(['auth:sanctum'])->group(function () {
    // Route untuk menampilkan semua siswa
    Route::get("students", [StudentController::class, "index"]);

    // Membuat Route Students dengan Method POST
    Route::post('/students', [StudentController::class, 'store']);

    // Membuat Route Students dengan method UPDATE
    Route::put('/students/{id}', [StudentController::class, 'update']);

    // Membuat Route Students dengan method DELETE
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);

    // Membuat Route untuk mendapatkan detail student
    Route::get("students/{id}", [StudentController::class, "show"]);
});

// Membuat Route untuk Register dan Login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);