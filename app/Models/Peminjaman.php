<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_peminjaman';
    protected $fillable = [
        'tanggal_pinjam', 'tanggal_kembali', 'status_peminjaman', 'id_anggota'
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }

    public function detail_pinjam()
    {
        return $this->hasMany(DetailPinjam::class, 'id_peminjaman');
    }    
}
