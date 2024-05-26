<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeScore;
use App\Models\CriteriaWeight;
use App\Models\Barang; 
use Illuminate\Http\Request;
use PDF;

class NormalizationController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua skor alternatif dari database dengan data tambahan seperti nama barang dan bobot kriteria
        $scores = AlternativeScore::select(
            'alternativescores.id as id',
            'alternatives.id as ida',
            'criteriaweights.id as idw',
            'criteriaratings.id as idr',
            'barang.id as id_barang', 
            'barang.nama_barang as nama_barang', 
            'criteriaweights.name as criteria',
            'criteriaratings.rating as rating',
            'criteriaratings.description as description')
            ->leftJoin('alternatives', 'alternatives.id', '=', 'alternativescores.alternative_id')
            ->leftJoin('criteriaweights', 'criteriaweights.id', '=', 'alternativescores.criteria_id')
            ->leftJoin('criteriaratings', 'criteriaratings.id', '=', 'alternativescores.rating_id')
            ->leftJoin('barang', 'barang.id', '=', 'alternatives.id_barang') // Mengubah 'alternatives.id' menjadi 'barang.id' karena alternatif tidak memiliki kolom 'id_barang'
            ->get();

        // Ambil semua alternatif, bobot kriteria, dan barang dari database
        $alternatives = Alternative::get();
        $criteriaweights = CriteriaWeight::get();
        $barangs = Barang::all(); 

        // Normalisasi skor alternatif
        foreach ($alternatives as $a) {
            // Filter skor alternatif berdasarkan id alternatif
            $afilter = collect($scores)->where('ida', $a->id)->values()->all();
            foreach ($criteriaweights as $icw => $cw) {
                // Ambil semua nilai peringkat untuk kriteria tertentu
                $rates = $scores->where('idw', $cw->id)->pluck('rating')->toArray();
                // Hilangkan nilai-nilai nol dari array
                $rates = array_values(array_filter($rates));

                // Lakukan normalisasi berdasarkan tipe kriteria (benefit atau cost)
                if ($cw->type == 'benefit') {
                    // Normalisasi untuk kriteria benefit
                    $result = $afilter[$icw]->rating / max($rates);
                    $afilter[$icw]->rating = round($result, 2);
                } elseif ($cw->type == 'cost') {
                    // Normalisasi untuk kriteria cost
                    $result = min($rates) / $afilter[$icw]->rating;
                    $afilter[$icw]->rating = round($result, 2);
                }
            }
        }

        // Data yang akan dikirim ke tampilan
        $data = [
            'title' => 'NORMALISASI',
            'date' => date('d/m/Y'),
            'alternatives' => $alternatives,
            'scores' => $scores,
            'criteriaweights' => $criteriaweights,
            'barangs' => $barangs,
            'i' => 0,
        ];

        // Jika permintaan download PDF ditemukan, buat dan tampilkan file PDF
        if ($request->has('download')) {
            $pdf = PDF::loadView('normalization.pdf', $data);
            return $pdf->stream('normalization.pdf');
        }

        // Render tampilan normalisasi dengan data yang diberikan
        return view('normalization.index', compact('barangs', 'scores', 'alternatives', 'criteriaweights'))->with('i', 0);
    }
}
