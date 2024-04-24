<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'bukus';
    protected $primaryKey = "id";
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'foto',
        'tahun_terbit',
        'kategori_id',
    ];
    public function peminjaman() {
        return $this->hasMany(Peminjaman::class);
    }

    public function koleksi() {
        return $this->hasMany(Koleksi::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function ulasan() {
        return $this->hasMany(Ulasan::class);
    }

}
