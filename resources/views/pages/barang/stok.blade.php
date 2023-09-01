@extends('layouts.v_template')

@section('content')
    <section class="section">

        <div class="row">
            <div class="col-sm-12 d-flex justify-content-between">
                <h4>barang</h4>
                <div class="search-element">
                    <input class="form-control main-radius border-0" type="search" placeholder="Search" aria-label="Search"
                        data-width="250">
                    <i class="text-secondary fas fa-search"></i>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            @foreach ($barang as $row)
                <div class="col-sm-4">
                    <div class="card p-3">
                        <div class="barang-wrapper d-flex ">
                            <div class="img-wrapper main-radius">
                                <img src="{{ !$row->gambar ? asset('img/default-med.png') : asset('data/gambar_barang/' . $row->gambar) }} "
                                    alt="gambar barang" width="100">
                            </div>
                            <div class="detail-wrapper ml-4">
                                <h5>{{ $row->nama_barang }}</h5>
                                <small class="text-second">{{ $row->deskripsi }}</small>
                                <h6 class="mt-2">Rp. {{ number_format($row->harga) }}</h6>
                                <p>stok : {{ $row->stok }}</p>
                            </div>
                        </div>
                        <a href="{{ URL::to('admin/hapus_barang/' . $row->id_barang) }}"
                            onclick="return confirm('yakin ? ')"
                            class="mt-4 second-radius btn btn-danger text-white">Hapus</a>
                        <a href="{{ URL::to('admin/barang/' . $row->id_barang) }}"
                            class="mt-4 second-radius btn btn-info text-white">edit</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {



        });
        $('#libarang').addClass('active');
    </script>
@endsection
