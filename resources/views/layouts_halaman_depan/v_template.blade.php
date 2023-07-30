@include('layouts_halaman_depan.header')
@include('layouts_halaman_depan.navbar')
@include('layouts_halaman_depan.sidebar')
@yield('content')
@include('layouts_halaman_depan.footer')
<script src="{{ asset('halaman_depan/script.js') }}"></script>
@yield('script')
