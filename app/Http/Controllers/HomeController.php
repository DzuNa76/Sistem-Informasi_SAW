<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Supplier;
use App\Models\Barang;
use App\Models\Gudang;
use App\Models\Testimoni;
use App\Models\CriteriaWeight;
use App\Models\Toko;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $supplier = Supplier::count();
        $barang = Barang::count();
        $gudang = Gudang::count();
        $toko = Toko::count();
        $criteriaWeight = CriteriaWeight::count();

        return view('home',compact('users','supplier','barang','gudang','toko','criteriaWeight'));
    }
    }