<?php

namespace App\Exports;

use App\Models\DetailPengembalian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengembalianExport implements FromCollection, WithHeadings
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
        $query = DetailPengembalian::with(['barang', 'peminjaman'])->where('soft_delete', 0);

        if ($this->tanggalAwal && $this->tanggalAkhir) {
            $query->whereBetween('tanggal_pengembalian', [$this->tanggalAwal, $this->tanggalAkhir]);
        }

        return $query->get()->map(function ($detail) {
            return [
                'ID Pengembalian' => $detail->id_detail_pengembalian,
                'ID Peminjaman' => $detail->id_peminjaman,
                'Kode Barang' => $detail->barang->kode_barang,
                'Nama Barang' => $detail->barang->nama_barang,
                'Jumlah' => $detail->jumlah,
                'Tanggal Pengembalian' => $detail->tanggal_pengembalian,
                'Kondisi' => $detail->kondisi,
                'Keterangan' => $detail->keterangan,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID Pengembalian',
            'ID Peminjaman',
            'Kode Barang',
            'Nama Barang',
            'Jumlah',
            'Tanggal Pengembalian',
            'Kondisi',
            'Keterangan',
        ];
    }
}