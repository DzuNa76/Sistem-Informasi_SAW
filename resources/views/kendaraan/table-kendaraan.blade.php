<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tabel Data Kendaraan</h4>
            <p class="card-description">
                Tabel Data kendaraan
            </p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Kendaraan</th>
                            <th scope="col">Jenis Kendaraan</th>
                            <th scope="col">Kapasitas Muatan</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kendaraan as $k)
                        <tr>
                            <td>{{ $k->nama_kendaraan }}</td>
                            <td>{{ $k->jenis_kendaraan }}</td>
                            <td>{{ $k->kapasitas_muatan }}</td>
                            <td>
                                <form action="{{ route('kendaraan.destroy', $k->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <span data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                        <a href="{{ route('kendaraan.edit', $k->id) }}" class="btn btn-warning">
                                            <span class="fa fa-edit">Edit</span>
                                        </a>
                                    </span>
                                    <span data-toggle="tooltip" data-placement="bottom" title="Delete Data">
                                        <button type="submit" class="btn btn-danger">
                                            <span class="fa fa-trash-alt">Hapus</span>
                                        </button>
                                    </span>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
