<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative;
use App\Models\AlternativeScore;
use App\Models\CriteriaWeight;
use App\Models\CriteriaRating;
use App\Models\Barang; 
use PDF;

class AlternativeController extends Controller
{

    public function index(Request $request)
    {
        // Ambil skor alternatif beserta informasi terkait dari database
        $scores = AlternativeScore::select(
            'alternativescores.id as id',
            'alternatives.id as ida',
            'criteriaweights.id as idw',
            'criteriaratings.id as idr',
            'barang.id as id_barang', 
            'barang.nama_barang as nama_barang', 
            'criteriaweights.name as criteria',
            'criteriaratings.rating as rating',
            'criteriaratings.description as description'
        )
        ->leftJoin('alternatives', 'alternatives.id', '=', 'alternativescores.alternative_id')
        ->leftJoin('criteriaweights', 'criteriaweights.id', '=', 'alternativescores.criteria_id')
        ->leftJoin('criteriaratings', 'criteriaratings.id', '=', 'alternativescores.rating_id')
        ->leftJoin('barang', 'barang.id', '=', 'alternatives.id_barang') 
        ->get();

        // Ambil semua alternatif, bobot kriteria, dan barang dari database
        $alternatives = Alternative::get();
        $criteriaweights = CriteriaWeight::get();
        $barang = Barang::all();

        // Data yang akan dikirim ke tampilan
        $data = [
            'title' => 'DATA ALTERNATIVE',
            'date' => date('d/m/Y'),
            'scores' => $scores,
            'alternatives' => $alternatives,
            'criteriaweights' => $criteriaweights,
            'barang' => $barang,
        ];

        // Jika permintaan download PDF ditemukan, buat dan unduh file PDF
        if ($request->has('download')) {
            $pdf = PDF::loadView('alternative.pdf', $data);
            return $pdf->download('alternative.pdf');
        }
        
        // Render tampilan indeks alternatif dengan data yang diberikan
        return view('alternative.index', compact('scores', 'alternatives', 'criteriaweights', 'barang'))->with('i', 0);
    }

    public function create()
    {
        // Ambil semua barang, bobot kriteria, dan peringkat kriteria dari database
        $barang = Barang::all();
        $criteriaweights = CriteriaWeight::get();
        $criteriaratings = CriteriaRating::get();
        
        // Render tampilan form untuk membuat alternatif baru dengan data yang diberikan
        return view('alternative.create', compact('barang','criteriaweights', 'criteriaratings'));
    }

    public function store(Request $request)
    {
        // Validasi form untuk memastikan field yang diperlukan diisi
        $request->validate([
            'id_barang' => 'required'
        ]);

        // Temukan barang berdasarkan ID yang diberikan
        $barang = Barang::where('id', $request->id_barang)->first();

        // Jika barang tidak ditemukan, kembalikan dengan pesan kesalahan
        if (!$barang) {
            return redirect()->back()->withErrors(['Barang not found.']);
        }

        // Simpan alternatif baru yang terkait dengan barang yang ditemukan
        $alt = new Alternative;
        $alt->id_barang = $barang->id;
        $alt->save();

        // Simpan skor untuk setiap kriteria
        $criteriaweight = CriteriaWeight::get();
        foreach ($criteriaweight as $cw) {
            $score = new AlternativeScore();
            $score->alternative_id = $alt->id;
            $score->criteria_id = $cw->id;
            $score->rating_id = $request->input('criteria')[$cw->id];
            $score->save();
        }

        // Redirect ke indeks alternatif dengan pesan sukses
        return redirect()->route('alternatives.index')
            ->with('success', 'Alternative created successfully.');
    }


    public function show(Alternative $alternative)
    {
        // Tidak ada aksi khusus untuk menampilkan detail alternatif
    }

    public function edit(Alternative $alternative)
    {
        // Ambil semua bobot kriteria, peringkat kriteria, dan barang
        $criteriaweights = CriteriaWeight::get();
        $criteriaratings = CriteriaRating::get();
        $barang = Barang::all();
        
        // Ambil skor alternatif yang terkait dengan alternatif yang diberikan
        $alternativescores = AlternativeScore::where('alternative_id', $alternative->id)->get();
        
        // Render tampilan form untuk mengedit alternatif dengan data yang diberikan
        return view('alternative.edit', compact('barang','alternative', 'alternativescores', 'criteriaweights', 'criteriaratings'));
    }

    public function update(Request $request, Alternative $alternative)
    {
        // Simpan perubahan skor untuk alternatif yang diberikan
        $scores = AlternativeScore::where('alternative_id', $alternative->id)->get();
        $criteriaweight = CriteriaWeight::get();
        foreach ($criteriaweight as $key => $cw) {
            $scores[$key]->rating_id = $request->input('criteria')[$cw->id];
            $scores[$key]->save();
        }

        // Redirect ke indeks alternatif dengan pesan sukses
        return redirect()->route('alternatives.index')
            ->with('success', 'Alternative updated successfully');
    }

    public function destroy(Alternative $alternative)
    {
        $scores = AlternativeScore::where('alternative_id', $alternative->id)->delete();
        $alternative->delete();

        return redirect()->route('alternatives.index')
            ->with('success', 'Alternative deleted successfully');
    }
}