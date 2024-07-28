<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('judul_menu');
            $table->text('deskripsi_menu');
            $table->string('harga_menu');
            $table->string('gambar_menu');
            $table->unsignedBigInteger('kategori_menu');
            $table->timestamps();

            $table->foreign('kategori_menu')->references('id')->on('sub_kategoris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign(['kategori_menu']);
        });

        Schema::dropIfExists('menus');
    }
};
