<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KategoriBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_barang')->insert([
                'nama_kategori' => 'Elektronik',
                'deskripsi' => 'Barang elektronik seperti laptop, smartphone, dll.',
        ]);

        DB::table('kategori_barang')->insert([
                'nama_kategori' => 'Peralatan',
                'deskripsi' => 'Peralatan seperti alat tulis, alat olahraga, dll.',
        ]);
}
}