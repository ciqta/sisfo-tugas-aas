<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DetailPengembalian;

class DetailPengembalianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DetailPengembalian::create([
                'id_user' => 1,
                'id_detail_peminjaman' => 1,
                'id_peminjaman' => 1,
                'id_barang' => 1,
                'jumlah' => 2,
                'kondisi' => 'Baik',
                'status' => 'pending',
                'soft_delete' => 0,
                'tanggal_pengembalian' => now(),
                'keterangan' => 'Pengembalian tepat waktu',
                'item_image' => null,
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        DetailPengembalian::create([
                'id_user' => 2,
                'id_detail_peminjaman' => 2,
                'id_peminjaman' => 2,
                'id_barang' => 2,
                'jumlah' => 1,
                'kondisi' => 'Baik',
                'status' => 'pending',
                'soft_delete' => 0,
                'tanggal_pengembalian' => now(),
                'keterangan' => 'Pengembalian tepat waktu',
                'item_image' => null,
                'created_at' => now(),
                'updated_at' => now(),
        ]);
    }
}
