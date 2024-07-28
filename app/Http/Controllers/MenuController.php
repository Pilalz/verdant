<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Kategori;
use App\Models\Sub_kategori;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index($id=1)
    {
        $kategoris = Kategori::all(); //semua

        $kategori = Kategori::find($id); //1 

        $sub = Sub_kategori::where('kategori', $id)->get();

        $menus = Menu::join('sub_kategoris', 'menus.kategori_menu', '=', 'sub_kategoris.id')
            ->where('sub_kategoris.kategori', $id)
            ->select('menus.*')
            ->get();

        return view('index', compact('menus', 'kategoris', 'kategori', 'sub'));
    }

    //ADMIN
    public function menu()
    {
        $menu = Menu::join('sub_kategoris', 'menus.kategori_menu', '=', 'sub_kategoris.id')
            ->join('kategoris', 'sub_kategoris.kategori', '=', 'kategoris.id')
            ->select('menus.*', 'sub_kategoris.nama_sub', 'kategoris.nama_kategori')
            ->get();

        $statusnya = "Belum Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();
        return view('admin.menu.menu', compact('menu','totalTransaksi', 'transaksi'));
    }
    
    public function create()
    {
        $subkategori = Sub_kategori::join('kategoris', 'sub_kategoris.kategori', '=', 'kategoris.id')
            ->select('Sub_kategoris.*', 'kategoris.nama_kategori')
            ->get();

        $statusnya = "Belum Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();
        return view('admin.menu.tambah_menu', compact('subkategori', 'transaksi', 'totalTransaksi'));
    }
    
    public function save(Request $request)
    {
        //validate form
        $request->validate([
            'judul_menu'     => 'required|max:255',
            'deskripsi_menu'   => 'required|max:255',
            'harga_menu'     => 'required|max:255',
            'gambar_menu'     => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
            'kategori_menu'     => 'required|max:255'
        ]);

        // upload image
        $imageName = time().'.'.$request->gambar_menu->extension();  
        $request->gambar_menu->move(public_path('image'), $imageName);

        //create post
        Menu::create([
            'judul_menu'     => $request->judul_menu,
            'deskripsi_menu'   => $request->deskripsi_menu,
            'harga_menu'     => $request->harga_menu,
            'gambar_menu'     => $imageName,
            'kategori_menu'     => $request->kategori_menu,
        ]);

        //redirect to index
        return redirect()->route('admin.menu')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    public function edit(string $id)
    {
        $post = Menu::join('sub_kategoris', 'menus.kategori_menu', '=', 'sub_kategoris.id')
            ->join('kategoris', 'sub_kategoris.kategori', '=', 'kategoris.id')
            ->select('menus.*', 'sub_kategoris.nama_sub', 'kategoris.nama_kategori')
            ->findOrFail($id);

        $subkategori = Sub_kategori::join('kategoris', 'sub_kategoris.kategori', '=', 'kategoris.id')
            ->select('Sub_kategoris.*', 'kategoris.nama_kategori')
            ->get();

        $statusnya = "Belum Bayar";
        $transaksi = Transaksi::where('transaksis.status', $statusnya)->get();
        $totalTransaksi = Transaksi::where('transaksis.status', $statusnya)->count();

        //render view with menu
        return view('admin.menu.edit-menu', compact('post', 'subkategori', 'transaksi', 'totalTransaksi'));
    }

    public function update(Request $request, string $id)
    {
         //validate form
        $request->validate([
            'judul_menu'     => 'sometimes|max:255',
            'deskripsi_menu'   => 'sometimes|max:255',
            'harga_menu'     => 'sometimes|max:255',
            'gambar_menu'     => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori_menu'     => 'sometimes|max:255',
        ]);

        //get post by ID
        $post = Menu::findOrFail($id);

        $data = $request->only('judul_menu', 'deskripsi_menu', 'harga_menu', 'kategori_menu');

        if($request->hasFile('gambar_menu')){
            $imageName = time() . '.' . $request->gambar_menu->extension();  
            $request->gambar_menu->move(public_path('image'), $imageName);

            // Hapus gambar lama
            if ($post->gambar_menu && file_exists(public_path('image/' . $post->gambar_menu))) {
                unlink(public_path('image/' . $post->gambar_menu));
            }

            $data['gambar_menu'] = $imageName;
        }

        $post->update($data);

        //redirect to index
        return redirect()->route('admin.menu')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function remove(string $id)
    {
         //get post by id_menu
        $post = Menu::findOrFail($id);

         //delete image
        // Storage::delete('public/img/'. $post->gambar_menu);

         //delete post
        $post->delete();

         //redirect to index
        return redirect()->route('admin.menu')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function tentang()
    {
        return view('tentang');
    }
}
