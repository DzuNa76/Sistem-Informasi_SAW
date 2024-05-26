<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tabel Data Barang</h4> <!-- Judul untuk tabel data barang -->
            <p class="card-description">
                Tabel Data Barang <!-- Deskripsi singkat untuk tabel data barang -->
            </p>
            <div class="table-responsive">
                <!-- Tabel dengan kelas Bootstrap untuk membuat tabel yang responsif -->
                <table class="table">
                    <thead>
                        <!-- Bagian kepala tabel yang mendefinisikan header kolom -->
                        <tr>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Jumlah Barang</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop melalui setiap item barang dan buat baris tabel untuk masing-masing -->
                        @foreach($barang as $b)
                        <tr>
                            <td>{{ $b->nama_barang }}</td> <!-- Menampilkan nama barang -->
                            <td>{{ $b->deskripsi }}</td> <!-- Menampilkan deskripsi barang -->
                            <td>{{ $b->jumlah }}</td> <!-- Menampilkan jumlah barang -->
                            <td>
                                <!-- Form untuk menghapus barang -->
                                <form action="{{ route('barang.destroy', $b->id) }}" method="POST">
                                    @csrf <!-- Token CSRF untuk melindungi dari serangan CSRF -->
                                    @method('DELETE') <!-- Metode DELETE untuk menghapus barang -->

                                    <!-- Tombol Edit dengan tooltip -->
                                    <span data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                        <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning">
                                            <span class="fa fa-edit">Edit</span> <!-- Ikon dan teks tombol Edit -->
                                        </a>
                                    </span>

                                    <!-- Tombol Hapus dengan tooltip -->
                                    <span data-toggle="tooltip" data-placement="bottom" title="Delete Data">
                                        <button type="submit" class="btn btn-danger">
                                            <span class="fa fa-trash-alt">Hapus</span> <!-- Ikon dan teks tombol Hapus -->
                                        </button>
                                    </span>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- table-responsive -->
        </div> <!-- card-body -->
    </div> <!-- card -->
</div> <!-- col-lg-12 grid-margin stretch-card -->
