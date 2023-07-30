<div class="row mt-4">
    <div class="col-sm-12 d-flex justify-content-between align-items-end">
        <h4>Semua data {!! $nama_kategori
            ? $nama_kategori . '<a data-nama_kategori="all" href="../" class="ml-4 btn-kategori badge badge-secondary">all</a>'
            : '' !!}</h4>
        <p class="text-second">{{ count($barang) }} barang tersedia</p>
    </div>
</div>
@if (count($barang) < 1)
    <div class="row mt-5">
        <div class="col-sm-12 flex-column d-flex justiy-content-center align-items-center">
            <img src="{{ asset('img/svg/ilustration/med.svg') }}" alt="empty ilustration" width="300">
            <p>barang kosong</p>
        </div>
    </div>
@endif
<div class="row mt-4" id="barang-wrapper">
    @foreach ($barang as $row)
        <div class="col-sm-6">
            <div class="card p-3">
                <div class="barang-wrapper d-flex ">
                    <div class="img-wrapper main-radius">
                        <img src="{{ !$row->gambar ? asset('img/default-med.png') : asset('data/gambar_barang/' . $row->gambar) }} "
                            alt="gambar barang">
                    </div>
                    <div class="detail-wrapper ml-4">
                        <h5>{{ $row->nama_barang }}</h5>
                        <small class="text-second">{{ $row->deskripsi }}</small>
                        <h6 class="mt-2">Rp. {{ number_format($row->harga) }}</h6>
                    </div>
                </div>
                <button data-path="{{ asset('data/gambar_barang/') }}" data-pesanan='@json($row)'
                    class="mt-4 second-radius btn bg-main text-white btn-pesan">Tambah</button>
            </div>
        </div>
    @endforeach
</div>
