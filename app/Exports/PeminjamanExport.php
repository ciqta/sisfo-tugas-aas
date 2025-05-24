<?php

namespace App\Exports;

use App\Models\DetailPeminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeminjamanExport implements FromCollection, WithHeadings
{
    protected $tanggalAwal;
    protected $tanggalAkhir;

    public function __construct($tanggalAwal, $tanggalAkhir)
    {
        $this->tanggalAwal = $tanggalAwal;
        $this->tanggalAkhir = $tanggalAkhir;
    }

    public function collection()
    {
        $query = DetailPeminjaman::with(['barang', 'peminjaman']);

        if ($this->tanggalAwal && $this->tanggalAkhir) {
            $query->whereBetween('tanggal_pinjam', [$this->tanggalAwal, $this->tanggalAkhir]);
        }

        return $query->get()->map(function ($detail) {
            return [
                'ID Peminjaman' => $detail->peminjaman->id_peminjaman,
                'Kode Barang' => $detail->barang->kode_barang,
                'Nama Barang' => $detail->barang->nama_barang,
                'Jumlah' => $detail->jumlah,
                'Tanggal Pinjam' => $detail->tanggal_pinjam,
                'Tanggal Kembali' => $detail->tanggal_kembali,
                'Keperluan' => $detail->keperluan,
                'Kelas' => $detail->class,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID Peminjaman',
            'Kode Barang',
            'Nama Barang',
            'Jumlah',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Keperluan',
            'Kelas',
        ];
    }
}