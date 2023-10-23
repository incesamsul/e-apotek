<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\TagihanPos;
use App\Models\TransaksiPos;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class PosController extends Controller
{





    public function pos($kategori = null)
    {
        if (!$kategori) {
            $data['barang'] = Barang::all();
            $data['nama_kategori'] = null;
        } else {
            $namaKategori = lineToSpace($kategori);
            $_kategori = Kategori::where('nama_kategori', $namaKategori)->first();
            $idKategori = $_kategori->id_kategori;
            $data['nama_kategori'] = $namaKategori;
            $data['barang'] = Barang::where('id_kategori', $idKategori)->get();
        }
        $data['kategori'] = Kategori::all();
        return view('pages.pos.index', $data);
    }


    public function transaksiPos(Request $request)
    {
        $tglAwal = $request->tgl_mulai;
        $tglAkhir = $request->tgl_akhir;
        $query = TransaksiPos::query();
        if ($tglAwal && $tglAkhir) {
            $query->whereBetween('tgl_transaksi', [$tglAwal, $tglAkhir]);
        }
        $data['transaksi'] = $query->get();
        // $data['transaksi'] = TransaksiPos::all();
        return view('pages.transaksi.pos', $data);
    }

    public function detailTransaksiPos($idTransaksiPos)
    {
        $data['transaksi'] = TagihanPos::where('id_transaksi_pos', $idTransaksiPos)->get();
        $data['id_transaksi_pos'] = $idTransaksiPos;
        return view('pages.transaksi.detail', $data);
    }

    public function cetakPos($idTransaksiPos = null)
    {
        if (!$idTransaksiPos) {
            $transaksiTerakhir = TransaksiPos::latest()->first();
            $data['pembayaran'] = $transaksiTerakhir->pembayaran;
            $data['tagihan'] = TagihanPos::where('id_transaksi_pos', $transaksiTerakhir->id_transaksi_pos)->get();
        } else {
            $transaksi = TransaksiPos::where('id_transaksi_pos', $idTransaksiPos)->first();
            $data['pembayaran'] = $transaksi->pembayaran;
            $data['tagihan'] = TagihanPos::where('id_transaksi_pos', $transaksi->id_transaksi_pos)->get();
        }
        return view('pages.pos.cetak', $data);
    }

    public function posKategori($kategori)
    {
        if ($kategori == "all") {
            $data['barang'] = Barang::all();
            $data['nama_kategori'] = '';
        } else {
            $namaKategori = lineToSpace($kategori);
            $_kategori = Kategori::where('nama_kategori', $namaKategori)->first();
            $idKategori = $_kategori->id_kategori;
            $data['nama_kategori'] = $namaKategori;
            $data['barang'] = Barang::where('id_kategori', $idKategori)->get();
        }
        $data['kategori'] = Kategori::all();
        $html = View::make('pages.pos.kategori', $data)->render();

        return response()->json([
            'html' => $html,
        ]);
    }

    public function posCari(Request $request)
    {
        if ($request['query'] == null || !$request['query'] || empty($request['query'])) {
            $data['barang'] = Barang::all();
            $data['nama_kategori'] = '';
        } else {
            $data['barang'] = Barang::where('nama_barang', 'like', '%' . $request['query'] . '%')->get();
            $data['nama_kategori'] = '';
        }
        $html = View::make('pages.pos.kategori', $data)->render();
        return response()->json([
            'html' => $html,
        ]);
    }


    public function createPos(Request $request)
    {
        $transaksi = TransaksiPos::create([
            'id_user' => auth()->user()->id,
            'tgl_transaksi' => Carbon::now(),
            'jam_transaksi' => getHour(),
            'pembayaran' => (float) str_replace(",", "", $request->pembayaran),
        ])->id;
        foreach ($request->pos as $row) {
            TagihanPos::create([
                'id_transaksi_pos' => $transaksi,
                'id_barang' => $row['id_barang'],
                'qty' => $row['qty']
            ]);

            $barang = Barang::where('id_barang', $row['id_barang']);
            $lastStok = $barang->first();
            $barang->update([
                'stok' => $lastStok->stok - $row['qty']
            ]);
        }
        return 1;
    }
}
