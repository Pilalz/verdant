<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\Transaksi;

class KategoriController extends Controller
{
    public function kategori()
    {
        $kategori = Kategori::all();

        $statusnya = "Belum Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();
        return view('admin.kategori.kategori', compact('kategori', 'transaksi', 'totalTransaksi'));
    }

    public function create()
    {
        $statusnya = "Belum Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();

        return view('admin.kategori.tambah-kategori', compact('transaksi', 'totalTransaksi'));
    }

    public function save(Request $request)
    {
        //validate form
        $request->validate([
            'nama_kategori'     => 'required|max:255'
        ]);

        //create post
        Kategori::create([
            'nama_kategori'     => $request->nama_kategori
        ]);

        //redirect to index
        return redirect()->route('admin.kategori')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id)
    {
        $post = Kategori::findOrFail($id);
        
        $statusnya = "Belum Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();

        return view('admin.kategori.edit-kategori', compact('post', 'transaksi', 'totalTransaksi'));
    }

    public function update(Request $request, string $id)
    {
         //validate form
        $request->validate([
            'nama_kategori'     => 'sometimes|max:255'
        ]);

        //get post by ID
        $post = Kategori::findOrFail($id);

        $post->update([
            'nama_kategori'     => $request->nama_kategori
        ]);

        //redirect to index
        return redirect()->route('admin.kategori')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function remove(string $id)
    {
        $post = Kategori::findOrFail($id);

         //delete post
        $post->delete();

         //redirect to index
        return redirect()->route('admin.kategori')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
