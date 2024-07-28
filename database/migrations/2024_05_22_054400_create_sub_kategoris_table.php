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
        Schema::create('sub_kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sub');
            $table->unsignedBigInteger('kategori');
            $table->timestamps();

            $table->foreign('kategori')->references('id')->on('kategoris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_kategoris', function (Blueprint $table) {
            $table->dropForeign(['kategori']);
        });

        Schema::dropIfExists('sub_kategoris');
    }
};
