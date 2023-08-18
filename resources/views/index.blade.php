@extends('layouts.main')
@section('container')
    <x-hero-landingpage></x-hero-landingpage>
    <x-marquee>Badan Pusat Statistik Kota Lhokseumawe | SISURAT v1.0</x-marquee>

    <main id="main">
        <x-feature-landingpage></x-feature-landingpage>
        <x-about-landingpage></x-about-landingpage>
        <x-services-landingpage></x-services-landingpage>
        <x-testimonial-landingpage></x-testimonial-landingpage>
        <x-portfolio-landingpage></x-portfolio-landingpage>
        <x-team-landingpage></x-team-landingpage>
        <x-contact-landingpage></x-contact-landingpage>
        @auth
            @if (in_array(auth()->user()->akses->slug_akses, ['admin']))
                <iframe
                    src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTQ8Hmx0JChuPiCED_wH-nhZhYi1QFGKolmbbpe9Xv3HuDMw70LgPTw7clVmbZ-3ooXGm0TUt8C94up/pubhtml?gid=0&amp;single=false&amp;widget=true&amp;headers=true"
                    style="width: 100%; height: 300px;"></iframe>
            @endif
        @endauth
    </main>
@endsection
