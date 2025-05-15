<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use App\Models\User;
use Illuminate\Http\Request;
use carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Summary Data: Total barang, total kategori, total peminjaman, total pengembalian
        $totalAset = Barang::sum('stock');
        $asetBaik = Barang::where('kondisi_barang', 'baik')->sum('stock');
        $asetRusak = Barang::where('kondisi_barang', 'rusak')->sum('stock');
        $totalKategori = KategoriBarang::count();
        $totalUser = User::count();

        $summaryData = [
            ['title' => 'Total Aset', 'value' => number_format($totalAset), 'color' => 'bg-blue-500', 'icon' => 'package'],
            ['title' => 'Aset Baik', 'value' => number_format($asetBaik), 'color' => 'bg-green-500', 'icon' => 'file-text'],
            ['title' => 'Aset Rusak', 'value' => number_format($asetRusak), 'color' => 'bg-yellow-500', 'icon' => 'package'],
            ['title' => 'Total Kategori', 'value' => number_format($totalKategori), 'color' => 'bg-teal-500', 'icon' => 'folder'],
            ['title' => 'Total User', 'value' => number_format($totalUser), 'color' => 'bg-pink-500', 'icon' => 'users'],
        ];

        // Data chart dummy (bisa diganti dengan query dinamis)
        $chartData = [
            ['name' => 'Jan', 'value' => 45],
            ['name' => 'Feb', 'value' => 63],
            ['name' => 'Mar', 'value' => 58],
            ['name' => 'Apr', 'value' => 75],
            ['name' => 'May', 'value' => 90],
        ];
        // Gabungkan semua data dan tampilkan pada halaman dashboard
        return view('dashboard', compact('summaryData', 'chartData'));
    }
}