<?php

namespace App\Http\Controllers;

use App\Models\DetailPeminjaman;
use Illuminate\Http\Request;

class DetailPeminjamanController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang' => 'required|exists:barang,id_barang',
            'jumlah' => 'required|integer',
            'keperluan' => 'required|string',
            'class' => 'required|string',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        $detail = DetailPeminjaman::create($validated);

        return response()->json([
            'message' => 'Detail peminjaman berhasil dibuat',
            'data' => $detail
        ], 201);
    }
}
