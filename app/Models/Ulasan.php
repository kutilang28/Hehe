<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $table = 'ulasan';
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'buku_id',
        'ulasan',
        'rating',
    ];
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function buku() {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
