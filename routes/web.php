<?php

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CobaPhpWord;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ROOT
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('index');
});

// LOGIN DAN LOGOUT
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisterController::class, 'store']);

    Route::get('login', [LoginController::class, 'index'])
        ->name('login');

    Route::post('login', [LoginController::class, 'auth']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('logout');
});


Route::middleware('auth')->prefix('dashboard')->group(function () {
    // Page Route
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/profile', ProfileController::class);
    Route::delete('/user-profile/delete', [ProfileController::class, 'deleteProfil']);
    Route::put('/update-password', [ProfileController::class, 'updatePassword']);
    Route::get('/faq', [DashboardController::class, 'faq']);
});

// ROUTE SURAT MASUK
Route::resource('/surat_masuk', SuratMasukController::class);

// ROUTE SURAT KELUAR
Route::resource('/surat_keluar', SuratKeluarController::class);

// ROUTE GET DATA
Route::middleware('auth')->prefix('get')->group(function () {
    Route::get('/surat_masuk', [SuratMasukController::class, 'getData']);
    Route::get('/surat_keluar', [SuratKeluarController::class, 'getData']);
});

// ROUTE RESTORE DATA
Route::middleware('auth')->prefix('restore')->group(function () {
    Route::post('/surat_masuk/{id}', [SuratMasukController::class, 'restore']);
});



Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/coba', [CobaPhpWord::class, 'index']);
