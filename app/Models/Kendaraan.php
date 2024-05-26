<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    // memanggil nama tabel
    protected $table = 'kendaraan';

    // memanggil isi kolom
    protected $fillable = ['nama_kendaraan','jenis_kendaraan','kapasitas_muatan'];

}