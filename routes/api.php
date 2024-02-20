<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KategoriController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/login', [AuthController::class, 'login']);

// Route::middleware(['auth:sanctum'])->group(function () {
Route::get('/me', [AuthController::class, 'me']);
Route::get('/logout', [AuthController::class, 'logout']);

// Route::middleware(['CheckUserRole:admin'])->group(function () {
Route::get('/admin', function () {
    Route::prefix('/kategori')->group(function () {
        Route::get('/', [KategoriController::class, 'index']);
        Route::post('/', [KategoriController::class, 'store']);
        Route::patch('/{id}', [KategoriController::class, 'update']);
        Route::delete('/{id}', [KategoriController::class, 'destroy']);
    });
    Route::prefix('/post')->group(function () {
        Route::get('/', [postController::class, 'index']);
        Route::post('/', [postController::class, 'store']);
        Route::patch('/{id}', [postController::class, 'update']);
        Route::delete('/{id}', [postController::class, 'destroy']);
    });
});
// });

// Route::middleware(['CheckUserRole:user'])->group(function () {
// Routes accessible only to regular users
Route::get('/shop', [PostController::class, 'index']);
Route::get('/shop/{id}', [PostController::class, 'show']);
Route::post('/uploadpost', [PostController::class, 'store']);
Route::get('/user', function () {
    // User dashboard or any other user-related endpoint
});
// });
// });

// Route::get('/shop', [PostController::class, 'index'])->middleware(['auth:sanctum']);
// Route::post('/uploadpost', [PostController::class, 'store'])->middleware(['auth:sanctum']);


// Route::get('/kategori', [KategoriController::class, 'index'])->middleware(['auth:sanctum']);
// Route::post('/kategori', [KategoriController::class, 'store'])->middleware(['auth:sanctum']);
// Route::patch('/kategori/{id}', [KategoriController::class, 'update'])->middleware(['auth:sanctum']);
// Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->middleware(['auth:sanctum']);
