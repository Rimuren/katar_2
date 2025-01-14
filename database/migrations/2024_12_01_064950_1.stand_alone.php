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
        // Tabel Pelanggan
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->string('namaPelanggan');
            $table->string('noTlp')->unique();
            $table->string('email')->unique();
            $table->timestamps();
        });
        
        // Tabel Supplier
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('namaSupplier');
            $table->string('noTlp')->unique();
            $table->string('email')->unique();
            $table->timestamps();
        });

        // Tabel Jabatan
        Schema::create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->string('namaJabatan');
        });        

        // Tabel Merk
        Schema::create('merk', function (Blueprint $table) {
            $table->id();
            $table->string('namaMerk');
        });

        // Tabel Kategori
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('namaKategori');
        });     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
        Schema::dropIfExists('supplier');
        Schema::dropIfExists('merk');
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('jabatan');
        Schema::dropIfExists('poin');
    }
};
