<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MobilerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\BarangLabController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HabisPakaiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\TenagaDosenController;
use App\Http\Controllers\BelanjaModalController;
use App\Http\Controllers\PemeliharaanController;
use App\Http\Controllers\TenagaTendikController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TenagaKontrakController;
use App\Http\Controllers\PelatihanDosenController;
use App\Http\Controllers\PelatihanTendikController;
use App\Http\Controllers\Utils\NewsletterController;

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

Route::middleware('auth')->prefix('surat_masuk')->group(function () {
    Route::get('/', SuratMasukController::class, 'index');
});


// PUNYA APLIKASI SIREKA PNL
// // Data Chart Dashboard
// Route::post('/akumulasi', [DashboardController::class, 'get_akumulasi'])->middleware('auth');
// Route::post('/data-jurusan', [DashboardController::class, 'get_data_akses'])->middleware('auth');
// Route::post('/data-tenaga', [DashboardController::class, 'get_tenaga'])->middleware('auth');
// // Route::post('/data-pengembangan', [DashboardController::class, 'get_pengembangan'])->middleware('auth');
// Route::post('/anggaran-total', [DashboardController::class, 'anggaran_total'])->middleware('auth');
// Route::post('/anggaran-akses', [DashboardController::class, 'anggaran_akses'])->middleware('auth');
// Route::post('/anggaran-per-tahun', [DashboardController::class, 'anggaranPerTahun'])->middleware('auth');
// Route::get('/anggaran-per-tahun', [DashboardController::class, 'anggaranPerTahun'])->middleware('auth');

// // Fitur Newsletter
// Route::prefix('newsletter')->group(function () {
//     Route::post('/subscribe', [NewsletterController::class, 'subscribe']);
//     Route::post('/unsubscribe/{email}', [NewsletterController::class, 'unsubscribe']);
// });


// // Menu DASHBOARD
// Route::middleware('auth')->prefix('dashboard')->group(function () {
//     // Page Route
//     Route::get('/', [DashboardController::class, 'index']);
//     Route::resource('/profile', ProfileController::class);
//     Route::delete('/user-profile/delete', [ProfileController::class, 'deleteProfil']);
//     Route::put('/update-password', [ProfileController::class, 'updatePassword']);
//     Route::get('/faq', [DashboardController::class, 'faq']);

//     // Export Data
//     Route::get('/export', [DashboardController::class, 'view_export']);
//     Route::post('/export/generate', [DashboardController::class, 'export']);

//     // Utilities Function
//     Route::resource('/users', UserController::class)->middleware('admin');
//     Route::get('/get-users', [UserController::class, 'getUser'])->middleware('admin');
//     Route::get('/create-username', [UserController::class, 'checkUsername'])->middleware('admin');
//     Route::post('/status-users', [UserController::class, 'status'])->middleware('admin');
//     Route::post('/aktifasi/{id}', [UserController::class, 'aktivasi'])->middleware('admin');
//     Route::get('/check-username/{username}', [UserController::class, 'availableUsername']);
//     Route::get('/check-nip/{nip}', [UserController::class, 'availableNip']);
// });

// // MENU RENCANA STAFF PENGAJAR
// Route::middleware('auth')->prefix('tenaga')->group(function () {
//     Route::resource('/dosen', TenagaDosenController::class);
//     Route::get('/get-dosen', [TenagaDosenController::class, 'getData'])->name('get.dosens');
//     Route::post('/status-dosen', [TenagaDosenController::class, 'status'])->middleware('hakAkses:reviewer');
//     Route::post('/total-sum-dosen', [TenagaDosenController::class, 'getAllSum'])->name('get.total-sum-dosen');
//     Route::post('/print-dosen', [TenagaDosenController::class, 'print']);
//     Route::post('/anggarkan-dosen', [TenagaDosenController::class, 'anggarkan'])->middleware('hakAkses:satker');

//     Route::resource('/kontrak', TenagaKontrakController::class);
//     Route::get('/get-kontrak', [TenagaKontrakController::class, 'getData'])->name('get.kontraks');
//     Route::post('/status-kontrak', [TenagaKontrakController::class, 'status'])->middleware('hakAkses:reviewer');
//     Route::post('/total-sum-kontrak', [TenagaKontrakController::class, 'getAllSum'])->name('get.total-sum-kontrak');
//     Route::post('/print-kontrak', [TenagaKontrakController::class, 'print']);
//     Route::post('/anggarkan-kontrak', [TenagaKontrakController::class, 'anggarkan'])->middleware('hakAkses:satker');

//     Route::resource('/tendik', TenagaTendikController::class);
//     Route::get('/get-tendik', [TenagaTendikController::class, 'getData'])->name('get.tendiks');
//     Route::post('/status-tendik', [TenagaTendikController::class, 'status'])->middleware('hakAkses:reviewer');
//     Route::post('/total-sum-tendik', [TenagaTendikController::class, 'getAllSum'])->name('get.total-sum-tendik');
//     Route::post('/print-tendik', [TenagaTendikController::class, 'print']);
//     Route::post('/anggarkan-tendik', [TenagaTendikController::class, 'anggarkan'])->middleware('hakAkses:satker');
// });

// // RENCANA PENGEMBANGAN STAFF
// Route::middleware('auth')->prefix('pengembangan')->group(function () {
//     Route::resource('/dosen', PelatihanDosenController::class);
//     Route::get('/get-dosen', [PelatihanDosenController::class, 'getData'])->name('get.pengembangan-dosens');
//     Route::post('/status-dosen', [PelatihanDosenController::class, 'status'])->middleware('hakAkses:reviewer');
//     Route::post('/total-sum-dosen', [PelatihanDosenController::class, 'getAllSum'])->name('get.total-sum-dosen');
//     Route::post('/print-dosen', [PelatihanDosenController::class, 'print']);
//     Route::post('/anggarkan-dosen', [PelatihanDosenController::class, 'anggarkan'])->middleware('hakAkses:satker');

//     Route::resource('/tendik', PelatihanTendikController::class);
//     Route::get('/get-tendik', [PelatihanTendikController::class, 'getData'])->name('get.pengembangan-tendiks');
//     Route::post('/status-tendik', [PelatihanTendikController::class, 'status'])->middleware('hakAkses:reviewer');
//     Route::post('/total-sum-tendik', [PelatihanTendikController::class, 'getAllSum'])->name('get.total-sum-tendik');
//     Route::post('/print-tendik', [PelatihanTendikController::class, 'print']);
//     Route::post('/anggarkan-tendik', [PelatihanTendikController::class, 'anggarkan'])->middleware('hakAkses:satker');
// });

// // RESTORE DATA
// Route::middleware('admin')->prefix('restore')->group(function () {
//     $path = str_replace('restore/', '', Request::path());
//     Route::post($path, [MobilerController::class, 'restore']);
// });

// // JURUSAN
// Route::middleware('auth')->prefix('jurusan')->group(function () {
//     $path = str_replace('jurusan/', '', Request::path());
//     $path = substr($path, 0, strpos($path, "/"));

//     Route::middleware(['hakAkses:admin,reviewer,satker,' . $path])->prefix($path)->group(function () {
//         Route::resource('kegiatan', KegiatanController::class);
//         Route::get('/get-kegiatan', [KegiatanController::class, 'getData']);
//         Route::post('/status-kegiatan', [KegiatanController::class, 'status'])->middleware('hakAkses:reviewer');
//         Route::post('/total-sum-kegiatan', [KegiatanController::class, 'getAllSum'])->name('get.total-sum-kegiatan');
//         Route::post('/print-kegiatan', [KegiatanController::class, 'print']);
//         Route::post('/anggarkan-kegiatan', [KegiatanController::class, 'anggarkan'])->middleware('hakAkses:satker');

//         Route::resource('habis-pakai', HabisPakaiController::class);
//         Route::get('/get-habis-pakai', [HabisPakaiController::class, 'getData']);
//         Route::post('/status-habis-pakai', [HabisPakaiController::class, 'status'])->middleware('hakAkses:reviewer');
//         Route::post('/total-sum-habis-pakai', [HabisPakaiController::class, 'getAllSum'])->name('get.total-sum-habis-pakai');
//         Route::post('/print-habis-pakai', [HabisPakaiController::class, 'print']);
//         Route::post('/anggarkan-habis-pakai', [HabisPakaiController::class, 'anggarkan'])->middleware('hakAkses:satker');

//         Route::resource('pemeliharaan', PemeliharaanController::class);
//         Route::get('/get-pemeliharaan', [PemeliharaanController::class, 'getData']);
//         Route::post('/status-pemeliharaan', [PemeliharaanController::class, 'status'])->middleware('hakAkses:reviewer');
//         Route::post('/total-sum-pemeliharaan', [PemeliharaanController::class, 'getAllSum'])->name('get.total-sum-pemeliharaan');
//         Route::post('/print-pemeliharaan', [PemeliharaanController::class, 'print']);
//         Route::post('/anggarkan-pemeliharaan', [PemeliharaanController::class, 'anggarkan'])->middleware('hakAkses:satker');

//         Route::resource('lab', BarangLabController::class);
//         Route::get('/get-lab', [BarangLabController::class, 'getData']);
//         Route::post('/status-lab', [BarangLabController::class, 'status'])->middleware('hakAkses:reviewer');
//         Route::post('/total-sum-lab', [BarangLabController::class, 'getAllSum'])->name('get.total-sum-lab');
//         Route::post('/print-lab', [BarangLabController::class, 'print']);
//         Route::post('/anggarkan-lab', [BarangLabController::class, 'anggarkan'])->middleware('hakAkses:satker');

//         Route::resource('belanja-modal', BelanjaModalController::class);
//         Route::get('/get-belanja-modal', [BelanjaModalController::class, 'getData']);
//         Route::post('/status-belanja-modal', [BelanjaModalController::class, 'status'])->middleware('hakAkses:reviewer');
//         Route::post('/total-sum-belanja-modal', [BelanjaModalController::class, 'getAllSum'])->name('get.total-sum-belanja-modal');
//         Route::post('/print-belanja-modal', [BelanjaModalController::class, 'print']);
//         Route::post('/anggarkan-belanja-modal', [BelanjaModalController::class, 'anggarkan'])->middleware('hakAkses:satker');
//     });
// });

// Route::middleware('auth')->prefix('unit')->group(function () {
//     $path = str_replace('unit/', '', Request::path());
//     $path = substr($path, 0, strpos($path, "/"));

//     Route::middleware(['hakAkses:admin,reviewer,satker,' . $path])->prefix($path)->group(function () {
//         Route::resource('kegiatan', KegiatanController::class);
//         Route::get('/get-kegiatan', [KegiatanController::class, 'getData']);
//         Route::post('/status-kegiatan', [KegiatanController::class, 'status'])->middleware('hakAkses:reviewer');
//         Route::post('/total-sum-kegiatan', [KegiatanController::class, 'getAllSum'])->name('get.total-sum-kegiatan');
//         Route::post('/print-kegiatan', [KegiatanController::class, 'print']);
//         Route::post('/anggarkan-kegiatan', [KegiatanController::class, 'anggarkan'])->middleware('hakAkses:satker');

//         Route::resource('habis-pakai', HabisPakaiController::class);
//         Route::get('/get-habis-pakai', [HabisPakaiController::class, 'getData']);
//         Route::post('/status-habis-pakai', [HabisPakaiController::class, 'status'])->middleware('hakAkses:reviewer');
//         Route::post('/total-sum-habis-pakai', [HabisPakaiController::class, 'getAllSum'])->name('get.total-sum-habis-pakai');
//         Route::post('/print-habis-pakai', [HabisPakaiController::class, 'print']);
//         Route::post('/anggarkan-habis-pakai', [HabisPakaiController::class, 'anggarkan'])->middleware('hakAkses:satker');

//         Route::resource('pemeliharaan', PemeliharaanController::class);
//         Route::get('/get-pemeliharaan', [PemeliharaanController::class, 'getData']);
//         Route::post('/status-pemeliharaan', [PemeliharaanController::class, 'status'])->middleware('hakAkses:reviewer');
//         Route::post('/total-sum-pemeliharaan', [PemeliharaanController::class, 'getAllSum'])->name('get.total-sum-pemeliharaan');
//         Route::post('/print-pemeliharaan', [PemeliharaanController::class, 'print']);
//         Route::post('/anggarkan-pemeliharaan', [PemeliharaanController::class, 'anggarkan'])->middleware('hakAkses:satker');
//     });
// });

// Route::middleware('auth')->prefix('upt')->group(function () {
//     $path = str_replace('upt/', '', Request::path());
//     $path = substr($path, 0, strpos($path, "/"));

//     Route::middleware(['hakAkses:admin,reviewer,satker,' . $path])->prefix($path)->group(function () {
//         Route::resource('kegiatan', KegiatanController::class);
//         Route::get('/get-kegiatan', [KegiatanController::class, 'getData']);
//         Route::post('/status-kegiatan', [KegiatanController::class, 'status'])->middleware('hakAkses:reviewer');
//         Route::post('/total-sum-kegiatan', [KegiatanController::class, 'getAllSum'])->name('get.total-sum-kegiatan');
//         Route::post('/print-kegiatan', [KegiatanController::class, 'print']);
//         Route::post('/anggarkan-kegiatan', [KegiatanController::class, 'anggarkan'])->middleware('hakAkses:satker');

//         Route::resource('habis-pakai', HabisPakaiController::class);
//         Route::get('/get-habis-pakai', [HabisPakaiController::class, 'getData']);
//         Route::post('/status-habis-pakai', [HabisPakaiController::class, 'status'])->middleware('hakAkses:reviewer');
//         Route::post('/total-sum-habis-pakai', [HabisPakaiController::class, 'getAllSum'])->name('get.total-sum-habis-pakai');
//         Route::post('/print-habis-pakai', [HabisPakaiController::class, 'print']);
//         Route::post('/anggarkan-habis-pakai', [HabisPakaiController::class, 'anggarkan'])->middleware('hakAkses:satker');
//     });
// });

// // ADMIN
// // Route::middleware('admin')->prefix('admin')->group(function () {
// //     Route::resource('kegiatan', KegiatanAdminController::class);
// //     Route::get('/get-kegiatan', [KegiatanAdminController::class, 'getKegiatans']);
// //     Route::post('/status-kegiatan', [KegiatanAdminController::class, 'status']);
// //     Route::post('/total-sum-kegiatan', [KegiatanAdminController::class, 'getAllSum'])->name('get.total-sum-kegiatan');
// //     Route::post('/print-kegiatan', [KegiatanAdminController::class, 'print']);
// //     Route::post('/anggarkan-kegiatan', [KegiatanAdminController::class, 'anggarkan']);

// //     Route::resource('habis-pakai', HabisPakaiAdminController::class);
// //     Route::get('/get-habis-pakai', [HabisPakaiAdminController::class, 'getHabisPakais']);
// //     Route::post('/status-habis-pakai', [HabisPakaiAdminController::class, 'status']);
// //     Route::post('/total-sum-habis-pakai', [HabisPakaiAdminController::class, 'getAllSum'])->name('get.total-sum-habis-pakai');
// //     Route::post('/print-habis-pakai', [HabisPakaiAdminController::class, 'print']);
// //     Route::post('/anggarkan-habis-pakai', [HabisPakaiAdminController::class, 'anggarkan']);

// //     Route::resource('pemeliharaan', PemeliharaanAdminController::class);
// //     Route::get('/get-pemeliharaan', [PemeliharaanAdminController::class, 'getData']);
// //     Route::post('/status-pemeliharaan', [PemeliharaanAdminController::class, 'status']);
// //     Route::post('/total-sum-pemeliharaan', [PemeliharaanAdminController::class, 'getAllSum'])->name('get.total-sum-pemeliharaan');
// //     Route::post('/print-pemeliharaan', [PemeliharaanAdminController::class, 'print']);
// //     Route::post('/anggarkan-pemeliharaan', [PemeliharaanAdminController::class, 'anggarkan']);

// //     Route::resource('lab', BarangLabAdminController::class);
// //     Route::get('/get-lab', [BarangLabAdminController::class, 'getData']);
// //     Route::post('/status-lab', [BarangLabAdminController::class, 'status']);
// //     Route::post('/total-sum-lab', [BarangLabAdminController::class, 'getAllSum'])->name('get.total-sum-lab');
// //     Route::post('/print-lab', [BarangLabAdminController::class, 'print']);
// //     Route::post('/anggarkan-lab', [BarangLabAdminController::class, 'anggarkan']);

// //     Route::resource('belanja-modal', BelanjaModalAdminController::class);
// //     Route::get('/get-belanja-modal', [BelanjaModalAdminController::class, 'getData']);
// //     Route::post('/status-belanja-modal', [BelanjaModalAdminController::class, 'status']);
// //     Route::post('/total-sum-belanja-modal', [BelanjaModalAdminController::class, 'getAllSum'])->name('get.total-sum-belanja-modal');
// //     Route::post('/print-belanja-modal', [BelanjaModalAdminController::class, 'print']);
// //     Route::post('/anggarkan-belanja-modal', [BelanjaModalAdminController::class, 'anggarkan']);
// // });

// Route::middleware('auth')->prefix('monev')->group(function () {
//     $path = str_replace('monev/', '', Request::path());
//     $path = substr($path, 0, strpos($path, "/"));
//     Route::prefix($path)->group(function () {
//         $path = str_replace('monev/', '', Request::path());
//         $path = substr($path, 0, strpos($path, "/"));
//         $path = str_replace('monev/' . $path . '/', '', Request::path());
//         $path = substr($path, 0, strpos($path, "/"));

//         Route::prefix($path)->group(function () {
//             Route::resource('/view', MonevController::class);
//             Route::get('/get-monev', [MonevController::class, 'getData']);
//             Route::post('/total-sum-monev', [MonevController::class, 'getAllSum']);
//         });
//     });
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/proses_review/{id}', [MonevController::class, 'prosesReview'])->name('proses_review');
//     Route::post('/simpan_review/{id}', [MonevController::class, 'simpanProsesReview'])->middleware('hakAkses:spi');
//     Route::post('/tambah_review_monev', [MonevController::class, 'tambahProsesReview'])->middleware('admin');
//     Route::post('/hapus_review/{id}', [MonevController::class, 'hapusProsesReview'])->middleware('admin');

//     Route::get('/catatan_review/{id}', [MonevController::class, 'catatanReview'])->name('catatan_review');
//     Route::post('/simpan_catatan/{id}', [MonevController::class, 'simpanCatatanReview'])->middleware('hakAkses:spi');
//     Route::post('/change_pertanyaan/{id}', [MonevController::class, 'ubahPertanyaan'])->middleware('admin');
// });

// Route::middleware('auth')->prefix('read-xl')->group(function () {
//     Route::get('/office-excel/{any}', [ReadFile::class, 'excelWithExt']);
//     Route::get('/{any}', [ReadFile::class, 'excel']);
//     Route::post('/{any}', [ReadFile::class, 'excel']);
// });
// Route::middleware('auth')->prefix('read-doc')->group(function () {
//     Route::get('/{any}', [ReadFile::class, 'doc']);
// });
// Route::middleware('auth')->prefix('read-output')->group(function () {
//     Route::get('/{any}', [ReadFile::class, 'output']);
// });