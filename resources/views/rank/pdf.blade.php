<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print_Normalisasi</title>
    <style>
        @page {
            margin: 2cm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        thead th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #e9e9e9;
        }
    </style>
</head>
<body>
    <!-- Judul Halaman -->
    <h1>{{ $title }}</h1>
    <!-- Tanggal -->
    <p>Tanggal: {{ $date }}</p>

    <!-- Tabel Peringkat Barang -->
    <div class="table-responsive">
        <table id="mytable" class="display nowrap table table-striped table-bordered">
            <thead>
                <tr>
                    <!-- Kolom Barang -->
                    <th>Barang</th>
                    <!-- Header Kriteria -->
                    @foreach ($criteriaweights as $c)
                        <th>{{ $c->name }}</th>
                    @endforeach
                    <!-- Kolom Total -->
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop untuk setiap Alternatif -->
                @foreach ($alternatives as $a)
                    <tr>
                        <!-- Nama Barang -->
                        <td>
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
                        <!-- Loop untuk setiap Skor Kriteria -->
                        @foreach ($scr as $s)
                            @php
                                $total += $s->rating;
                            @endphp
                            <!-- Skor Kriteria -->
                            <td>{{ $s->rating }}</td>
                        @endforeach
                        <!-- Total Skor -->
                        <td>{{ $total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>