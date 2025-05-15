<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'id_user',
        'id_detail_peminjaman',
        'status',
        'soft_delete',
    ];

    public function detail()
    {
        return $this->belongsTo(DetailPeminjaman::class, 'id_detail_peminjaman');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function detailPeminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class, 'id_detail_peminjaman', 'id_detail_peminjaman');
    }
}
