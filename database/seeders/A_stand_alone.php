<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class A_stand_alone extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Mengisi data untuk tabel pelanggan
        DB::table('pelanggan')->insert([
            [
                'namaPelanggan' => $faker->name(),
                'noTlp' => '087654320',
                'email' => $faker->unique()->email(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan beberapa data dummy lainnya
            [
                'namaPelanggan' => $faker->name(),
                'noTlp' => '087654321',
                'email' => $faker->unique()->email(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Mengisi data untuk tabel supplier
        DB::table('supplier')->insert([
            [
                'namaSupplier' => $faker->company(),
                'noTlp' => '087654300',
                'email' => $faker->unique()->companyEmail(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan beberapa data dummy lainnya
            [
                'namaSupplier' => $faker->company(),
                'noTlp' => '087654301',
                'email' => $faker->unique()->companyEmail(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Mengisi data untuk tabel staff
        DB::table('staff')->insert([
            [
                'namaStaff' => $faker->name(),
                'sebagai' => 'Manager',
                'email' => $faker->unique()->email(),
                'noTlp' => '087654001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaStaff' => $faker->name(),
                'sebagai' => 'Staff',
                'email' => $faker->unique()->email(),
                'noTlp' => '087654002',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Mengisi data untuk tabel merk
        DB::table('merk')->insert([
            [
                'namaMerk' => $faker->word(),
            ],
            [
                'namaMerk' => $faker->word(),
            ],
        ]);

        // Mengisi data untuk tabel kategori
        DB::table('kategori')->insert([
            [
                'namaKategori' => $faker->word(),
            ],
            [
                'namaKategori' => $faker->word(),
            ],
        ]);
    }
}
