@extends('layouts.master')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Toko</h4>
                <p class="card-description">
                    Data Toko
                </p>
                <a class="btn btn-success btn-rounded btn-fw" href="{{ route('toko.create') }}">
                    Tambah Toko</a>
                    <a class="btn btn-primary btn-icon-text btn-rounded" href="{{route('toko.index',['download'=>'pdf'])}}">Print<i
                        class="ti-printer btn-icon-append"></i></a>
            </div>
        </div>
    </div>
    @include('toko.table-toko')
@endsection
