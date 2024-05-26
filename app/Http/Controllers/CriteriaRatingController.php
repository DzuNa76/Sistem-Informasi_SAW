<?php

namespace App\Http\Controllers;

use App\Models\CriteriaRating;
use App\Models\CriteriaWeight;
use Illuminate\Http\Request;
use PDF;

class CriteriaRatingController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data peringkat kriteria dengan gabungkan dengan bobot kriteria
        $criteriaratings = CriteriaRating::leftJoin('criteriaweights', 'criteriaratings.criteria_id', '=', 'criteriaweights.id')
        ->select(
            'criteriaratings.id as id',
            'criteriaratings.criteria_id as cid',
            'criteriaratings.rating as rating',
            'criteriaratings.description as description',
            'criteriaweights.name as name')
        ->get();

        // Data yang akan dikirim ke tampilan
        $data = [
            'title' => 'DATA SUB-KRITERIA',
            'date' => date('d/m/Y'),
            'criteriaratings' => $criteriaratings,
        ];

        // Jika permintaan download PDF ditemukan, buat dan unduh file PDF
        if ($request->has('download')) {
            $pdf = PDF::loadView('criteriarating.pdf', $data);
            return $pdf->download('criteriarating.pdf');
        }
        
        // Render tampilan indeks peringkat kriteria dengan data yang diberikan
        return view('criteriarating.index', compact('criteriaratings'))->with('i', 0);
    }

    public function create()
    {
        // Ambil semua bobot kriteria untuk digunakan dalam form
        $criteriaweight = CriteriaWeight::get();
        
        // Render tampilan form untuk membuat peringkat kriteria baru dengan data yang diberikan
        return view('criteriarating.create', compact('criteriaweight'));
    }

    public function store(Request $request)
    {
        // Validasi form untuk memastikan field yang diperlukan diisi
        $request->validate([
            'criteria_id' => 'required',
            'rating' => 'required',
            'description' => 'required',
        ]);

        // Simpan data peringkat kriteria baru ke database
        CriteriaRating::create($request->all());

        // Redirect ke indeks peringkat kriteria dengan pesan sukses
        return redirect()->route('criteriaratings.index')
                        ->with('success','Criteria created successfully.');
    }

    public function show(CriteriaRating $criteriaRating)
    {
        // Tidak ada aksi khusus untuk menampilkan detail peringkat kriteria
    }

    public function edit(CriteriaRating $criteriarating)
    {
        // Render tampilan form untuk mengedit peringkat kriteria dengan data yang diberikan
        return view('criteriarating.edit',compact('criteriarating'));
    }

    public function update(Request $request, CriteriaRating $criteriarating)
    {
        // Validasi form untuk memastikan field yang diperlukan diisi
        $request->validate([
            'rating' => 'required',
            'description' => 'required',
        ]);

        // Update peringkat kriteria yang diberikan dengan data yang baru
        $criteriarating->update($request->all());

        // Redirect ke indeks peringkat kriteria dengan pesan sukses
        return redirect()->route('criteriaratings.index')
                        ->with('success','Criteria updated successfully');
    }

    public function destroy(CriteriaRating $criteriarating)
    {
        // Hapus peringkat kriteria yang diberikan dari database
        $criteriarating->delete();

        // Redirect ke indeks peringkat kriteria dengan pesan sukses
        return redirect()->route('criteriaratings.index')
                        ->with('success','Criteria deleted successfully');
    }
}