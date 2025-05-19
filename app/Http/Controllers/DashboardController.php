<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\DetailPengembalian;
use carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Summary Data: Total barang, total kategori, total peminjaman, total pengembalian
        $totalAset = Barang::sum('stock');
        $totalPeminjaman = Peminjaman::where('status', 'approved')->count();
        $totalPengembalian = DetailPengembalian::where('status', 'approve')->count();
        $totalUser = User::count();

        $summaryData = [
            ['title' => 'Total Aset', 'value' => number_format($totalAset), 'color' => 'bg-blue-500', 'icon' => 'package'],
            ['title' => 'Total Peminjaman', 'value' => number_format($totalPeminjaman), 'color' => 'bg-green-500', 'icon' => 'file-text'],
            ['title' => 'Total Pengembalian', 'value' => number_format($totalPengembalian), 'color' => 'bg-yellow-500', 'icon' => 'package'],
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