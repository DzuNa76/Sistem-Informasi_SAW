<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeScore;
use App\Models\CriteriaWeight;
use App\Models\Barang; 
use Illuminate\Http\Request;
use PDF;

class RankController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua skor alternatif dari database dengan data tambahan seperti nama barang dan bobot kriteria
        $scores = AlternativeScore::select(
            'alternativescores.id as id',
            'alternatives.id as ida',
            'criteriaweights.id as idw',
            'criteriaratings.id as idr',
            'barang.id as idbar', 
            'barang.nama_barang as nama_barang', 
            'criteriaweights.name as criteria',
            'criteriaratings.rating as rating',
            'criteriaratings.description as description')
            ->leftJoin('alternatives', 'alternatives.id', '=', 'alternativescores.alternative_id')
            ->leftJoin('criteriaweights', 'criteriaweights.id', '=', 'alternativescores.criteria_id')
            ->leftJoin('criteriaratings', 'criteriaratings.id', '=', 'alternativescores.rating_id')
            ->leftJoin('barang', 'barang.id', '=', 'alternatives.id_barang') 
            ->get();

        // Ambil semua alternatif, bobot kriteria, dan barang dari database
        $alternatives = Alternative::get();
        $criteriaweights = CriteriaWeight::get();
        $barang = Barang::all(); 

        // Hitung total bobot untuk setiap alternatif
        foreach ($alternatives as $a) {
            // Filter skor alternatif berdasarkan id alternatif
            $afilter = $scores->where('ida', $a->id)->values()->all();
            $total = 0;

            foreach ($criteriaweights as $icw => $cw) {
                // Ambil semua nilai peringkat untuk kriteria tertentu
                $rates = $scores->where('idw', $cw->id)->pluck('rating')->toArray();
                // Hilangkan nilai-nilai nol dari array
                $rates = array_values(array_filter($rates));

                // Lakukan perhitungan nilai relatif berdasarkan tipe kriteria (benefit atau cost)
                if ($cw->type == 'benefit') {
                    // Perhitungan nilai relatif untuk kriteria benefit
                    $result = $afilter[$icw]->rating / max($rates);
                } elseif ($cw->type == 'cost') {
                    // Perhitungan nilai relatif untuk kriteria cost
                    $result = min($rates) / $afilter[$icw]->rating;
                }

                // Kalikan nilai relatif dengan bobot kriteria
                $result *= $cw->weight;
                // Bulatkan hasil perhitungan
                $afilter[$icw]->rating = round($result, 2);
                // Tambahkan nilai relatif yang sudah dibobotkan ke total
                $total += $afilter[$icw]->rating;
            }
        }

        // Data yang akan dikirim ke tampilan
        $data = [
            'title' => 'Rank Barang',
            'date' => date('d/m/Y'),
            'alternatives' => $alternatives,
            'scores' => $scores,
            'criteriaweights' => $criteriaweights,
            'barang' => $barang,
        ];

        // Jika permintaan download PDF ditemukan, buat dan tampilkan file PDF
        if ($request->has('download')) {
            $pdf = PDF::loadView('rank.pdf', $data);
            return $pdf->stream('rank.pdf');
        }

        // Render tampilan peringkat dengan data yang diberikan
        return view('rank.index', compact('barang','scores', 'alternatives', 'criteriaweights'))->with('i', 0);
    }
}