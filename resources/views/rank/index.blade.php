@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- Judul Halaman -->
                        <h1 class="m-0">Rank Barang</h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Tombol Print -->
                                <a class="btn btn-primary btn-icon-text btn-rounded" href="{{ route('rank.index', ['download' => 'pdf']) }}">Print<i class="ti-printer btn-icon-append"></i></a>
                            </div>
                            <div class="card-body">
                                <!-- Tabel Peringkat Barang -->
                                <table id="mytable" class="display nowrap table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Alternative</th>
                                            <!-- Header Kriteria -->
                                            @foreach ($criteriaweights as $c)
                                                <th>{{ $c->name }}</th>
                                            @endforeach
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data Alternatif -->
                                        @foreach ($alternatives as $a)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>
                                                    <!-- Nama Alternatif -->
                                                    @if ($a->barang)
                                                        {{ $a->barang->nama_barang }}
                                                    @else
                                                        Barang not found
                                                    @endif
                                                </td>
                                                @php
                                                    $scr = $scores->where('ida', $a->id)->all();
                                                    $total = 0;
                                                @endphp
                                                <!-- Skor Kriteria -->
                                                @foreach ($scr as $s)
                                                    @php
                                                        $total += $s->rating;
                                                    @endphp
                                                    <td>{{ $s->rating }}</td>
                                                @endforeach
                                                <!-- Total Skor -->
                                                <td>{{ $total }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Script DataTable -->
    <script>
        $(function() {
            // Tooltip
            $('[data-toggle="tooltip"]').tooltip()

            // DataTable
            $('#mytable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection