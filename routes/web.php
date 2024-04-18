<?php

use App\Http\Controllers\ArchivesController;
use App\Http\Controllers\Bureau\BureauController;
use App\Http\Controllers\Enseignant\EnseigantController;
use App\Http\Controllers\Enseignant\EnseignantVacataireController;
use App\Http\Controllers\Enseignant\MaterielRestitutionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Materiels\EquipementController;
use App\Http\Controllers\Materiels\MaterielController;
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

Route::controller(HomeController::class)->group(function () {

    Route::get('/', 'index')->middleware('auth')->name('dashboard');

    Route::get("/help", 'help')->name("help");
});





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


// bureaup
Route::resource('bureau', BureauController::class)->middleware('auth');

// materiels
Route::prefix('/materiels')->name('materiel.')->middleware('auth')->group(function () {
    Route::resource('materiel', MaterielController::class)->middleware('auth');
    Route::resource('equipement', EquipementController::class)->middleware('auth');
});



// Relation materiel enseignant


// MaterielRestitution
Route::prefix("/")->name('restoreMateriel.')->controller(MaterielRestitutionController::class)->middleware('auth')->group(function () {
    Route::post("bureau/restore/{enseignant}/{acquisition}", 'restoreEquipementEnseignant')->name('enseignant');
    Route::post("/restore/{bureau}/{acquisition}", 'restoreEquipementBureau')->name('bureau');
});


// archives
Route::prefix("/archives")->name("archives.")->controller(ArchivesController::class)->middleware('auth')->group(function () {

    //TODO
    // all archives routes



    //affectations

    Route::prefix("/affectation")->name("affectation.")->group(function () {
        Route::get("/", "allAffectations")->name('index');
    });
});








require __DIR__ . '/auth.php';
