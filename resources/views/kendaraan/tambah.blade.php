@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <a href="/kendaraan" class="btn btn-primary">Kembali</a>
            <br />
            <br />

            <form method="POST" action="{{ route('kendaraan.store') }}" class="forms-sample">

                @csrf

                <div class="form-group">
                    <label>Nama Kendaraan</label>
                    <input type="text" name="nama_kendaraan" class="form-control" placeholder="Nama Kendaraan">

                    @error('nama_kendaraan')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="form-group">
                    <label>Jenis Kendaraan</label>
                    <input type="text" name="jenis_kendaraan" class="form-control" placeholder="Jenis Kendaraan">

                    @error('jenis_kendaraan')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="form-group">
                    <label>Kapasitas Muatan</label>
                    <input type="text" name="kapasitas_muatan" class="form-control" placeholder="Kapasitas Muatan">

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
