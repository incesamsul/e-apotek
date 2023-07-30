@extends('layouts.v_template')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex  justify-content-between">
                        <h4>Data Kategori</h4>
                        @if ($edit)
                            <a class="btn bg-main text-white" href="{{ URL::to('admin/kategori') }}">
                                <i class="fas fa-plus"></i>
                            </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ $edit ? URL::to('/admin/ubah_kategori') : URL::to('/admin/tambah_kategori') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama_kategori">Nama kategori</label>
                                <input type="hidden" value="{{ $edit ? $edit->id_kategori : '' }}" name="id_kategori">
                                <input value="{{ $edit ? $edit->nama_kategori : '' }}" required type="text"
                                    class="form-control" name="nama_kategori" id="nama_kategori">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input {{ $edit ? '' : '' }} type="file" class="form-control" name="gambar"
                                    id="gambar">
                            </div>
                            <div class="form-group">
                                <button class="btn bg-main text-white">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 d-flex justify-content-between">
                <h4>Kategori</h4>
                <div class="search-element">
                    <input class="form-control main-radius border-0" type="search" placeholder="Search" aria-label="Search"
                        data-width="250">
                    <i class="text-secondary fas fa-search"></i>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            @foreach ($kategori as $row)
                <div class="col-sm-3">
                    <a class="text-dark" href="">
                        <div class="card kategori p-3 d-flex align-items-center justify-content-around text-center">

                            <img src="{{ $row->gambar == null ? asset('img/default-med.png') : asset('data/gambar_kategori/' . $row->gambar) }}"
                                alt="" width="90">
                            <p><small>{{ $row->nama_kategori }}</small></p>
                            <a href="{{ URL::to('admin/hapus_kategori/' . $row->id_kategori) }}"
                                onclick="return confirm('yakin ? ')"
                                class="badge badge-danger mb-3"><small>delete</small></a>
                            <a href="{{ URL::to('admin/kategori/' . $row->id_kategori) }}"
                                class="badge badge-info"><small>edit</small></a>
                        </div>

                    </a>
                </div>
            @endforeach
        </div>

    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {



        });
        $('#liKategori').addClass('active');
    </script>
@endsection
