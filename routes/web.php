<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\CriteriaRatingController;
use App\Http\Controllers\CriteriaWeightController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\NormalizationController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\TokoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resources([
    '/alternatives' => AlternativeController::class,
    '/criteriaratings' => CriteriaRatingController::class,
    '/criteriaweights' => CriteriaWeightController::class,
    '/barang' => BarangController::class,
    '/supplier' => SupplierController::class,
    '/toko' => TokoController::class,
    '/gudang' => GudangController::class,
    '/decision' => DecisionController::class, 
    '/normalization' => NormalizationController::class,
    '/rank' => RankController::class,
    '/kendaraan' => KendaraanController::class,
]);
    