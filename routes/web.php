<?php

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CobaPhpWord;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

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


Route::get('/', function () {
    return view('pages/index');
});

Route::resource('/keuangan', [KeuanganController::class, 'index']);
