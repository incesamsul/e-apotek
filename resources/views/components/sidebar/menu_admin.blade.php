<li data-toggle="tooltip" title="Pengguna" data-placement="right" class="" id="liPengguna">
    <a class="nav-link" href="{{ URL::to('/admin/pengguna') }}">
        <i class="fa-regular fa-circle-user"></i>
        <span>Pengguna</span>
    </a>
</li>
<li class="" id="libarang" data-toggle="tooltip" title="Kelola barang" data-placement="right">
    <a class="nav-link" href="{{ URL::to('/admin/barang') }}">
        <i class="fas fa-stethoscope"></i> <span>Kelola Barang</span>
    </a>
</li>
<li class="" id="liKategori" data-toggle="tooltip" title="Kategori" data-placement="right">
    <a class="nav-link" href="{{ URL::to('/admin/kategori') }}">
        <i class="fa-regular fa-rectangle-list"></i>
        <span>Kategori</span>
    </a>
</li>
<li class="" id="liPos" data-toggle="tooltip" title="Transaksi" data-placement="right">
    <a class="nav-link" href="{{ URL::to('/kasir/pos') }}">
        <i class="fa-regular fa-handshake"></i>
        <span>Transaksi</span>
    </a>
</li>


<li class="" id="liTransaksiPos" data-toggle="tooltip" title="Laporan Transaksi " data-placement="right">
    <a class="nav-link" href="{{ URL::to('/kasir/transaksi_pos') }}">
        <i class="fa-regular fa-rectangle-list"></i>
        <span>Laporan Transaksi </span>
    </a>
</li>
