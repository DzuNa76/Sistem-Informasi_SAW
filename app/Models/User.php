<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Properti $fillable menentukan atribut apa saja yang dapat diisi secara massal
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Properti $hidden menentukan atribut apa saja yang harus disembunyikan saat model diubah menjadi array atau JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
