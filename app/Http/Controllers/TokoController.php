<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko; 
use PDF;

class TokoController extends Controller
{
    public function index(Request $request)
    {
        $toko = Toko::all();
        $data = [
            'title' => 'DATA TOKO',
            'date' => date('d/m/Y'),
            'toko' => $toko,
        ];

        if ($request->has('download')) {
            $pdf = PDF::loadView('toko.pdf', $data);
            return $pdf->download('toko.pdf');
        }

        return view('toko.toko', compact('toko'));
    }

    public function create()
    {
        return view('toko.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required',
            'lokasi' => 'required',
        ]);

        Toko::create($request->all());

        return redirect('/toko')->with('success', 'Toko Baru Telah Ditambahkan');
    }

    public function edit(Toko $toko)
    {
        return view('toko.edit', compact('toko'));
    }

    public function update(Request $request, Toko $toko)
    {
        $request->validate([
            'nama_toko' => 'required',
            'lokasi' => 'required',
        ]);

        $toko->update($request->all());

        return redirect('/toko')->with('success', 'Toko Telah Diubah');
    }

    public function destroy(Toko $toko)
    {
        $toko->delete();

        return redirect()
            ->back()
            ->with('success', 'Toko Telah Dihapus');
    }
}
