<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | Maturity Rating SPI</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('template/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('template/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('template/plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- SIREKA HEAD -->
    {{-- <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script> --}}

    {{-- Datatable --}}
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- jQuery -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    {{-- Number Phone Format --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.21/js/intlTelInput.min.js"></script>

    {{-- HIGHLIGHTING Datatable --}}
    <script src="https://cdn.datatables.net/plug-ins/1.10.25/features/searchHighlight/dataTables.searchHighlight.min.js">
    </script>
    <link rel="stylesheet"
        href="https://cdn.datatables.net/plug-ins/1.10.25/features/searchHighlight/dataTables.searchHighlight.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery-highlight@3.5.0/jquery.highlight.min.js"></script>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables -->
    {{-- <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}"> --}}
    {{-- <link rel="stylesheet"
        href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}"> --}}


    @stack('css-script')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @if (session()->has('success'))
        <script>
            let text = "{{ session()->get('success') }}";
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: text,
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @elseif (session()->has('error'))
        <script>
            let text = "{{ session()->get('error') }}";
            Swal.fire({
                icon: 'error',
                title: text,
                text: text,
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @elseif (session()->has('warning'))
        <script>
            let text = "{{ session()->get('warning') }}";
            Swal.fire({
                icon: 'warning',
                title: text,
                text: text,
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif

    <div class="wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')
        <main>
            @yield('container')
        </main>
        @include('layouts.foot')

    </div>
    <!-- ./wrapper -->



    <script>
        function checkfile(sender, arr, id) {
            var fileExt = sender.value;
            fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
            if (arr.indexOf(fileExt) < 0) {
                document.querySelector(`#${id}`).classList.add('is-invalid');
                return false;
            } else {
                document.querySelector(`#${id}`).classList.remove('is-invalid');
                return true;
            }
        }
        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
            //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
        });

        function currencyFormat(data, id = 'currency') {
            document.getElementById(id).innerText = formatter.format(data.value);
        }

        $(document).ready(function() {
            $('#showPassword').click(function() {
                $(this).is(':checked') ? $('#password').attr('type', 'text') : $('#password').attr('type',
                    'password');
            });
        });

        function toLowerAndTrim(data) {
            data.value = data.value.toLowerCase().trim();
        }
    </script>


    <!-- jQuery UI 1.11.4 -->
    {{-- <script src="{{ asset('template/plugins/jquery-ui/jquery-ui.min.js') }}"></script> --}}
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    {{-- <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script> --}}
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    {{-- <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <!-- ChartJS -->
    <script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('template/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    {{-- <script src="{{ asset('template/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('template/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('template/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('template/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('template/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('template/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('template/dist/js/pages/dashboard.js') }}"></script> --}}


    <!-- DataTables  & Plugins -->
    {{-- <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script> --}}


    @stack('js-script')
</body>

</html>
