@extends('layouts.v_template')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex  justify-content-between">
                        <h4>Transaksi Pos</h4>
                        <form class="table-tools d-flex justify-content-around ">
                            <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control">
                            <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control ml-2">
                            <button type="submit" class="btn btn-primary ml-2"><i class="fas fa-search"></i></button>
                            <a href="{{ URL::to('/kasir/transaksi_pos') }}" class="btn btn-secondary ml-2"><i
                                    class="fas fa-sync"></i></a>
                        </form>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-hover table-user table-action-hover" id="table-data">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <td>Tgl Transaksi</td>
                                    <td>Jam transaksi</td>
                                    <td>Kasir</td>
                                    <td>aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->tgl_transaksi }}</td>
                                        <td>{{ $row->jam_transaksi }}</td>
                                        <td>{{ $row->user->name }}</td>
                                        <td>
                                            <a href="{{ URL::to('/kasir/transaksi_pos/' . $row->id_transaksi_pos) }}"
                                                class="btn btn-info">lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {});

        $('#liTransaksiPos').addClass('active');
    </script>
@endsection
