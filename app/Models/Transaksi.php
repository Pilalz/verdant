<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['no_meja', 'nama_pelanggan', 'id_kasir', 'kembalian', 'dibayar', 'total_harga', 'total_menu', 'status', 'lokasi'];
}
