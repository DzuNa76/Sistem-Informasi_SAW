@extends('layouts.master') <!-- Menggunakan layout utama 'master' -->

@section('content') <!-- Menentukan bagian konten untuk diisi -->
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <!-- Tombol untuk kembali ke halaman daftar barang -->
            <a href="/barang" class="btn btn-primary">Kembali</a>
            <br />
            <br />
            
            <!-- Form untuk mengedit data barang -->
            <form method="post" action="{{route('barang.update', $barang->id)}}" class="forms-sample">
                {{ csrf_field() }} <!-- Token CSRF untuk melindungi dari serangan CSRF -->
                {{ method_field('PUT') }} <!-- Menggunakan metode HTTP PUT untuk memperbarui data -->

                <div class="form-group">
                    <!-- Input untuk nama barang -->
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="{{ $barang->nama_barang }}">
                    <!-- Menampilkan pesan error jika validasi gagal untuk nama barang -->
                    @if($errors->has('nama_barang'))
                    <div class="text-danger">
                        {{ $errors->first('nama_barang')}}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <!-- Textarea untuk deskripsi barang -->
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" placeholder="deskripsi Supplier">{{ $barang->deskripsi }}</textarea>
                    <!-- Menampilkan pesan error jika validasi gagal untuk deskripsi -->
                    @if($errors->has('deskripsi'))
                    <div class="text-danger">
                        {{ $errors->first('deskripsi')}}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <!-- Input untuk jumlah barang -->
                    <label>Jumlah Barang</label>
                    <input type="text" name="jumlah" class="form-control" placeholder="Jumlah Barang" value="{{ $barang->jumlah }}">
                    <!-- Menampilkan pesan error jika validasi gagal untuk jumlah -->
                    @if($errors->has('jumlah'))
                    <div class="text-danger">
                        {{ $errors->first('jumlah')}}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <!-- Tombol submit untuk menyimpan perubahan -->
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
            </form>
        </div> <!-- .card-body -->
    </div> <!-- .card -->
</div> <!-- .col-12 grid-margin stretch-card -->
@endsection <!-- Menutup section 'content' -->
