<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'detail_peminjaman';
    protected $primaryKey = 'id_detail_peminjaman';

    protected $fillable = [
        'id_barang',
        'jumlah',
        'keperluan',
        'class',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    public function peminjaman()
    {
        return $this->hasOne(Peminjaman::class, 'id_detail_peminjaman');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function detail()
{
    return $this->hasMany(DetailPengembalian::class, 'id_detail_peminjaman', 'id_detail_peminjaman');
}
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
