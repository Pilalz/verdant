<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ulasan;
use App\Models\Transaksi;

class UlasanController extends Controller
{
    public function ulasan()
    {
        return view('ulasan');
    }

    public function save(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
        ]);

        // Simpan data ke database
        Ulasan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

        // Redirect atau response setelah berhasil menyimpan
        return redirect()->route('ulasan')->with('success', 'Ulasan berhasil disimpan! Terimakasih atas masukan anda');
    }

    public function showUlasan()
    {
        $statusnya = "Belum Bayar";

        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();

        $ulasan = Ulasan::all();
        return view('admin.ulasan', compact('ulasan', 'transaksi', 'totalTransaksi'));
    }
}
