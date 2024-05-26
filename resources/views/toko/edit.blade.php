@extends('layouts.master')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="/toko" class="btn btn-primary">Kembali</a>
                <br>
                <br>
                <form method="post" action="{{ route('toko.update', $toko->id) }}" class="forms-sample">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Nama Toko</label>
                        <input type="text" name="nama_toko" class="form-control" placeholder="Nama Toko"
                            value="{{ $toko->nama_toko }}">
                        @error('nama_toko')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Lokasi Toko</label>
                        <input type="text" name="lokasi" class="form-control" placeholder="Lokasi Toko"
                            value="{{ $toko->lokasi }}">
                        @error('lokasi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
