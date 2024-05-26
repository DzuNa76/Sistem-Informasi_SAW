<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gudang; 
use PDF;

class GudangController extends Controller
{
    public function index(Request $request)
    {
        $gudang = Gudang::all();
        $data = [
            'title' => 'DATA GUDANG',
            'date' => date('d/m/Y'),
            'gudang' => $gudang,
        ];

        if ($request->has('download')) {
            $pdf = PDF::loadView('gudang.pdf', $data);
            return $pdf->download('gudang.pdf');
        }

        return view('gudang.gudang', compact('gudang'));
    }

    public function create()
    {
        return view('gudang.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gudang' => 'required',
            'lokasi_gudang' => 'required',
            'kapasitas_gudang' => 'required|integer',
        ]);

        Gudang::create($request->all());

        return redirect('/gudang')->with('success', 'Gudang Baru Telah Ditambahkan');
    }

    public function edit(Gudang $gudang)
    {
        return view('gudang.edit', compact('gudang'));
    }

    public function update(Request $request, Gudang $gudang)
    {
        $request->validate([
            'nama_gudang' => 'required',
            'lokasi_gudang' => 'required',
            'kapasitas_gudang' => 'required|integer',
        ]);

        $gudang->update($request->all());

        return redirect('/gudang')->with('success', 'Gudang Telah Diubah');
    }

    public function destroy(Gudang $gudang)
    {
        $gudang->delete();

        return redirect()
            ->back()
            ->with('success', 'Gudang Telah Dihapus');
    }
}
