@extends('layouts.v_template')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex  justify-content-between">
                        <h4>Data barang</h4>
                        @if ($edit)
                            <a class="btn bg-main text-white" href="{{ URL::to('admin/barang') }}">
                                <i class="fas fa-plus"></i>
                            </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ $edit ? URL::to('/admin/ubah_barang') : URL::to('/admin/tambah_barang') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="id_kategori" id="kategori" class="form-control">
                                    @foreach ($kategori as $row)
                                        <option value="{{ $row->id_kategori }}">{{ $row->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">Nama barang</label>
                                <input type="hidden" value="{{ $edit ? $edit->id_barang : '' }}" name="id_barang">
                                <input value="{{ $edit ? $edit->nama_barang : '' }}" required type="text"
                                    class="form-control" name="nama_barang" id="nama_barang">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input {{ $edit ? '' : '' }} type="file" class="form-control" name="gambar"
                                    id="gambar">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input value="{{ $edit ? $edit->deskripsi : '' }}" required type="text"
                                    class="form-control" name="deskripsi" id="deskripsi">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input value="{{ $edit ? $edit->harga : '' }}" required type="text" class="form-control"
                                    name="harga" id="harga">
                            </div>
                            <div class="form-group">
                                <label for="stok">stok</label>
                                <input value="{{ $edit ? $edit->stok : '' }}" required type="text" class="form-control"
                                    name="stok" id="stok">
                            </div>
                            <div class="form-group">
                                <button class="btn bg-main text-white">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
