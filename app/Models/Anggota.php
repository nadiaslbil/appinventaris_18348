<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_anggota';
    protected $fillable = [
        'nama_anggota', 'no_anggota', 'alamat'
    ];

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'id_anggota');
    }
}
