<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use PDF;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua data barang dari database
        $barang = Barang::all();
        
        // Data yang akan dikirim ke tampilan
        $data = [
            'title' => 'DATA BARANG',
            'date' => date('d/m/Y'),
            'barang' => $barang,
        ];

        // Jika permintaan download PDF ditemukan, buat dan unduh file PDF
        if ($request->has('download')) {
            $pdf = PDF::loadView('barang.pdf', $data);
            return $pdf->download('barang.pdf');
        }

        // Render tampilan daftar barang
        return view('barang.barang', compact('barang'));
    }

    public function create()
    {
        // Tampilkan tampilan form untuk menambahkan barang baru
        return view('barang.tambah');
    }

    public function store(Request $request)
    {
        // Validasi form untuk memastikan field yang diperlukan diisi
        $request->validate([
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required',
        ]);

        // Tambahkan data barang baru ke database
        Barang::create($request->all());

        // Redirect ke halaman daftar barang dengan pesan sukses
        return redirect('/barang')->with('success', 'Barang Baru Telah Ditambahkan');
    }

    public function edit(Barang $barang)
    {
        // Tampilkan tampilan form untuk mengedit barang yang dipilih
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, string $id)
    {
        // Validasi form untuk memastikan field yang diperlukan diisi
        $this->validate($request, [
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required',
        ]);

        // Temukan barang yang akan diubah berdasarkan ID
        $barang = Barang::findOrFail($id);

        // Update data barang
        $barang->update($request->all());

        // Redirect ke halaman daftar barang dengan pesan sukses
        return redirect('/barang')->with('success', 'Barang Telah Diubah');
    }

    public function destroy(Barang $barang)
    {
        // Jika tidak ada testimoni terkait, hapus barang dari database
        $barang->delete();
        
        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Barang berhasil dihapus.');
    }
}
