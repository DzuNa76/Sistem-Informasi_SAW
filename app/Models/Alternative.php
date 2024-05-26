<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $table = 'alternatives';
    protected $fillable = ['id_barang']; 

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang'); 
    }
}