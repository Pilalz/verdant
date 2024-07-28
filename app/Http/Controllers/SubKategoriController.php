<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sub_kategori;
use App\Models\Kategori;
use App\Models\Transaksi;

class SubKategoriController extends Controller
{
    public function subkategori()
    {
        $subkategori = Sub_kategori::join('kategoris', 'sub_kategoris.kategori', '=', 'kategoris.id')
            ->select('Sub_kategoris.*', 'kategoris.nama_kategori')
            ->get();

        $statusnya = "Belum Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();

        return view('admin.subkategori.subkategori', compact('subkategori', 'transaksi', 'totalTransaksi'));
    }

    public function create()
    {
        $kategori = Kategori::all();

        $statusnya = "Belum Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();

        return view('admin.subkategori.tambah-sub', compact('kategori', 'transaksi', 'totalTransaksi'));
    }

    public function save(Request $request)
    {
        //validate form
        $request->validate([
            'nama_sub'     => 'required|max:255',
            'kategori'     => 'required|max:255'
        ]);

        //create post
        Sub_kategori::create([
            'nama_sub'     => $request->nama_sub,
            'kategori'     => $request->kategori
        ]);

        //redirect to index
        return redirect()->route('admin.subkategori')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id)
    {
        $kategori = Kategori::all();
        $post = Sub_kategori::join('kategoris', 'sub_kategoris.kategori', '=', 'kategoris.id')
            ->where('kategoris.id', $id)
            ->select('sub_kategoris.*', 'kategoris.nama_kategori')
            ->findOrFail($id);

        $statusnya = "Belum Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();
            
        //render view with menu
        return view('admin.subkategori.edit-sub', compact('post', 'kategori', 'transaksi', 'totalTransaksi'));
    }

    public function update(Request $request, string $id)
    {
         //validate form
        $request->validate([
            'nama_sub'     => 'sometimes|max:255',
            'kategori'     => 'sometimes|max:255'
        ]);

        //get post by ID
        $post = Sub_kategori::findOrFail($id);

        $post->update([
            'nama_sub'     => $request->nama_sub,
            'kategori'     => $request->kategori
        ]);

        //redirect to index
        return redirect()->route('admin.subkategori')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function remove(string $id)
    {
        $post = Sub_kategori::findOrFail($id);

         //delete post
        $post->delete();

         //redirect to index
        return redirect()->route('admin.subkategori')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
