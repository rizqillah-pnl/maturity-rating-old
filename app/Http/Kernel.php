<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\LogUserActivity::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // ADMINISTRATOR
        'admin' => \App\Http\Middleware\Admin::class,
        'hakAkses' => \App\Http\Middleware\HakAkses::class,

        // Compress Image
        // 'optimizeImages' => \Spatie\LaravelImageOptimizer\Middlewares\OptimizeImages::class,
        // // JURUSAN
        // 'jurusan' => \App\Http\Middleware\Jurusan::class,
        // 'unit' => \App\Http\Middleware\Unit::class,
        // 'sipil' => \App\Http\Middleware\Sipil::class,
        // 'kimia' => \App\Http\Middleware\Kimia::class,
        // 'mesin' => \App\Http\Middleware\Mesin::class,
        // 'elektro' => \App\Http\Middleware\Elektro::class,
        // 'tataniaga' => \App\Http\Middleware\Tataniaga::class,
        // 'tik' => \App\Http\Middleware\TIK::class,

        // // UNIT
        // 'P3M' => \App\Http\Middleware\P3M::class,
        // 'P4M' => \App\Http\Middleware\P4M::class,
        // 'UPTBahasa' => \App\Http\Middleware\UPTBahasa::class,
        // 'UPTKarirMHS' => \App\Http\Middleware\UPTKarirMHS::class,
        // 'UPTPerpus' => \App\Http\Middleware\UPTPerpus::class,
        // 'UPTTeknologiMesin' => \App\Http\Middleware\UPTTeknologiMesin::class,
        // 'UPTTeknologiInformasi' => \App\Http\Middleware\UPTTeknologiInformasi::class,
        // 'UPTTUjikom' => \App\Http\Middleware\UPTTUjikom::class,
    ];
}
