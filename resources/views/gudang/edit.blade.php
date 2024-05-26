@extends('layouts.master')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="/gudang" class="btn btn-primary">Kembali</a>
                <br>
                <br>
                <form method="post" action="{{ route('gudang.update', $gudang->id) }}" class="forms-sample">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Nama Gudang</label>
                        <input type="text" name="nama_gudang" class="form-control" placeholder="Nama Gudang"
                            value="{{ $gudang->nama_gudang }}">
                        @error('nama_gudang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Lokasi Gudang</label>
                        <input type="text" name="lokasi_gudang" class="form-control" placeholder="Lokasi Gudang"
                            value="{{ $gudang->lokasi_gudang }}">
                        @error('lokasi_gudang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kapasitas Gudang</label>
                        <input type="number" name="kapasitas_gudang" class="form-control" placeholder="Kapasitas Gudang"
                            value="{{ $gudang->kapasitas_gudang }}">
                        @error('kapasitas_gudang')
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
