<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class B_relational extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Data untuk tabel barang
        DB::table('barang')->insert([
            [
                'idmerk' => 1, // Sesuaikan dengan ID merk yang ada
                'idkategori' => 1, // Sesuaikan dengan ID kategori yang ada
                'namaBarang' => $faker->word(),
                'stok' => 100,
                'hargaBeli' => $faker->randomFloat(2, 100, 500),
                'hargaJual' => $faker->randomFloat(2, 500, 1000),
            ],
            [
                'idmerk' => 2,
                'idkategori' => 2,
                'namaBarang' => $faker->word(),
                'stok' => 50,
                'hargaBeli' => $faker->randomFloat(2, 100, 500),
                'hargaJual' => $faker->randomFloat(2, 500, 1000),
            ],
        ]);

        // Data untuk tabel opname
        DB::table('opname')->insert([
            [
                'idbarang' => 1, // Sesuaikan dengan ID barang yang ada
                'idstaff' => 1, // Sesuaikan dengan ID staff yang ada
                'tglOpname' => now(),
                'stokFisik' => 90,
                'stokSistem' => 100,
                'selisih' => -10,
            ],
            [
                'idbarang' => 2,
                'idstaff' => 2,
                'tglOpname' => now(),
                'stokFisik' => 50,
                'stokSistem' => 50,
                'selisih' => 0,
            ],
        ]);

        // Data untuk tabel shop
        DB::table('shop')->insert([
            [
                'idbarang' => 1,
                'poinRequired' => 100,
            ],
            [
                'idbarang' => 2,
                'poinRequired' => 150,
            ],
        ]);

        // Data untuk tabel shift
        DB::table('shift')->insert([
            [
                'idstaff' => 1,
                'jamKerja' => '08:00:00',
                'jamPulang' => '16:00:00',
            ],
            [
                'idstaff' => 2,
                'jamKerja' => '09:00:00',
                'jamPulang' => '17:00:00',
            ],
        ]);

        // Data untuk tabel cash_drawer
        DB::table('cash_drawer')->insert([
            [
                'idshift' => 1,
                'jamBuka' => '08:00:00',
                'jamTutup' => '16:00:00',
                'saldoAwal' => 500000,
                'saldoAkhir' => 450000,
            ],
            [
                'idshift' => 2,
                'jamBuka' => '09:00:00',
                'jamTutup' => '17:00:00',
                'saldoAwal' => 300000,
                'saldoAkhir' => 250000,
            ],
        ]);

        // Data untuk tabel transaksi
        DB::table('transaksi')->insert([
            [
                'idPelanggan' => 1,
                'idStaff' => 1,
                'namaTransaksi' => 'Pembelian Barang A',
                'tglTransaksi' => now(),
                'totalTransaksi' => 500000,
                'tipeTransaksi' => 'beli',
            ],
            [
                'idPelanggan' => 2,
                'idStaff' => 2,
                'namaTransaksi' => 'Pembelian Barang B',
                'tglTransaksi' => now(),
                'totalTransaksi' => 1000000,
                'tipeTransaksi' => 'beli',
            ],
        ]);

        // Data untuk tabel pembelian
        DB::table('pembelian')->insert([
            [
                'idtransaksi' => 1,
                'idbarang' => 1,
                'idsupplier' => 1,
                'quantity' => 10,
                'tglPembelian' => now(),
            ],
            [
                'idtransaksi' => 2,
                'idbarang' => 2,
                'idsupplier' => 2,
                'quantity' => 5,
                'tglPembelian' => now(),
            ],
        ]);

        // Data untuk tabel penukaran
        DB::table('penukaran')->insert([
            [
                'idtransaksi' => 1,
                'idpelanggan' => 1,
                'idshop' => 1,
                'pointUsed' => 50,
                'tglRedeem' => now(),
            ],
            [
                'idtransaksi' => 2,
                'idpelanggan' => 2,
                'idshop' => 2,
                'pointUsed' => 100,
                'tglRedeem' => now(),
            ],
        ]);

        // Data untuk tabel penjualan
        DB::table('penjualan')->insert([
            [
                'idtransaksi' => 1,
                'idbarang' => 1,
                'quantity' => 5,
                'tglPenjualan' => now(),
            ],
            [
                'idtransaksi' => 2,
                'idbarang' => 2,
                'quantity' => 3,
                'tglPenjualan' => now(),
            ],
        ]);
    }
}
