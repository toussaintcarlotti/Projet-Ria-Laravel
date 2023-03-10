<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\CoursEnseignantsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EdtEnseignantController;
use App\Http\Controllers\EdtFiliereController;
use App\Http\Controllers\EnseignantsController;
use App\Http\Controllers\EtudiantsController;
use App\Http\Controllers\EtudiantsEnseignantsController;
use App\Http\Controllers\FilieresController;
use App\Http\Controllers\NotesEtudiantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;


Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login');

Route::get('/register', function () {
    return view('pages.auth.register');
})->name('register');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Droit : authentifi√©
    Route::get('/', DashboardController::class)->name('home');

    Route::get('dashboard-example', function () {
        return view('dashboard-example');
    })->name('dashboard.example');

    Route::get('profil/{profile}', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('profil/{profile}', [ProfileController::class, 'update'])->name('profiles.update');

    Route::prefix('etudiant/{etudiant}/')->name('students.')->group(function () {
        Route::get('notes', NotesEtudiantController::class)->name('notes');
    });

    Route::get('filieres/{filiere}/emploi-du-temps', [EdtFiliereController::class, 'show'])->name('filieres.edt');

    // Filiere
    Route::get('filieres', [FilieresController::class, 'index'])->name('filieres.index');
    Route::get('filiere/{filiere}', [FilieresController::class, 'show'])->name('filieres.show');

    // Ue
    Route::get('ues', [UesController::class, 'index'])->name('ues.index');
    Route::get('ue/{ue}', [UesController::class, 'show'])->name('ues.show');

    // Droit : Enseignant
    Route::middleware(['enseignant'])->group(function () {
        // Etudiants
        Route::get('etudiants', [EtudiantsController::class, 'index'])->name('students.index');

        // Enseignants
        Route::prefix('enseignants/{enseignant}/')->name('teachers.')->group(function () {
            // Cours
            Route::get('cours', [CoursEnseignantsController::class, 'index'])->name('courses');
            Route::get('cours/cr√©er', [CoursEnseignantsController::class, 'create'])->name('courses.create');
            Route::post('cours/cr√©er', [CoursEnseignantsController::class, 'store'])->name('courses.store');
            Route::get('cours/{cours}/modifier', [CoursEnseignantsController::class, 'edit'])->name('courses.edit');
            Route::put('cours/{cours}/modifier', [CoursEnseignantsController::class, 'update'])->name('courses.update');
            Route::delete('cours/{cours}/supprimer', [CoursEnseignantsController::class, 'destroy'])->name('courses.destroy');

            // Etudiants
            Route::get('etudiants', [EtudiantsEnseignantsController::class, 'index'])->name('students');
            Route::get('etudiants/{etudiant}', [EtudiantsEnseignantsController::class, 'show'])->name('students.show');

            // Edt (emploi du temps)
            Route::get('emploi-du-temps', [EdtEnseignantController::class, 'show'])->name('edt');
            Route::get('emploi-du-temps/cr√©er', [EdtEnseignantController::class, 'create'])->name('edt.create');
            Route::post('emploi-du-temps/cr√©er', [EdtEnseignantController::class, 'store'])->name('edt.store');
        });

        // Droit : Directeur departement
        Route::middleware(['directeur.departement'])->group(function () {

            // Droit : Directeur etude
            Route::middleware(['directeur.etude'])->group(function () {
                // Filiere
                Route::prefix('filieres/')->name('filieres.')->group(function () {
                    Route::get('cr√©er', [FilieresController::class, 'create'])->name('create');
                    Route::post('', [FilieresController::class, 'store'])->name('store');
                    Route::get('{filiere}/modifier', [FilieresController::class, 'edit'])->name('edit');
                    Route::put('{filiere}/modifier', [FilieresController::class, 'update'])->name('update');
                    Route::delete('{filiere}/supprimer', [FilieresController::class, 'destroy'])->name('destroy');

                    Route::get('{filiere}/emploi-du-temps/cr√©er', [EdtFiliereController::class, 'create'])->name('edt.create');
                    Route::post('{filiere}/emploi-du-temps/cr√©er', [EdtFiliereController::class, 'store'])->name('edt.store');
                });


                // Ue
                Route::prefix('ues/')->name('ues.')->group(function () {
                    Route::get('cr√©er', [UesController::class, 'create'])->name('ues.create');
                    Route::post('', [UesController::class, 'store'])->name('store');
                    Route::get('{ue}/modifier', [UesController::class, 'edit'])->name('edit');
                    Route::put('{ue}/modifier', [UesController::class, 'update'])->name('update');
                    Route::delete('{ue}/supprimer', [UesController::class, 'destroy'])->name('destroy');
                });

                // Droit : Admin
                Route::middleware(['admin'])->group(function () {
                    // Etudiants
                    Route::prefix('etudiants')->name('students.')->group(function () {
                        Route::get('cr√©er', [EtudiantsController::class, 'create'])->name('create');
                        Route::post('', [EtudiantsController::class, 'store'])->name('store');
                        Route::get('{etudiant}', [EtudiantsController::class, 'edit'])->name('edit');
                        Route::put('{etudiant}', [EtudiantsController::class, 'update'])->name('update');
                        Route::delete('{etudiant}', [EtudiantsController::class, 'destroy'])->name('destroy');
                    });

                    // Enseignants
                    Route::prefix('enseignants')->name('teachers.')->group(function () {
                        Route::get('', [EnseignantsController::class, 'index'])->name('index');
                        Route::get('cr√©er', [EnseignantsController::class, 'create'])->name('create');
                        Route::post('', [EnseignantsController::class, 'store'])->name('store');
                        Route::get('{enseignant}', [EnseignantsController::class, 'edit'])->name('edit');
                        Route::put('{enseignant}', [EnseignantsController::class, 'update'])->name('update');
                        Route::delete('{enseignant}', [EnseignantsController::class, 'destroy'])->name('destroy');
                    });

                });
            });
        });
    });


});

// 404 for undefined routes
Route::any('/{page?}', function () {
    return View::make('pages.error.404');
})->where('page', '.*');
