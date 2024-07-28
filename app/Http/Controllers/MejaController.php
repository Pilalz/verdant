<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;
use App\Models\Transaksi;

class MejaController extends Controller
{
    public function meja()
    {
        $meja = Meja::all();

        $statusnya = "Belum Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();
        return view('admin.meja.meja', compact('meja', 'transaksi', 'totalTransaksi'));
    }

    public function create()
    {
        $statusnya = "Belum Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();

        return view('admin.meja.tambah-meja', compact('transaksi', 'totalTransaksi'));
    }

    public function save(Request $request)
    {
        //validate form
        $request->validate([
            'no_meja'     => 'required|max:255'
        ]);

        //create post
        Meja::create([
            'no_meja'     => $request->no_meja
        ]);

        //redirect to index
        return redirect()->route('admin.meja')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function remove(string $id)
    {
        $post = Meja::findOrFail($id);

         //delete post
        $post->delete();

         //redirect to index
        return redirect()->route('admin.meja')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function edit(string $id)
    {
        $post = Meja::findOrFail($id);
        
        $statusnya = "Belum Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();
        return view('admin.meja.edit-meja', compact('post', 'transaksi', 'totalTransaksi'));
    }

    public function update(Request $request, string $id)
    {
         //validate form
        $request->validate([
            'no_meja'     => 'sometimes|max:255'
        ]);

        //get post by ID
        $post = Meja::findOrFail($id);

        $post->update([
            'no_meja'     => $request->no_meja
        ]);

        //redirect to index
        return redirect()->route('admin.meja')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
