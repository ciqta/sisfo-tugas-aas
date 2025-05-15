<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Usersedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => Str::random(2) . '@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'class' => 'XI',
            'major' => 'RPL'
        ]);
        DB::table('users')->insert([
            'username' => 'user',
            'email' => Str::random(2) . '@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'class' => 'X',
            'major' => 'RPL'
]);
}
}