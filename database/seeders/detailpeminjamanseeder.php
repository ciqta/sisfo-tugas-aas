<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DetailPeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('detail_peminjaman')->insert([
            [
                'id_user' => 1, // Pastikan user dengan id 1 ada
                'id_barang' => 1, // Pastikan barang dengan id 1 ada
                'jumlah' => 2,
                'keperluan' => 'Praktikum Fisika',
                'class' => 'XII ANIMASI 1',
                'tanggal_pinjam' => Carbon::now(),
                'tanggal_kembali' => Carbon::now()->addDays(3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 2, // Pastikan user dengan id 2 ada
                'id_barang' => 2,
                'jumlah' => 1,
                'keperluan' => 'Presentasi Kelas',
                'class' => 'XI RPL 3',
                'tanggal_pinjam' => Carbon::now(),
                'tanggal_kembali' => Carbon::now()->addDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
