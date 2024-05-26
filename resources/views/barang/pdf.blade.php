<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print_Barang</title>
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
    <!-- Menampilkan judul halaman -->
    <h1>{{ $title }}</h1> <!-- Menampilkan judul yang dikirim dari controller -->

    <!-- Menampilkan tanggal -->
    <p>Tanggal: {{ $date }}</p> <!-- Menampilkan tanggal yang dikirim dari controller -->

    <div class="table-responsive">
        <!-- Membuat tabel yang responsif menggunakan kelas Bootstrap -->
        <table class="table">
            <thead>
                <!-- Bagian kepala tabel yang mendefinisikan header kolom -->
                <tr>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop melalui setiap item barang dan buat baris tabel untuk masing-masing -->
                @foreach ($barang as $b)
                    <tr>
                        <!-- Menampilkan nama barang -->
                        <td>{{ $b->nama_barang }}</td>

                        <!-- Menampilkan deskripsi barang -->
                        <td>{{ $b->deskripsi }}</td>

                        <!-- Menampilkan jumlah barang -->
                        <td>{{ $b->jumlah }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- .table-responsive -->
</body>


</html>
