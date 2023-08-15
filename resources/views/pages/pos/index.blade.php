@extends('layouts.v_template')

@section('content')
    <section class="section">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-12 d-flex justify-content-between">
                            <h4>Kategori</h4>
                            <div class="search-element">
                                <input id="search-input" class="form-control main-radius border-0" type="search"
                                    placeholder="Search" aria-label="Search" data-width="250">
                                <i class="text-secondary fas fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 d-flex flex-row flex-nowrap overflow-auto list-kategori">
                        @foreach ($kategori as $row)
                            <div class="col-sm-2">
                                <a data-nama_kategori="{{ spaceToLine($row->nama_kategori) }}"
                                    class="text-dark btn-kategori"
                                    href="{{ URL::to('/kasir/pos/kategori/' . spaceToLine($row->nama_kategori)) }}">
                                    <div
                                        class="card {{ $nama_kategori == $row->nama_kategori ? 'active' : '' }} kategori p-3 d-flex align-items-center">

                                        <img src="{{ $row->gambar == null ? asset('img/default-med.png') : asset('data/gambar_kategori/' . $row->gambar) }}"
                                            alt="gambar kategori" width="40">
                                        <small>{{ $row->nama_kategori }} </small>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div id="barang-wrapper">
                        <div class="row mt-4">
                            <div class="col-sm-12 d-flex justify-content-between align-items-end">
                                <h4>Semua barang {!! $nama_kategori ? $nama_kategori . '<a href="../" class="ml-4 badge badge-secondary">all</a>' : '' !!}</h4>
                                <p class="text-second">{{ count($barang) }} barang tersedia</p>
                            </div>
                        </div>
                        @if (count($barang) < 1)
                            <div class="row mt-5">
                                <div class="col-sm-12 flex-column d-flex justiy-content-center align-items-center">
                                    <img src="{{ asset('img/svg/ilustration/med.svg') }}" alt="empty ilustration"
                                        width="300">
                                    <p>barang kosong</p>
                                </div>
                            </div>
                        @endif
                        <div class="row mt-4">
                            @foreach ($barang as $row)
                                <div class="col-sm-6">
                                    <div class="card p-3">
                                        <div class="barang-wrapper d-flex ">
                                            <div class="img-wrapper main-radius">
                                                <img src="{{ !$row->gambar ? asset('img/default-med.png') : asset('data/gambar_barang/' . $row->gambar) }} "alt="gambar barang"
                                                    width="100">
                                            </div>
                                            <div class="detail-wrapper ml-4">
                                                <h5>{{ $row->nama_barang }}</h5>
                                                <small class="text-second">{{ $row->deskripsi }}</small>
                                                <br><small class="text-second">Stok : {{ $row->stok }}</small>
                                                <h6 class="mt-2">Rp. {{ number_format($row->harga) }}</h6>
                                            </div>
                                        </div>
                                        @if ($row->stok < 1)
                                            <button class="mt-4 second-radius btn btn-secondary text-white btn-pesan">Stok
                                                habis</button>
                                        @else
                                            <button data-path="{{ asset('data/gambar_barang/') }}"
                                                data-pesanan='@json($row)'
                                                class="mt-4 second-radius btn bg-main text-white btn-pesan">Tambah</button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card" id="tagihan">
                        <div class="card-body">
                            <h5 class="my-4">Tagihan</h5>
                            <div id="tagihan-wrapper">
                                <div id="tagihan-ilustration">
                                    <img src="{{ asset('img/svg/ilustration/med.svg') }}" alt="empty food list in bills"
                                        width="230">
                                    <p>belum ada tagihan</p>
                                </div>
                                {{-- tagihan will generated using js --}}
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <strong>Subtotal</strong>
                                <strong id="subtotal">Rp. -</strong>
                            </div>

                            <div class="d-flex justify-content-between mt-2 text-second">
                                <strong>Tax (10%)</strong>
                                <strong id="tax">Rp. -</strong>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mt-2">
                                <strong>Total</strong>
                                <strong id="total">Rp. -</strong>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <strong>Kembalian</strong>
                                <strong id="kembalian">Rp. -</strong>
                            </div>
                            <div class="pembayaran-wrapper">
                                <input placeholder="masukkan pembayaran" type="text"
                                    class="number_format main-radius mt-3 form-control" name="pembayaran" id="pembayaran">
                                <small class="required text-danger"></small>
                            </div>
                            <button id="btn-print-tagihan"
                                class=" full-width mt-4 second-radius btn bg-main text-white">Print Tagihan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $('#liPos').addClass('active');
        $(document).ready(function() {

            $('.pembayaran-wrapper').hide();
            $('#btn-print-tagihan').prop('disabled', true);
            $('#btn-print-tagihan').addClass('disabled');


            $('#search-input').on('keyup', function() {
                let query = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/kasir/pos/cari',
                    method: 'post',
                    data: {
                        query: query,
                    },
                    // dataType: 'json',
                    success: function(data) {
                        $('#barang-wrapper').html(data.html);
                    },
                    error: function(err) {
                        console.log(err)
                    },
                    beforeSend: function() {
                        let loadingAsset = $('#loading-asset').data('asset_url');
                        $('#barang-wrapper').html('<i class="fas fa-spinner fa-spin"></i>');
                    },
                    complete: function() {}
                })
            })

            $(document).on('click', '.btn-kategori', function(e) {
                e.preventDefault();
                var $this = $(this).children();
                if (!$this.hasClass('active')) {
                    $('.card.active').removeClass('active');
                    $this.addClass('active');
                }
                let namaKategori = $(this).data('nama_kategori');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/kasir/pos/kategori/' + namaKategori,
                    // dataType: 'json',
                    success: function(data) {
                        $('#barang-wrapper').html(data.html);
                    },
                    error: function(err) {
                        console.log(err)
                    },
                    beforeSend: function() {
                        let loadingAsset = $('#loading-asset').data('asset_url');
                        $('#barang-wrapper').html('<i class="fas fa-spinner fa-spin"></i>');
                    },
                    complete: function() {}
                })
            });

            let orderedList = [];

            $(document).on('click', '.btn-pesan', function() {
                $('.pembayaran-wrapper').show();
                $('#btn-print-tagihan').prop('disabled', false);
                $('#btn-print-tagihan').removeClass('disabled');

                let pesanan = $(this).data('pesanan');
                let path = $(this).data('path');
                // check if item already exists in ordered list
                let existingItem = orderedList.find(item => item.id_barang === pesanan.id_barang);

                if (existingItem) {
                    // update quantity of existing item
                    existingItem.qty += 1;

                } else {
                    // add new item to ordered list
                    pesanan.qty = 1;
                    orderedList.push(pesanan);
                }


                let tagihanHTML = '';
                let subtotal = 0;
                let gambar = '';
                for (i in orderedList) {
                    if (orderedList[i].gambar == null) {
                        gambar = "/img/default-med.png";
                    } else {
                        gambar = path + "/" + orderedList[i].gambar;
                    }
                    subtotal += orderedList[i].harga * orderedList[i].qty;
                    tagihanHTML += '<div class="tagihan-barang-wrapper d-flex  mt-2">'
                    tagihanHTML += '<div class="img-wrapper main-radius">';
                    tagihanHTML += '<img src="' + gambar +
                        '" alt="" width="20">';
                    tagihanHTML += '</div>';
                    tagihanHTML += '<div class="detail-wrapper ml-4 mt-1">';
                    tagihanHTML += '<h6>' + orderedList[i].nama_barang + '</h6>';
                    tagihanHTML += '<div class="tagihan d-flex justify-content-between">';
                    tagihanHTML += '<p>x <strong id="qty_' + orderedList[i].id_barang + '">' + orderedList[
                            i]
                        .qty + '</strong></p>';
                    tagihanHTML +=
                        '<div><span data-path="' + path + '" data-id_barang="' + orderedList[i].id_barang +
                        '" style="cursor:pointer" class="btn-hapus-tagihan badge badge-secondary"><i class="fas fa-trash"></i> hapus</span></div>';
                    tagihanHTML += '<strong id="harga_' + orderedList[i].id_barang +
                        '" class="text-second">Rp. ' + addCommas(orderedList[i]
                            .harga *
                            orderedList[i].qty) +
                        ' </strong>';
                    tagihanHTML += '</div>';
                    tagihanHTML += '</div>';
                    tagihanHTML += '</div>';
                    $('#tagihan-ilustration').css('display', 'none');
                    $('#tagihan-wrapper').html(tagihanHTML);
                    $('#subtotal').html('Rp. ' + addCommas(subtotal))
                    $('#tax').html('Rp. ' + addCommas(subtotal))
                    $('#total').html('Rp. ' + addCommas(subtotal))

                    $('#pembayaran').on('keyup', function() {
                        let pembayaran = $(this).val();
                        let bayar = parseFloat(pembayaran.replace(',', ''))
                        $('#kembalian').html("Rp. " + addCommas(parseInt(bayar) - parseInt(
                            subtotal)));
                    })
                }

            })

            $(document).on('click', '.btn-hapus-tagihan', function() {
                let idbarang = $(this).data('id_barang');
                let path = $(this).data('path');
                removeItemById(idbarang);
            })

            function removeItemById(id_barang) {
                let index = orderedList.findIndex(item => {
                    return item.id_barang == id_barang;
                });


                if (index !== -1) {
                    orderedList[index].qty -= 1;
                    $('#qty_' + id_barang).html(orderedList[index].qty);
                    $('#harga_' + id_barang).html('Rp. ' + addCommas(orderedList[index].harga * orderedList[index]
                        .qty));
                    if (orderedList[index].qty < 1) {
                        $('#qty_' + id_barang).closest('.tagihan-barang-wrapper').remove();
                        orderedList = orderedList.filter(item => item.id_barang != id_barang);
                        $('.pembayaran-wrapper').hide();
                        $('#btn-print-tagihan').prop('disabled', true);
                        $('#btn-print-tagihan').addClass('disabled');
                    }
                }
                let subtotal = 0;
                for (i in orderedList) {
                    subtotal += orderedList[i].harga * orderedList[i].qty;

                    $('#subtotal').html('Rp. ' + addCommas(subtotal))
                    $('#tax').html('Rp. ' + addCommas(subtotal))
                    $('#total').html('Rp. ' + addCommas(subtotal))
                }

            }


            $('#btn-print-tagihan').on('click', function() {
                let pembayaran = $('#pembayaran').val();
                if (pembayaran === '') {
                    $('.required').html('harus di isi');
                    return;
                }

                let parentEl = $(this);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/kasir/create_pos',
                    // dataType: 'json',
                    data: {
                        pos: orderedList,
                        pembayaran: pembayaran,
                    },
                    method: 'post',
                    success: function(data) {
                        if (data == 1) {
                            Swal.fire('Berhasil', 'Transaksi terimpan',
                                'success').then((result) => {
                                document.location.href = '/kasir/pos/cetak'
                            });
                        }
                    },
                    error: function(err) {
                        console.log(err)
                    },
                    beforeSend: function() {
                        parentEl.html('<i class="fas fa-circle-notch fa-spin"></i> Loading');
                    },
                    complete: function() {}
                })
            })


            // STICKY BILL

            let tagihanOffset = $('#tagihan').offset().top;

            $('#tagihan').wrap('<div class="nav-placeholder"></div>');
            $('.nav-placeholder').height($('#tagihan').outerHeight());

            $(window).scroll(function() {
                let scrollTop = $(window).scrollTop();
                if (scrollTop >= (tagihanOffset + 0)) {
                    $('#tagihan').addClass('fixed-element');
                } else {
                    $('#tagihan').removeClass('fixed-element');
                }
            })

        })
    </script>
@endsection
