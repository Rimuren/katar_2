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

        // Tabel Poin
        Schema::create('poin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPelanggan');
            $table->integer('min_harga');
            $table->integer('max_harga');
            $table->integer('poin');
            $table->timestamps();

            $table->foreign('idPelanggan')->references('id')->on('pelanggan')->onDelete('cascade');
        });

        // Tabel barang
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idmerk');
            $table->unsignedBigInteger('idkategori');
            $table->string('namaBarang');
            $table->integer('stok')->nullable();
            $table->decimal('hargaBeli', 15, 2);
            $table->decimal('hargaJual', 15, 2);

            $table->foreign('idmerk')->references('id')->on('merk')->onDelete('cascade');
            $table->foreign('idkategori')->references('id')->on('kategori')->onDelete('cascade');
        });

        // Tabel Staff
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('namaStaff');
            $table->unsignedBigInteger('idJabatan');
            $table->string('email')->unique();
            $table->string('noTlp')->unique();
            $table->timestamps();

            $table->foreign('idJabatan')->references('id')->on('jabatan');
        });        
        // Tabel opname
        Schema::create('opname', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idbarang');
            $table->unsignedBigInteger('idstaff');
            $table->date('tglOpname');
            $table->integer('stokFisik')->nullable();
            $table->integer('stokSistem')->nullable();
            $table->integer('selisih')->nullable();

            $table->foreign('idbarang')->references('id')->on('barang')->onDelete('cascade');
            $table->foreign('idstaff')->references('id')->on('staff')->onDelete('cascade');
        });

        // Tabel shop
        Schema::create('shop', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idbarang');
            $table->integer('jumlahPoin')->nullable();
            $table->string('image')->nullable();

            $table->foreign('idbarang')->references('id')->on('barang')->onDelete('cascade');
        });

        // Tabel shift
        Schema::create('shift', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idstaff');
            $table->time('jamKerja');
            $table->time('jamPulang');

            $table->foreign('idstaff')->references('id')->on('staff')->onDelete('cascade');
        });

        // Tabel cash_Drawer
        Schema::create('cash_drawer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idshift');
            $table->time('jamBuka');
            $table->time('jamTutup');
            $table->integer('saldoAwal');
            $table->integer('saldoAkhir')->nullable();
            $table->foreign('idshift')->references('id')->on('shift')->onDelete('cascade');
        });
        
        // Tabel transaksi
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPelanggan');
            $table->unsignedBigInteger('idStaff');
            $table->string('namaTransaksi')->nullable();
            $table->date('tglTransaksi');
            $table->integer('totalTransaksi');
            $table->enum('tipeTransaksi', ['beli', 'tukar']);
            $table->foreign('idPelanggan')->references('id')->on('pelanggan')->onDelete('cascade');
            $table->foreign('idStaff')->references('id')->on('staff')->onDelete('cascade');
        });

        // Tabel pembelian
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idtransaksi');
            $table->unsignedBigInteger('idbarang');
            $table->unsignedBigInteger('idsupplier');
            $table->integer('quantity');
            $table->date('tglPembelian');

            $table->foreign('idtransaksi')->references('id')->on('transaksi')->onDelete('cascade');
            $table->foreign('idbarang')->references('id')->on('barang')->onDelete('cascade');
            $table->foreign('idsupplier')->references('id')->on('supplier')->onDelete('cascade');
        });

        // Tabel penukaran
        Schema::create('penukaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idtransaksi');
            $table->unsignedBigInteger('idpelanggan');
            $table->unsignedBigInteger('idshop');
            $table->integer('pointUsed');
            $table->date('tglRedeem');

            $table->foreign('idtransaksi')->references('id')->on('transaksi')->onDelete('cascade');
            $table->foreign('idpelanggan')->references('id')->on('pelanggan')->onDelete('cascade');
            $table->foreign('idshop')->references('id')->on('shop')->onDelete('cascade');
        });

        // Tabel penjualan
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idtransaksi');
            $table->unsignedBigInteger('idbarang');
            $table->integer('quantity');
            $table->decimal('totalHarga', 10, 2);
            $table->date('tglPenjualan');

            $table->foreign('idtransaksi')->references('id')->on('transaksi')->onDelete('cascade');
            $table->foreign('idbarang')->references('id')->on('barang')->onDelete('cascade');
        });
        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poin');
        Schema::dropIfExists('barang');
        Schema::dropIfExists('opname');
        Schema::dropIfExists('shop');
        Schema::dropIfExists('shift');
        Schema::dropIfExists('cash_drawer');
        Schema::dropIfExists('transaksi');
        Schema::dropIfExists('pembelian');
        Schema::dropIfExists('penukaran');
        Schema::dropIfExists('penjualan');
        Schema::dropIfExists('staff');

    }
};
