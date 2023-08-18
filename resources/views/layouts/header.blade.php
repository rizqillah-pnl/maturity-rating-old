 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top" data-scrollto-offset="0">
     <div class="container-fluid d-flex align-items-center justify-content-between">

         <a href="{{ url('/') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
             <!-- Uncomment the line below if you also wish to use an image logo -->
             <img src="{{ asset('logo.ico') }}" alt="">
             <h1 class="mb-0">SISURAT | BPS</h1>
         </a>

         <nav id="navbar" class="navbar">
             <ul>
                 <li><a class="nav-link scrollto" href="#hero-animated">Home</a></li>
                 <li><a class="nav-link scrollto" href="#featured-services">Features</a></li>
                 <li><a class="nav-link scrollto" href="#about">About</a></li>
                 <li><a class="nav-link scrollto" href="#services">Services</a></li>
                 <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
                 <li><a class="nav-link scrollto" href="#team">Team</a></li>
                 <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
             </ul>
             <i class="bi bi-list mobile-nav-toggle d-none"></i>
         </nav><!-- .navbar -->

         @auth
             <a class="btn-getstarted scrollto" href="{{ url('/dashboard') }}">Dashboard</a>
         @else
             <a class="btn-getstarted scrollto" href="{{ url('/login') }}">Sign In</a>
         @endauth

     </div>
 </header><!-- End Header -->
