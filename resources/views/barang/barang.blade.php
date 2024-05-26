@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Barang</h4> <!-- Judul untuk bagian kartu (card) -->
            <p class="card-description">Data Barang</p> <!-- Deskripsi singkat untuk bagian kartu (card) -->

            <!-- Tombol untuk menambahkan barang baru -->
            <a class="btn btn-success btn-rounded btn-fw" href="{{route('barang.create')}}">Tambah Barang</a>

            <!-- Tombol untuk mencetak daftar barang sebagai PDF -->
            <a class="btn btn-primary btn-icon-text btn-rounded" href="{{route('barang.index',['download'=>'pdf'])}}">
                Print<i class="ti-printer btn-icon-append"></i> <!-- Ikon printer yang ditambahkan di sebelah kanan teks tombol -->
            </a>
        </div>
    </div>
</div>

<!-- Menyertakan view 'barang.table-barang' yang berisi tabel data barang -->
@include('barang.table-barang')
@endsection
