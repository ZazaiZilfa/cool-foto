<?php

use PharIo\Manifest\Library;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\web\PostController;
use App\Http\Controllers\web\AboutController;
use App\Http\Controllers\web\BerandaController;
use App\Http\Controllers\web\PrivateController;
use App\Http\Controllers\web\LibrarytController;
use App\Http\Controllers\web\WishlistController;
use App\Http\Controllers\web\AdminPostController;
use App\Http\Controllers\web\UploadimageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/login', [AuthController::class, 'login']);

// Route::middleware(['auth:sanctum'])->group(function () {
Route::get('/me', [AuthController::class, 'me']);


Route::get('/beranda', [BerandaController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/shop', [PostController::class, 'index']);
Route::get('/library', [LibrarytController::class, 'index']);
Route::get('/upimage', [UploadimageController::class, 'index']);
Route::get('/private', [PrivateController::class, 'index']);
Route::get('/wishlist', [WishlistController::class, 'index']);

Route::get('/admin/post', [AdminPostController::class, 'index']);


Route::get('/logout', [AuthController::class, 'logout']);
