<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{

     public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'detail.barang'])->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function show($id)
    {
    $peminjaman = Peminjaman::with(['user', 'detail.barang'])->findOrFail($id);
    return view('peminjaman.show', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:users,id_user',
            'id_detail_peminjaman' => 'required|exists:detail_peminjaman,id_detail_peminjaman',
        ]);

        $peminjaman = Peminjaman::create([
            'id_user' => $validated['users_id'],
            'id_detail_peminjaman' => $validated['id_detail_peminjaman'],
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Peminjaman berhasil diajukan',
            'data' => $peminjaman
        ], 201);
    }

    public function approve($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = 'approved';
        $peminjaman->save();

        return redirect()->back()->with('success', 'Peminjaman berhasil disetujui!');

    }

    public function reject($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = 'not approved';
        $peminjaman->save();

        return redirect()->back()->with('error', 'Peminjaman ditolak!');
    }

   
}
