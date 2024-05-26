<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeScore;
use App\Models\CriteriaWeight;
use App\Models\Barang; 
use Illuminate\Http\Request;
use PDF;

class DecisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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

        $alternatives = Alternative::get();
        $criteriaweights = CriteriaWeight::get();
        $barangs = Barang::all(); 
        
        $data = [
            'title' => 'Decision Matrix',
            'date' => date('d/m/Y'),
            'scores' => $scores,
            'alternatives' => $alternatives,
            'criteriaweights' => $criteriaweights,
            'barangs' => $barangs, 
        ];

        if ($request->has('download')) {
            $pdf = PDF::loadView('decision.pdf', $data);
            return $pdf->download('decision.pdf');
        }

        return view('decision.index', compact('barangs', 'scores', 'alternatives', 'criteriaweights'))->with('i', 0); // Mengganti "suppliers" menjadi "barangs"
    }
}
