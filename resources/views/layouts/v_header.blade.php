<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Pos-APT. Wahid farma</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}


    {{-- sweetalert --}}
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('stisla') }}/assets/css/components.css">

    {{-- dropzone cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Datatable css --}}
    <link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-select/css/select.bootstrap4.min.css') }}">


</head>

@if (session('message'))
    {{ sweetAlert(session('message'), 'success') }}
@endif
@if (session('error'))
    {{ sweetAlert(session('error'), 'warning') }}
@endif
<div class="loader">
    <i style="font-size: 50px" class="fas fa-spinner fa-spin"></i>
    {{-- <img src="{{ asset('img/svg_animated/loading.gif') }}" alt="loading"> --}}
</div>
