@include('layouts.v_header')
@include('layouts.v_nav')
@include('layouts.v_sidebar')
<!-- Main Content -->
<div class="main-content">
    @yield('content')
</div>
@include('layouts.v_footer')
