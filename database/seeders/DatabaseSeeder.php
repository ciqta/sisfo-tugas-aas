<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSedeer::class,
            KategoriBarangSeeder::class,
            BarangSeeder::class,     
            DetailPeminjamanSeeder::class,      
            PeminjamanSeeder::class,
            DetailPengembalianSeeder::class,
]);
}
}