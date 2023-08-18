<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // ROLE TYPE
        Gate::define('admin', function () {
            $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0];
            return $user->akses->tipe == 'admin';
        });

        Gate::define('not_admin', function () {
            $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0];
            return $user->akses->tipe !== 'admin';
        });

        Gate::define('jurusan', function () {
            $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
            return $user->tipe == 'jurusan';
        });

        Gate::define('unit', function () {
            $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
            return $user->tipe == 'unit';
        });


        // // UNIT
        // Gate::define('p3m', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'p3m';
        // });
        // Gate::define('p4m', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'p4m';
        // });
        // Gate::define('karir-mhs', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'karir-mhs';
        // });
        // Gate::define('ujikom', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'ujikom';
        // });
        // Gate::define('perpus', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'perpus';
        // });
        // Gate::define('teknologi-pemesinan', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'teknologi-pemesinan';
        // });
        // Gate::define('teknologi-informasi', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'teknologi-informasi';
        // });
        // Gate::define('bahasa', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'bahasa';
        // });
        // Gate::define('ulp', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'ulp';
        // });
        // Gate::define('p2t', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'p2t';
        // });
        // Gate::define('p2t', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'p2t';
        // });
        // Gate::define('akademik', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'akademik';
        // });
        // Gate::define('kemahasiswaan', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'kemahasiswaan';
        // });
        // Gate::define('asrama-mhs', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'asrama-mhs';
        // });
        // Gate::define('tata-usaha', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'tata-usaha';
        // });
        // Gate::define('keuangan', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'keuangan';
        // });
        // Gate::define('humas', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'humas';
        // });
        // Gate::define('htk', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'htk';
        // });
        // Gate::define('p2ak', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'p2ak';
        // });

        // // JURUSAN
        // Gate::define('sipil', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'sipil';
        // });
        // Gate::define('kimia', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'kimia';
        // });
        // Gate::define('mesin', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'mesin';
        // });
        // Gate::define('elektro', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'elektro';
        // });
        // Gate::define('tataniaga', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'tataniaga';
        // });
        // Gate::define('tik', function () {
        //     $user = User::with(['akses'])->where('id', auth()->user()->id)->get()[0]->akses;
        //     return $user->slug_akses == 'tik';
        // });
    }
}
