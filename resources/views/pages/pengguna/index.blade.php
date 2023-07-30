@extends('layouts.v_template')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex  justify-content-between">
                        <h4>Data Pengguna</h4>
                        <div class="table-tools d-flex justify-content-around ">
                            <input type="text" class="form-control card-form-header mr-3"
                                placeholder="Cari Data Pengguna ..." id="cari-data-pengguna">
                            <select class="custom-select form-control mr-3" id="filter-data-pengguna">
                                <option value="" selected>Filter</option>
                                <option value=""></option>
                            </select>
                            <button type="button" class="btn bg-main text-white float-right" data-toggle="modal"
                                id="addUserBtn" data-target="#modalPengguna"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-hover table-user table-action-hover">
                            <thead>
                                <tr>
                                    <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id"
                                        style="cursor: pointer">ID <span id="id_icon"></span></th>
                                    <td>Nama</td>
                                    <td>Email</td>
                                    <td>Nomor wa</td>
                                    <td>Tipe Pengguna</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @include('pages.pengguna.users_data')
                            </tbody>
                        </table>
                        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                        <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                        <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    {{-- MODAL TAMBAH PENGGUNA --}}
    <div class="modal fade" id="modalPengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Tambah Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- MODAL BODY UNTUK MEMBATALKAN PENGAITAN DATA --}}
                <div class="modal-body" id="batal-kaitkan-body">
                    <div id="response-linked-data" data-asset_url="{{ asset('img/svg_animated/loading.svg') }}">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <img src="{{ asset('img/svg_animated/loading.svg') }}" alt="" width="100"
                                    class="loading">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- MODAL BODY UNTUK MENCARI DATA YANG INGIN DI KAITKAN DENGAN USER --}}
                <div class="modal-body" id="kaitkan-body">
                    <input type="hidden" id="id_user">
                    <input type="text" autocomplete="off" class="form-control" placeholder="Cari Data ..."
                        id="cari-data">
                    <div id="response-data" data-asset_url="{{ asset('img/svg_animated/loading.svg') }}">
                    </div>
                </div>
                {{-- MODAL BODY UNTUK TAMBAH USER DAN EDIT USER --}}
                <div class="modal-body" id="main-body">
                    {{-- @if (session('message'))
                {{ sweetAlert(session('message'), 'success') }}
                @endif --}}
                    <form id="formPengguna" action="{{ URL::to('/admin/create_pengguna') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="hidden" class="form-control" name="id" id="id">
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="tipe_pengguna" id="tipe-pengguna">
                                <option>kasir</option>
                                <option>owner</option>
                                <option>Administrator</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="wa">Nomor whatsapp</label>
                            <input type="text" class="form-control" name="wa" id="wa">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn bg-main text-white" id="modalBtn">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {


            function clear_icon() {
                $('#id_icon').html('');
                $('#post_title_icon').html('');
            }

            function fetch_data(page, sort_type, sort_by, query, filter) {
                $.ajax({
                    url: "/admin/fetch_data?page=" + page + "&sortby=" + sort_by + "&sorttype=" +
                        sort_type + "&query=" + query + "&filter=" + filter,
                    success: function(data) {
                        console.log(data)
                        // $('tbody').html('');
                        $('tbody').html(data);
                    },
                    beforeSend: function() {
                        showLoading('tbody', 150, true);
                    },
                    complete: function() {
                        $('.loading').remove();
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })
            }

            $(document).on('keyup', '#cari-data-pengguna', function() {
                var query = $('#cari-data-pengguna').val();
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();
                var filter = $('#filter-data-pengguna').val();
                fetch_data(page, sort_type, column_name, query, filter);
            });

            $(document).on('click', '.sorting', function() {
                var column_name = $(this).data('column_name');
                var order_type = $(this).data('sorting_type');
                var reverse_order = '';
                if (order_type == 'asc') {
                    $(this).data('sorting_type', 'desc');
                    reverse_order = 'desc';
                    clear_icon();
                    $('#' + column_name + '_icon').html(
                        '<span class="glyphicon glyphicon-triangle-bottom"></span>');
                }
                if (order_type == 'desc') {
                    $(this).data('sorting_type', 'asc');
                    reverse_order = 'asc';
                    clear_icon
                    $('#' + column_name + '_icon').html(
                        '<span class="glyphicon glyphicon-triangle-top"></span>');
                }
                $('#hidden_column_name').val(column_name);
                $('#hidden_sort_type').val(reverse_order);
                var page = $('#hidden_page').val();
                var query = $('#cari-data-pengguna').val();
                var filter = $('#filter-data-pengguna').val();
                fetch_data(page, reverse_order, column_name, query, filter);
            });

            $(document).on('change', '#filter-data-pengguna', function() {
                var query = $('#cari-data-pengguna').val();
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();
                var filter = $(this).val();
                fetch_data(page, sort_type, column_name, query, filter);
            })

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                var query = $('#cari-data-pengguna').val();

                $('li').removeClass('active');
                $(this).parent().addClass('active');
                var filter = $('#filter-data-pengguna').val();
                fetch_data(page, sort_type, column_name, query, filter);
            });


            // TOMBOL EDIT USER
            $('.table-user tbody').on('click', 'tr td a.edit', function() {
                let dataPengguna = $(this).data('pengguna');
                $('#nama').val(dataPengguna.name);
                $('#email').val(dataPengguna.email);
                $('#wa').val(dataPengguna.wa);
                $('#tipe-pengguna').val(dataPengguna.role);
                $('#id').val(dataPengguna.id);
                $('#ModalLabel').html('Ubah Pengguna');
                $('#modalBtn').html('Ubah');
                $('.modal-footer').show();
                $('#main-body').show();
                $('#kaitkan-body').hide();
                $('#batal-kaitkan-body').hide();
                $('#formPengguna').attr('action', '/admin/update_pengguna');
            })

            // TOMBOL TAMBAH USER
            $('#addUserBtn').on('click', function() {
                $('#ModalLabel').html('Tambah Pengguna');
                $('#modalBtn').html('Tambah');
                $('.modal-footer').show();
                $('#main-body').show();
                $('#kaitkan-body').hide();
                $('#batal-kaitkan-body').hide();
                $('#formPengguna').attr('action', '/admin/create_pengguna');
            });

            // TOMBOL HAPUS USER
            $('.table-user tbody').on('click', 'tr td a.hapus', function() {
                let idPengguna = $(this).data('id_pengguna');
                Swal.fire({
                    title: 'Apakah yakin?',
                    text: "Data tidak bisa kembali lagi!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Konfirmasi'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '/admin/delete_pengguna',
                            method: 'post',
                            dataType: 'json',
                            data: {
                                user_id: idPengguna
                            },
                            success: function(data) {
                                if (data == 1) {
                                    Swal.fire('Berhasil', 'Data telah terhapus',
                                        'success').then((result) => {
                                        location.reload();
                                    });
                                }
                            }
                        })
                    }
                })
            });





        });

        $('#liPengguna').addClass('active');
        // $('#liManajemenPengguna').addClass('active');
    </script>
@endsection
