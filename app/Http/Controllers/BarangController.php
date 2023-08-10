<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{



    public function Barang($idBarang = null)
    {
        if ($idBarang) {
            $data['edit'] = Barang::where('id_barang', $idBarang)->first();
        } else {
            $data['edit'] = null;
        }
        $data['barang'] = Barang::all();
        $data['kategori'] = Kategori::all();
        return view('pages.barang.index', $data);
    }









    // CRUD barang
    public function tambahBarang(Request $request)
    {

        $image = $request->file('gambar');

        $imageName = null;
        if ($image) {
            $imageName = uniqid() . '.' . '.jpg';
            $image->move(public_path('data/gambar_barang/'), $imageName);
        }

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'id_kategori' => $request->id_kategori,
            'gambar' => $imageName,
        ]);
        return redirect()->back()->with('message', 'barang Berhasil di tambahkan');
    }

    public function ubahBarang(Request $request)
    {

        $image = $request->file('gambar');

        if ($image) {
            $imageName = uniqid() . '.' . '.jpg';
            $image->move(public_path('data/gambar_barang/'), $imageName);
            Barang::where('id_barang', $request->id_barang)->update([
                'nama_barang' => $request->nama_barang,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'id_kategori' => $request->id_kategori,
                'gambar' => $imageName,
            ]);
        } else {
            Barang::where('id_barang', $request->id_barang)->update([
                'nama_barang' => $request->nama_barang,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'id_kategori' => $request->id_kategori,
            ]);
        }

        return redirect()->back()->with('message', 'barang Berhasil di tambahkan');
    }

    public function hapusBarang($idBarang)
    {
        Barang::where([
            ['id_barang', '=', $idBarang]
        ])->delete();

        return redirect()->back()->with('message', 'barang Berhasil di hapus');
    }
}
