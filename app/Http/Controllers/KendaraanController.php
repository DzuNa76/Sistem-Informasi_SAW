<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use PDF;

class KendaraanController extends Controller
{
    public function index(Request $request)
    {
        $kendaraan = Kendaraan::all();
        $data = [
            'title' => 'DATA KENDARAAN',
            'date' => date('d/m/Y'),
            'kendaraan' => $kendaraan,
        ];

        if ($request->has('download')) {
            $pdf = PDF::loadView('kendaraan.pdf', $data);
            return $pdf->download('kendaraan.pdf');
        }

        return view('kendaraan.kendaraan', compact('kendaraan'));
    }

    public function create()
    {
        return view('kendaraan.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kendaraan' => 'required',
            'jenis_kendaraan' => 'required',
            'kapasitas_muatan' => 'required',
        ]);

        Kendaraan::create($request->all());

        return redirect('/kendaraan')->with('success', 'Kendaraan Baru Telah Ditambahkan');
    }

    public function edit(Kendaraan $kendaraan)
    {
        return view('kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_kendaraan' => 'required',
            'jenis_kendaraan' => 'required',
            'kapasitas_muatan' => 'required',
        ]);

        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->update($request->all());
        return redirect('/kendaraan')->with('success', 'Kendaraan Telah Diubah');
    }

    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();

        return redirect()
            ->back()
            ->with('success', 'Kendaraan Telah Dihapus');
    }
}
