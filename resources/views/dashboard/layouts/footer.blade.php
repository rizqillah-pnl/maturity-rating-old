<footer class="main-footer">
    <strong>Copyright &copy; 2023-{{ date('Y') }} <a href="{{ url('/') }}">SISURAT</a> & <a
            href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version 1.0</b>
        Page Rendered in {{ round(microtime(true) - LARAVEL_START, 5) }} Seconds.
    </div>
</footer>
