<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['judul_menu', 'deskripsi_menu', 'harga_menu', 'gambar_menu', 'kategori_menu'];
}
