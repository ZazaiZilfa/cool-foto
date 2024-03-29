<?php

use Illuminate\Http\Request;
use App\Http\Controllers\images;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DashboardController;

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
Route::post('/register', [AuthController::class, 'register']);

Route::get('images', [images::class, 'index']);

// Route::middleware(['auth:sanctum'])->group(function () {
Route::get('/me', [AuthController::class, 'me']);
// Route::get('/logout', [AuthController::class, 'logout']);

// Route::middleware(['CheckUserRole:admin'])->group(function () {
Route::prefix('admin')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'show']);
    });
    Route::prefix('kategori')->group(function () {
        Route::get('/', [KategoriController::class, 'index']);
        Route::get('/{id}', [KategoriController::class, 'show']);
        Route::post('/', [KategoriController::class, 'store']);
        Route::put('/{id}', [KategoriController::class, 'update']);
        Route::delete('/{id}', [KategoriController::class, 'destroy']);
    });
    Route::prefix('post')->group(function () {
        Route::get('/', [postController::class, 'index']);
        Route::post('/', [postController::class, 'store']);
        Route::patch('/{id}', [postController::class, 'update']);
        Route::delete('/{id}', [postController::class, 'destroy']);
        // Route::get('kat/{id}', [PostController::class, 'showkat']);
    });
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::patch('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });
});
// });

// Route::middleware(['CheckUserRole:user'])->group(function () {
// Routes accessible only to regular users
Route::get('/shop', [PostController::class, 'index']);
Route::get('/shop/{id}', [PostController::class, 'show']);
Route::get('/shop/kat/{id}', [PostController::class, 'showkat']);
Route::post('/uploadpost', [PostController::class, 'store']);
Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::get('/{id}', [KategoriController::class, 'show']);
});

Route::get('wishlist', [WishlistController::class, 'index']);
Route::post('wishlist', [WishlistController::class, 'store']);
Route::delete('wishlist/{id}', [WishlistController::class, 'destroy']);

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
