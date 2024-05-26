<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Kelas model untuk tabel 'barang'
class Barang extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan oleh model ini
    protected $table = 'barang';

    // Menentukan atribut yang dapat diisi secara massal
    // Ini melindungi terhadap Mass Assignment Vulnerability
    protected $fillable = [
        'nama_barang', // Nama barang
        'deskripsi',   // Deskripsi barang
        'jumlah',      // Jumlah barang
    ];
}