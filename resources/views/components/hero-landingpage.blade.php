<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
        data-aos="zoom-out">
        <img src="{{ asset('herobiz/img/hero-carousel/hero-carousel-3.svg') }}" class="img-fluid animated"
            style="max-height: 220px">
        <h2>Welcome <span>SISURAT BPS</span></h2>
        <p>Sistem Informasi Surat untuk Mempermudah dalam Membuat Surat di Badan Pusat Statistik Lhokseumawe!</p>
        <div class="d-flex">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-get-started scrollto">Dashboard</a>
            @else
                <a href="{{ url('/login') }}" class="btn-get-started scrollto">Sign In</a>
            @endauth
            <a href="https://youtu.be/bJlezR-ScF0" class="glightbox btn-watch-video d-flex align-items-center"><i
                    class="bi bi-play-circle"></i><span>Watch
                    Video</span></a>
        </div>
    </div>
</section>
