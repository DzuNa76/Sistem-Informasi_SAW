<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;

    // Nama tabel gudang
    protected $table = 'gudang';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['nama_gudang', 'lokasi_gudang', 'kapasitas_gudang'];

    // Jika Anda ingin menggunakan timestamp (created_at dan updated_at)
    public $timestamps = true;
}
