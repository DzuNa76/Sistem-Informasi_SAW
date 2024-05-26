<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    // Nama tabel gudang
    protected $table = 'toko';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['nama_toko', 'lokasi'];

    // Jika Anda ingin menggunakan timestamp (created_at dan updated_at)
    public $timestamps = true;
}