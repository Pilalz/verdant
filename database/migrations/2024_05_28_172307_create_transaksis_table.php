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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('no_meja');
            $table->string('nama_pelanggan');
            $table->unsignedBigInteger('id_kasir');
            $table->string('kembalian');
            $table->string('dibayar');
            $table->text('total_harga');
            $table->string('total_menu');
            $table->string('status');
            $table->string('lokasi')->nullable()->change();
            $table->timestamps();

            $table->foreign('id_kasir')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_transaksis', function (Blueprint $table) {
            $table->dropForeign(['id_kasir']);
        });

        Schema::dropIfExists('transaksis');
    }
};
