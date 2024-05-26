@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Kendaraan</h4>
            <p class="card-description">Data Kendaraan</p>
            <a class="btn btn-success btn-rounded btn-fw" href="{{route('kendaraan.create')}}">Tambah Kendaraan</a>
            <a class="btn btn-primary btn-icon-text btn-rounded" href="{{route('kendaraan.index',['download'=>'pdf'])}}">Print<i
                class="ti-printer btn-icon-append"></i></a>
        </div>

    </div>
</div>
@include('kendaraan.table-kendaraan')
@endsection