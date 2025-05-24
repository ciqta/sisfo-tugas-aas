<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\DetailPeminjaman;
use App\Models\DetailPengembalian;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\BarangExport;
use App\Exports\PeminjamanExport;
use App\Exports\PengembalianExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    // 🔹 Tampilkan form filter laporan
    public function index()
    {
        return view('laporan.index');
    }

    // 🔹 Laporan Stok Barang
    public function laporanBarang()
    {
        $data = Barang::with('kategori')->get();
        return view('laporan.pdf.barang', compact('data'));
    }

    // 🔹 Laporan Peminjaman
    public function laporanPeminjaman(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $query = DetailPeminjaman::with(['barang', 'peminjaman']);

        if ($tanggalAwal && $tanggalAkhir) {
            $query->whereBetween('tanggal_pinjam', [$tanggalAwal, $tanggalAkhir]);
        }

        $data = $query->get();

        return view('laporan.pdf.peminjaman', compact('data', 'tanggalAwal', 'tanggalAkhir'));
    }

    // 🔹 Laporan Pengembalian
    public function laporanPengembalian(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $query = DetailPengembalian::with(['barang', 'peminjaman'])->where('soft_delete', 0);

        if ($tanggalAwal && $tanggalAkhir) {
            $query->whereBetween('tanggal_pengembalian', [$tanggalAwal, $tanggalAkhir]);
        }

        $data = $query->get();

        return view('laporan.pdf.pengembalian', compact('data', 'tanggalAwal', 'tanggalAkhir'));
    }

    // 🔹 Export PDF - Stok Barang
    public function exportBarangPdf()
    {
        $data = Barang::with('kategori')->get();
        $pdf = Pdf::loadView('laporan.pdf.barang', compact('data'));

        return $pdf->download('laporan_stok_barang.pdf');
    }

    // 🔹 Export PDF - Peminjaman
    public function exportPeminjamanPdf(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $query = DetailPeminjaman::with(['barang', 'peminjaman']);

        if ($tanggalAwal && $tanggalAkhir) {
            $query->whereBetween('tanggal_pinjam', [$tanggalAwal, $tanggalAkhir]);
        }

        $data = $query->get();
        $pdf = Pdf::loadView('laporan.pdf.peminjaman', compact('data', 'tanggalAwal', 'tanggalAkhir'));

        return $pdf->download('laporan_peminjaman_' . now()->format('Y-m-d') . '.pdf');
    }

    // 🔹 Export PDF - Pengembalian
    public function exportPengembalianPdf(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $query = DetailPengembalian::with(['barang', 'peminjaman'])->where('soft_delete', 0);

        if ($tanggalAwal && $tanggalAkhir) {
            $query->whereBetween('tanggal_pengembalian', [$tanggalAwal, $tanggalAkhir]);
        }

        $data = $query->get();
        $pdf = Pdf::loadView('laporan.pdf.pengembalian', compact('data', 'tanggalAwal', 'tanggalAkhir'));

        return $pdf->download('laporan_pengembalian_' . now()->format('Y-m-d') . '.pdf');
    }

    // 🔹 Export Excel - Stok Barang
    public function exportBarangExcel()
    {
        return Excel::download(new BarangExport, 'laporan_stok_barang.xlsx');
    }

    // 🔹 Export Excel - Peminjaman
    public function exportPeminjamanExcel(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        return Excel::download(new PeminjamanExport($tanggalAwal, $tanggalAkhir), 'laporan_peminjaman_' . now()->format('Y-m-d') . '.xlsx');
    }

    // 🔹 Export Excel - Pengembalian
    public function exportPengembalianExcel(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        return Excel::download(new PengembalianExport($tanggalAwal, $tanggalAkhir), 'laporan_pengembalian_' . now()->format('Y-m-d') . '.xlsx');
    }
}