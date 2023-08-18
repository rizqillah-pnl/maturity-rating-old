<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SISURAT BPS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicons -->
    <link href="{{ asset('favicon.ico') }}" rel="icon">
    <link href="{{ asset('favicon.ico') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('herobiz/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('herobiz/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('herobiz/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('herobiz/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('herobiz/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="{{ asset('herobiz/css/variables.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('herobiz/css/variables-blue.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('herobiz/css/variables-green.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('herobiz/css/variables-orange.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('herobiz/css/variables-purple.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('herobiz/css/variables-red.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('herobiz/css/variables-pink.css') }}" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="{{ asset('herobiz/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: HeroBiz
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    {{-- TOASTR --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body>
    <div id="preloader"></div>
    @include('layouts.header')
    @yield('container')
    @include('layouts.footer')


    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <!-- Vendor JS Files -->
    <script src="{{ asset('herobiz/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('herobiz/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('herobiz/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('herobiz/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('herobiz/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('herobiz/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('herobiz/js/main.js') }}"></script>

</body>

</html>
