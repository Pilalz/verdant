<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Meja;
use App\Models\Transaksi;
use App\Models\Detail_transaksi;
use Session;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->route('cart.view')->with('error', 'Menu item tidak ditemukan.');
        }

        $cart = session()->get('cart', []);

        // Check if the menu item already exists in the cart
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $menu->id,
                "nama" => $menu->judul_menu,
                "quantity" => 1,
                "harga" => $menu->harga_menu,
                "gambar" => $menu->gambar_menu
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('index')->with('success', 'Item berhasil ditambahkan ke keranjang!');
    }

    public function viewCart()
    {
        $meja = Meja::all();
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['harga'] * $item['quantity'];
        }

        return view('cart', compact('cart', 'meja', 'total'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view')->with('success', 'Item berhasil dihapus dari keranjang!');
    }

    public function increaseQuantity($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view')->with('success', 'Quantity increased successfully.');
    }

    public function decreaseQuantity($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id]) && $cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view')->with('success', 'Quantity decreased successfully.');
    }

    public function checkout(Request $request)
    {
        // Validasi data
        $request->validate([
            'atasnama' => 'required|string|max:255',
            'meja' => 'required|integer',
            'lokasi' => 'nullable|string',
        ]);

        // Ambil data dari session cart
        $cart = session()->get('cart', []);
        $total_harga = 0;
        $total_menu = 0;
        foreach ($cart as $item) {
            $total_harga += $item['harga'] * $item['quantity'];
            $total_menu += $item['quantity'];
        }

        $transaksi = Transaksi::create([
            'no_meja' => $request->meja,
            'nama_pelanggan' => $request->atasnama,
            'id_kasir' => 1,
            'kembalian' =>0,
            'dibayar' =>0,
            'total_harga' => $total_harga,
            'total_menu' => $total_menu,
            'status' => 'Belum Bayar',
            'lokasi' => $request->lokasi ?? null // Menggunakan null jika lokasi tidak diisi
        ]);

        foreach ($cart as $item) {
            detail_transaksi::create([
                'id_transaksi' => $transaksi->id,
                'id_menu' => $item['id'],
                'jumlah' => $item['quantity'],
                'total' => $item['quantity'] * $item['harga']
            ]);
        }

        // Hapus cart dari session setelah checkout
        session()->forget('cart');

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('transaksi')->with('success', 'Checkout berhasil!');
    }

    public function checkoutSuccess()
    {
        return view('transaksi');
    }
}