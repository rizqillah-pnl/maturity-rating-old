<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Akses;
use App\Models\SuratMasuk;
use App\Models\SuratTugas;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DashboardController extends Controller
{
    public function index()
    {
        $s_masuk = SuratMasuk::get()->count();
        $s_keluar = SuratKeluar::get()->count();
        $s_tugas = SuratTugas::get()->count();
        $user = User::get()->count();

        return view('dashboard.pages.dashboard', ['title' => 'Dashboard', 's_keluar' => $s_keluar, 's_masuk' => $s_masuk, 's_tugas' => $s_tugas, 'count_user' => $user]);
    }



    // public function faq(Request $request)
    // {
    //     if ($request->tahun == 'all') {
    //         $request->session()->put('tahun', '');
    //     } else if (isset($request->tahun)) {
    //         $request->session()->put('tahun', $request->tahun);
    //     } else if (!$request->session()->has('tahun')) {
    //         $request->session()->put('tahun', date('Y'));
    //     }
    //     return view('dashboard.faq', ['title' => 'FAQ']);
    // }

    // public function anggaranPerTahun(Request $request)
    // {
    //     $data = Mobiler::select('tahun', DB::raw('SUM(jumlah_pembiayaan) as total'))
    //         ->where('status', 'dianggarkan')
    //         ->groupBy('tahun');

    //     $user = User::with('akses')->find(auth()->user()->id);
    //     if (!in_array($user->akses->slug_akses, ['admin', 'reviewer', 'satker'])) {
    //         $data = $data->where('akses_id', $user->akses->id);
    //     }
    //     $data = $data->get();
    //     if ($data->isEmpty() || count($data) == 1) {
    //         return response()->json(['error' => 404]);
    //     }

    //     $Y = array();
    //     $years = array();
    //     foreach ($data as $item) {
    //         array_push($Y, $item->total);
    //         array_push($years, $item->tahun);
    //     }

    //     [$predict_result, $a, $b, $X] = $this->start_method($Y, $years);
    //     [$mape, $akurasi, $errors] = $this->MAPE($Y, $predict_result);

    //     $years[count($years)] = $years[count($years) - 1] + 1;
    //     $bgcolor = [
    //         'rgb(255, 99, 132)',
    //         'rgb(54, 162, 235)',
    //         'rgb(255, 205, 86)',
    //         'rgb(86, 255, 232)',
    //     ];

    //     return response()->json(['labels' => $years, 'label' => 'Data Aktual', 'label2' => 'Data Prediksi', 'data_aktual' => $Y, 'data_prediksi' => $predict_result, 'bgColor' => $bgcolor, 'hoverColor' => $bgcolor, 'title' => 'Total Anggaran Mobiler Tahunan', 'X' => $X, 'a' => $a, 'b' => $b, 'akurasi' => $akurasi, 'mape' => $mape, 'errors' => $errors]);
    // }

    // public function start_method($Y, $years)
    // {
    //     $X = $this->get_nilai_X($years);
    //     $predictX = $X[count($X) - 1];
    //     unset($X[count($X) - 1]);

    //     [$a, $b] = $this->model_least_square($Y, $X, $years);
    //     $years[count($years)] = $years[count($years) - 1] + 1;

    //     $X[count($X)] = $predictX;
    //     $predict_result = array();
    //     $predict_result[0] = null;
    //     for ($i = 0; $i < count($X); $i++) {
    //         $predict_result[$i] = round($this->predict_method($a, $b, $X[$i]));

    //         if ($predict_result[$i] < 0) {
    //             $predict_result[$i] = 0;
    //         }
    //     }
    //     return [$predict_result, $a, $b, $X];
    // }

    // public function get_nilai_X($years)
    // {
    //     // Cek Apakah Data ganjil atau genap
    //     if (count($years) % 2 != 0) {
    //         $middleIndex = (int)(count($years) / 2);

    //         // Sisipkan nilai tengah dengan 0
    //         $newYears[$middleIndex] = 0;

    //         // Memberikan nilai untuk deretan positif
    //         $positif = 1;
    //         for ($i = $middleIndex - 1; $i >= -1; $i--) {
    //             $newYears[] = $positif++;
    //         }

    //         // Memberikan nilai untuk deretan negatif
    //         $minus = -1;
    //         for ($i = $middleIndex - 1; $i >= 0; $i--) {
    //             $newYears[$i] = $minus--;
    //         }
    //         sort($newYears);
    //     } else {
    //         $middleIndex = (int)(count($years) / 2);

    //         // Sisipkan 2 nilai tengah dengan 1 dan -1
    //         $newYears[$middleIndex - 1] = -1;
    //         $newYears[$middleIndex] = 1;

    //         // Kenaikan untuk nilai positif 2 dan negatif -2
    //         $positiveFactor = 2;
    //         $negativeFactor = -2;

    //         // Perulangan untuk memberikan nilai positif
    //         for ($i = $middleIndex + 1; $i < count($years) + 1; $i++) {
    //             $newYears[$i] = $newYears[$i - 1] + $positiveFactor;
    //         }

    //         // Perulangan untuk memberikan nilai negatif
    //         for ($i = $middleIndex - 2; $i >= 0; $i--) {
    //             $newYears[$i] = $newYears[$i + 1] + $negativeFactor;
    //         }
    //         sort($newYears);
    //     }

    //     return $newYears;
    // }

    // public function model_least_square($Y, $X, $years)
    // {
    //     // Menghitung jumlah atau SUM
    //     $n = count($years);
    //     $sumX = array_sum($X);
    //     $sumY = array_sum($Y);
    //     $sumXSquare = 0;
    //     $sumXY = 0;

    //     // Mendapatkan Nilai XY dan X^2
    //     $arrSumXY = array();
    //     $arrSumXSquare = array();
    //     for ($i = 0; $i < $n; $i++) {
    //         $sumXSquare += pow($X[$i], 2);
    //         $sumXY += ($X[$i] * $Y[$i]);
    //         array_push($arrSumXSquare, pow($X[$i], 2));
    //         array_push($arrSumXY, $X[$i] * $Y[$i]);
    //     }

    //     // Menghitung koefisien (slope dan intercept)
    //     $a = $sumY / $n;
    //     $b = $sumXY / $sumXSquare;
    //     return [$a, $b];
    // }

    // public function predict_method($a, $b, $X)
    // {
    //     // Eksekusi Persamaan Regresi Linear
    //     // Y = a + bX
    //     $Y = $a + $b * $X;
    //     return $Y;
    // }


    // public function MAPE($aktual, $prediksi)
    // {
    //     // Menghitung jumlah data
    //     $n = count($aktual);

    //     // Variabel Total Error
    //     $totalPercentageError = 0;

    //     // Menghitung total error
    //     $errors = array();
    //     for ($i = 0; $i < $n; $i++) {
    //         $percentageError = abs(($aktual[$i] - $prediksi[$i]) / $aktual[$i]) * 100;
    //         array_push($errors, $percentageError);
    //         $totalPercentageError += $percentageError;
    //     }

    //     // Menghitung rata-rata error persentase
    //     $mape = number_format((float)$totalPercentageError / $n, 2, '.', '');

    //     // Menghitung Akurasi
    //     $akurasi = number_format((float)100 - $mape, 2, '.', '');
    //     if ($akurasi < 0) {
    //         $akurasi = 0;
    //     }
    //     return [$mape, $akurasi, $errors];
    // }
}
