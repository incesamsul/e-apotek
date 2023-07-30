<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function kategori($idKategori = null)
    {
        if ($idKategori) {
            $data['edit'] = Kategori::where('id_kategori', $idKategori)->first();
        } else {
            $data['edit'] = null;
        }
        $data['kategori'] = Kategori::all();
        return view('pages.kategori.index', $data);
    }


    // CRUD KATEGORI
    public function tambahKategori(Request $request)
    {

        $image = $request->file('gambar');
        $imageName = null;
        if ($image) {
            $imageName = uniqid() . '.' . '.jpg';
            $image->move(public_path('data/gambar_kategori/'), $imageName);
        }

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'gambar' => $imageName,
        ]);
        return redirect()->back()->with('message', 'kategori Berhasil di tambahkan');
    }

    public function ubahKategori(Request $request)
    {

        $image = $request->file('gambar');

        if ($image) {
            $imageName = uniqid() . '.' . '.jpg';
            $image->move(public_path('data/gambar_kategori/'), $imageName);
            Kategori::where('id_kategori', $request->id_kategori)->update([
                'nama_kategori' => $request->nama_kategori,
                'gambar' => $imageName,
            ]);
        } else {
            Kategori::where('id_kategori', $request->id_kategori)->update([
                'nama_kategori' => $request->nama_kategori,
            ]);
        }

        return redirect()->back()->with('message', 'kategori Berhasil di tambahkan');
    }

    public function hapusKategori($idKategori)
    {
        Kategori::where([
            ['id_kategori', '=', $idKategori]
        ])->delete();

        return redirect()->back()->with('message', 'kategori Berhasil di hapus');
    }
}
