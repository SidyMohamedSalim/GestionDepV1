<?php

use App\Http\Controllers\Bureau\BureauController;
use App\Http\Controllers\Enseignant\EnseigantController;
use App\Http\Controllers\enseignant\EnseignantVacataireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Relations\BureauEnseignantController;
use App\Models\Bureau;
use App\Models\Enseignant;
use App\Models\EnseignantVacataire;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard', [
        'count_enseignant' => Enseignant::all()->count(),
        'count_vacataire' => EnseignantVacataire::all()->count(),
        'count_bureau' => Bureau::all()->count(),
    ]);
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard', [
        'count_enseignant' => Enseignant::all()->count(),
        'count_vacataire' => EnseignantVacataire::all()->count(),
        'count_bureau' => Bureau::all()->count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('enseignant', EnseigantController::class)->middleware('auth');
Route::resource('vacataire', EnseignantVacataireController::class)->middleware('auth');
Route::resource('bureau', BureauController::class)->middleware('auth');


Route::prefix('/')->controller(BureauEnseignantController::class)->middleware('auth')->group(function () {
    Route::post('affecter/{enseignant}', 'affecterBureauEnseignant')->where([
        'enseignant' => "[0-9]+"
    ])->name('affecter_bureau_enseignant');

    Route::put('affecter/{bureau}', 'affecterEnseignantsBureau')->where([
        'bureau' => "[0-9]+"
    ])->name('affecter_enseignants_bureau');
});

require __DIR__ . '/auth.php';
