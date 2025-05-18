<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('peminjaman')->insert([
            [
                'id_user' => 1, 
                'id_detail_peminjaman' => 1,
                'status' => 'pending',
                'soft_delete' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_user' => 2,
                'id_detail_peminjaman' => 2,
                'status' => 'pending',
                'soft_delete' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
