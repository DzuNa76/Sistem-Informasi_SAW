@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <a href="/kendaraan" class="btn btn-primary">Kembali</a>
            <br />
            <br />
            <form method="post" action="{{ route('kendaraan.update', $kendaraan->id) }}" class="forms-sample">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Kendaraan</label>
                    <input type="text" name="nama_kendaraan" class="form-control" placeholder="Nama Kendaraan"
                        value="{{ $kendaraan->nama_kendaraan }}">

                    @error('nama_kendaraan')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Jenis Kendaraan</label>
                    <input type="text" name="jenis_kendaraan" class="form-control" placeholder="Jenis Kendaraan"
                        value="{{ $kendaraan->jenis_kendaraan }}">

                    @error('jenis_kendaraan')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Kapasitas Muatan</label>
                    <input type="text" name="kapasitas_muatan" class="form-control" placeholder="Kapasitas Muatan"
                        value="{{ $kendaraan->kapasitas_muatan }}">

                    @error('kapasitas_muatan')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
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
