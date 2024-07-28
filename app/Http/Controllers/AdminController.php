<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Detail_transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function user()
    {
        $user = User::all();

        if ($user->isEmpty()) {
            return redirect()->route('admin.user')->withErrors('No users found.');
        }

        $statusnya = "Belum Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();

        return view('admin.user.user', compact('user', 'transaksi', 'totalTransaksi'));
    }

    public function create()
    {
        $statusnya = "Belum Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();

        return view('admin.user.tambah-user', compact('transaksi', 'totalTransaksi'));
    }

    public function save(Request $request)
    {
        //validate form
        $request->validate([
            'nama'     => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'     => 'required|min:6|confirmed',
            'role'     => 'required|max:255'
        ]);

        //create post
        User::create([
            'nama'     => $request->nama,
            'email'     => $request->email,
            'password'     => $request->password,
            'role'     => $request->role
        ]);

        //redirect to index
        return redirect()->route('admin.user')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id)
    {
        $post = User::findOrFail($id);

        $statusnya = "Belum Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();
        //render view with menu
        return view('admin.user.edit-user', compact('post', 'transaksi', 'totalTransaksi'));
    }

    public function update(Request $request, string $id)
    {
         //validate form
        $request->validate([
            'nama'     => 'sometimes|max:255',
            'email'     => 'sometimes|email|max:255',
            'password'     => 'sometimes|min:6|confirmed',
            'role'     => 'sometimes|max:255'
        ]);

        //get post by ID
        $post = User::findOrFail($id);

        $post->update([
            'nama'     => $request->nama,
            'email'     => $request->email,
            'password'     => $request->password,
            'role'     => $request->role
        ]);

        //redirect to index
        return redirect()->route('admin.user')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function remove(string $id)
    {
        $post = User::findOrFail($id);

         //delete post
        $post->delete();

         //redirect to index
        return redirect()->route('admin.user')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'owner') {
                return redirect()->intended('admin/dashboard');
            } elseif (Auth::user()->role == 'staff') {
                return redirect()->intended('admin/dashboard');
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard()
    {
        $today = Carbon::today();
        $statusnya = "Belum Bayar";

        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();
        $data = Transaksi::whereDate('created_at', $today)->count();

        $dataPendapatan = Transaksi::whereDate('created_at', $today)->sum('total_harga');

        return view('admin.index', compact('transaksi', 'totalTransaksi','data','dataPendapatan'));
    }

    public function transaksi()
    {
        $statusnya="Belum Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();

        return view('admin.pesanan', compact('transaksi','totalTransaksi'));
    }

    public function transaksiPaid()
    {
        $statusnya="Sudah Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();

        return view('admin.pesanan-paid', compact('transaksi','totalTransaksi'));
    }

    public function detailTransaksi(string $id)
    {
        $detail_transaksi = Detail_transaksi::join('transaksis', 'detail_transaksis.id_transaksi', '=', 'transaksis.id')
            ->join ('menus', 'detail_transaksis.id_menu', '=', 'menus.id')
            ->select('transaksis.*', 'detail_transaksis.*' , 'menus.*')
            ->where('detail_transaksis.id_transaksi', $id)
            ->FirstOrFail();

        $menu = Detail_transaksi::join('transaksis', 'detail_transaksis.id_transaksi', '=', 'transaksis.id')
            ->join ('menus', 'detail_transaksis.id_menu', '=', 'menus.id')
            ->select('transaksis.*', 'detail_transaksis.*' , 'menus.*')
            ->where('detail_transaksis.id_transaksi', $id)
            ->get();

        return view('admin.detail-pesanan', compact('detail_transaksi', 'menu'));
    }

    public function detailTransaksiPaid(string $id)
    {
        $detail_transaksi = Detail_transaksi::join('transaksis', 'detail_transaksis.id_transaksi', '=', 'transaksis.id')
            ->join ('menus', 'detail_transaksis.id_menu', '=', 'menus.id')
            ->select('transaksis.*', 'detail_transaksis.*' , 'menus.*')
            ->where('detail_transaksis.id_transaksi', $id)
            ->FirstOrFail();

        $menu = Detail_transaksi::join('transaksis', 'detail_transaksis.id_transaksi', '=', 'transaksis.id')
            ->join ('menus', 'detail_transaksis.id_menu', '=', 'menus.id')
            ->select('transaksis.*', 'detail_transaksis.*' , 'menus.*')
            ->where('detail_transaksis.id_transaksi', $id)
            ->get();

        return view('admin.detail-pesanan-paid', compact('detail_transaksi', 'menu'));
    }

    public function updateTransaksi(Request $request, string $id)
    {
         //validate form
        $request->validate([
            'no_meja'     => 'sometimes|max:255',
            'nama_pelanggan'     => 'sometimes|max:255',
            'id_kasir'     => 'sometimes|max:255',
            'kembalian'     => 'sometimes|max:255',
            'dibayar'     => 'sometimes|max:255',
            'total_harga'     => 'sometimes|max:255',
            'total_menu'     => 'sometimes|max:255'
        ]);

        //get post by ID
        $post = Transaksi::findOrFail($id);

        $post->update([
            'no_meja'     => $request->no_meja,
            'nama_pelanggan'     => $request->nama_pelanggan,
            'id_kasir'     => $request->id_kasir,
            'kembalian'     => $request->kembalian,
            'dibayar'     => $request->dibayar,
            'total_harga'     => $request->total_harga,
            'total_menu'     => $request->total_menu,
            'status'     => 'Sudah Bayar'
        ]);

        //redirect to index
        return redirect()->route('admin.pesanan')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
