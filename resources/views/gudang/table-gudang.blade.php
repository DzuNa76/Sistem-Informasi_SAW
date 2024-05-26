<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tabel Gudang</h4>
            <p class="card-description">
                Tabel Gudang
            </p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Gudang</th>
                            <th scope="col">Lokasi Gudang</th>
                            <th scope="col">Kapasitas Gudang</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gudang as $g)
                        <tr>
                            <td>{{ $g->nama_gudang }}</td>
                            <td>{{ $g->lokasi_gudang }}</td>
                            <td>{{ $g->kapasitas_gudang }}</td>
                            <td>
                                <form action="{{ route('gudang.destroy',$g->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <span data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                        <a href="{{ route('gudang.edit', $g->id) }}" class="btn btn-warning"><span
                                                class="fa fa-edit">Edit</span>
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