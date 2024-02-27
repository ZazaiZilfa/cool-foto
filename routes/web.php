<?php

use PharIo\Manifest\Library;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\web\PosttController;
use App\Http\Controllers\web\AboutController;
use App\Http\Controllers\web\loginController;
use App\Http\Controllers\web\BerandaController;
use App\Http\Controllers\web\PrivateController;
use App\Http\Controllers\web\SessionController;
use App\Http\Controllers\web\LibraryController;
use App\Http\Controllers\web\WishlistController;
use App\Http\Controllers\web\AdminPostController;
use App\Http\Controllers\web\AdminUsersController;
use App\Http\Controllers\web\UploadimageController;
use App\Http\Controllers\web\AdminPaymentController;
use App\Http\Controllers\web\AdminKategoriController;
use App\Http\Controllers\web\AdminDashboardController;

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

Route::get('/', function () {
    return redirect()->route('login');
});



Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::post('/logout', [loginController::class, 'logout'])->name('logout');
// Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');


// Route::middleware(['auth:sanctum'])->group(function () {
Route::get('/datasession', [SessionController::class, 'me'])->name('datasession');
// Route::middleware(['auth'])->get('/protected', function () {

//admin routes
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
Route::get('/admin/post', [AdminPostController::class, 'index']);
Route::delete('/admin/post/{id}', [AdminPostController::class, 'destroy'])->name('delete.post');
Route::get('/admin/kategori', [AdminKategoriController::class, 'index'])->name('adminkat');
Route::post('/admin/kategori', [AdminKategoriController::class, 'store']);
Route::get('/admin/kategori/{id}', [AdminKategoriController::class, 'edit']);
Route::put('/admin/kategori/{id}', [AdminKategoriController::class, 'update']);
Route::delete('/admin/kategori/{id}', [AdminKategoriController::class, 'destroy'])->name('delete.kategori');
Route::get('/admin/payment', [AdminPaymentController::class, 'index']);
Route::get('/admin/users', [AdminUsersController::class, 'index']);
Route::delete('/admin/users/{id}', [AdminUsersController::class, 'destroy'])->name('delete.users');
// })->name('protected');



//user
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
Route::get('/about', [AboutController::class, 'index']);
Route::get('/shop', [PosttController::class, 'index']);
Route::get('/shop/{id}', [PosttController::class, 'show'])->name('shop.detail');
Route::get('/shop/kat/{id}', [PosttController::class, 'showkategori']);
Route::get('/galery', [LibraryController::class, 'index']);
Route::get('/upimage', [UploadimageController::class, 'index']);
Route::get('/private', [PrivateController::class, 'index']);
Route::get('/wishlist', [WishlistController::class, 'index']);




// Route::get('/logout', [AuthController::class, 'logout']);
