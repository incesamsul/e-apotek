<div class="row">
    <div class="col-lg-4">
        <div class="card ">
            <div class="card-header">
                <h4>Profile Pengguna</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                    <li class="media">
                        <div class="media-body text-center">
                            <img src="{{ auth()->user()->foto == '' ? asset('stisla/assets/img/avatar/avatar-1.png') : asset('data/foto_profile/' . auth()->user()->foto . '/' . auth()->user()->foto) }}"
                                alt="" class="rounded-circle mb-2" width="100">
                            <div class="media-title"></div>
                            <div class="font-weight-600 text-muted text-small"></div>
                            <div class="font-weight-600 text-muted text-small">User</div>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-body">
                            <a href="" class="btn bg-main text-white btn-lg btn-block btn-icon-split"
                                data-toggle="modal" data-target="#modal">
                                <i class="fas fa-camera"></i> Ganti Foto Profile
                            </a>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-body">
                            <div class="float-right">
                                <div class="font-weight-600 text-muted text-small">general</div>
                            </div>
                            <div class="media-title">Jenis Profile</div>
                        </div>
                    </li>
                    {{-- <li class="media">
              <div class="media-body">
                  <div class="float-right"><div class="font-weight-600 text-muted text-small"><i class="badge badge-danger">Tidak Aktif</i></div></div>
                  <div class="media-title">Bot Telegram</div>
              </div>
            </li> --}}
                    <li class="media">
                        <div class="media-body">
                            <div class="float-right">
                                <div class="font-weight-600 text-muted text-small">03-09-2018</div>
                            </div>
                            <div class="media-title">Tanggal Dibuat</div>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-body">
                            <form action="{{ URL::to('/ganti_kata_sandi') }}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input name="password_baru" type="text" class="form-control"
                                        placeholder="Ganti Kata sandi" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button onclick="return confirm('yakin ? ')" class="btn bg-main text-white"
                                            type="button">Ganti</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    {{-- <li class="media">
                <div class="media-body">
                  <div class="form-group">
                      <label for="exampleFormControlInput1">Aktivasi Bot Telegram</label>
                      <input type="foto" class="form-control" id="exampleFormControlInput1" placeholder="ID Telegram">
                    </div>
                </div>
              </li>
              <p>Bot Telegram SIAKAD STMIK AKBA
                  Aktifkan fitur Bot Telegram dengan mendaftarkan ID Telegram Anda. Fitur ini akan memberikan layanan notifikasi dan akses perintah SIAKAD STMIK AKBA melalui aplikasi Telegram. Klik SASiakadBot untuk menjalankan bot ini.</p> --}}
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-8">

        <div class="card">
            <div class="card-header">
                <h4>Detail Profile</h4>
            </div>
            <div class="card-body">
                <div class="container">
                    <ul class="list-unstyled list-unstyled-border">
                        <li class="media">
                            <div class="media-body text-center">
                                <img src="{{ auth()->user()->foto == '' ? asset('stisla/assets/img/avatar/avatar-1.png') : asset('data/foto_profile/' . auth()->user()->foto . '/' . auth()->user()->foto) }}"
                                    alt="" class="rounded-circle mb-2" width="200">
                                <div class="media-title"></div>
                                <div class="font-weight-600 text-muted text-small"></div>
                                <div class="font-weight-600 text-muted text-small">User</div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-body">
                                @if ($user)
                                    <table class="table table-striped">
                                        <tr>
                                            <td class="bg-soft-primary">Nama</td>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bg-soft-primary">Email</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="bg-soft-primary">Role</td>
                                            <td>{{ $user->role }}</td>
                                        </tr>
                                    </table>
                            </div>
                        @else
                            <div class="alert alert-warning">Belum ada data user, untuk lebih lanjut hubungi
                                admin</div>
                            @endif
                </div>
                </li>
                <li class="media">
                    <div class="media-body">
                        <a href="" class="btn bg-main text-white btn-lg btn-block btn-icon-split"
                            data-toggle="modal" data-target="#modal">
                            <i class="fas fa-camera"></i> Ganti Foto Profile
                        </a>
                        {{-- <a href="" class="btn bg-main text-white btn-lg btn-block btn-icon-split">
                                    <i class="fas fa-pen"></i> Edit Biodata
                                </a>  --}}
                    </div>
                </li>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>
