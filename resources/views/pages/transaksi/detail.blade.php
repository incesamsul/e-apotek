@extends('layouts.v_template')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex  justify-content-between">
                        <h4>Detail Pos</h4>
                        <div class="table-tools d-flex justify-content-around ">
                            <a href="{{ URL::to('/kasir/transaksi_pos') }}" class="btn btn-info mr-2"><i
                                    class="fas fa-arrow-left"></i></a>
                            <a href="{{ URL::to('/kasir/pos/cetak/' . $id_transaksi_pos) }}" class="btn btn-info"><i
                                    class="fas fa-print "></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-hover table-user table-action-hover" id="table-data">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <td>nama barang</td>
                                    <td>Harga barang</td>
                                    <td>qty</td>
                                    <td>harga * qty</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($transaksi as $row)
                                    @php
                                        $total += $row->barang->harga * $row->qty;
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->barang->nama_barang }}</td>
                                        <td>Rp. {{ number_format($row->barang->harga) }}</td>
                                        <td>{{ $row->qty }}</td>
                                        <td> Rp. {{ number_format($row->barang->harga * $row->qty) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="center" colspan="4">total</td>
                                    <td>Rp. {{ number_format($total) }}</td>
                                </tr>
                            </tfoot>
                        </table>

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

        $('#liTransaksiPos').addClass('active');
    </script>
@endsection
