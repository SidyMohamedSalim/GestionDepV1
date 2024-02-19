<?php

use App\Http\Controllers\Bureau\BureauController;
use App\Http\Controllers\Enseignant\EnseigantController;
use App\Http\Controllers\enseignant\EnseignantVacataireController;
use App\Http\Controllers\Materiels\EquipementController;
use App\Http\Controllers\Materiels\FournitureController;
use App\Http\Controllers\Materiels\MaterielsController;
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
})->middleware('auth')->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// enseignant
Route::resource('enseignant', EnseigantController::class)->middleware('auth');
Route::resource('vacataire', EnseignantVacataireController::class)->middleware('auth');

Route::prefix('/')->controller(BureauEnseignantController::class)->middleware('auth')->group(function () {
    Route::post('affecter/{enseignant}', 'affecterBureauEnseignant')->where([
        'enseignant' => "[0-9]+"
    ])->name('affecter_bureau_enseignant');

    Route::get('affecter/{bureau}', 'showAffecterEnseignantsBureau')->where([
        'bureau' => "[0-9]+"
    ])->name('show_affecter_enseignants_bureau');

    Route::put('affecter/{bureau}', 'affecterEnseignantsBureau')->where([
        'bureau' => "[0-9]+"
    ])->name('affecter_enseignants_bureau');
});


// bureau
Route::resource('bureau', BureauController::class)->middleware('auth');

// materiels
Route::prefix('/materiels')->controller(MaterielsController::class)->name('materiel.')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('index');

    Route::get('/create', 'create')->name('create');

    Route::post('/create', 'store')->name('store');

    Route::get('/{materiel}/edit', 'edit')->name('edit');
    Route::post('/{materiel}/edit', 'update')->name('update');
});





require __DIR__ . '/auth.php';
