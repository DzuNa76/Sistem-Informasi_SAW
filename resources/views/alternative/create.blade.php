@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <a href="{{ route('alternatives.index') }}" class="btn btn-primary">Kembali</a>
            <br />
            <br />

            <form action="{{ route('alternatives.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="id_barang">Nama Barang :</label>
                    <select class="form-control" id="id_barang" name="id_barang">
                        @foreach ($barang as $br)
                            <option value="{{ $br->id }}">{{ $br->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                @foreach ($criteriaweights as $cw)
                <div class="form-group">
                    <label for="criteria_{{$cw->id}}">{{$cw->name}} :</label>
                    <select class="form-control" id="criteria_{{$cw->id}}" name="criteria[{{$cw->id}}]">
                        @foreach ($criteriaratings as $cr)
                            @if ($cr->criteria_id == $cw->id)
                                <option value="{{$cr->id}}">{{$cr->description}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                @endforeach
                            
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection