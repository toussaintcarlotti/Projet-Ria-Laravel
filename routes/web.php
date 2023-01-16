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

use App\Http\Controllers\CoursController;
use App\Http\Controllers\CoursEnseignantsController;
use App\Http\Controllers\EnseignantsController;
use App\Http\Controllers\EtudiantsController;
use App\Http\Controllers\EtudiantsEnseignantsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;


Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login');

Route::get('/register', function () {
    return view('pages.auth.register');
})->name('register');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Droit : authentifié
    Route::get('/', function () {
        return view('dashboard');
    })->name('home');

    Route::get('dashboard-example', function () {
        return view('dashboard-example');
    })->name('dashboard.example');

    Route::get('profil/{profile}', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('profil/{profile}', [ProfileController::class, 'update'])->name('profiles.update');

    // Droit : Directeur departement
    Route::middleware(['directeur.departement'])->group(function () {
        // Etudiants
        Route::get('etudiants', [EtudiantsController::class, 'index'])->name('students.index');

        // Enseignants
        Route::prefix('enseignants/{enseignant}/')->name('teachers.')->group(function () {
            // Cours
            Route::get('cours', [CoursEnseignantsController::class, 'index'])->name('courses');
            Route::get('cours/créer', [CoursEnseignantsController::class, 'create'])->name('courses.create');
            Route::post('cours/créer', [CoursEnseignantsController::class, 'store'])->name('courses.store');
            Route::get('cours/{cours}/modifier', [CoursEnseignantsController::class, 'edit'])->name('courses.edit');
            Route::put('cours/{cours}/modifier', [CoursEnseignantsController::class, 'update'])->name('courses.update');
            Route::delete('cours/{cours}/supprimer', [CoursEnseignantsController::class, 'destroy'])->name('courses.destroy');

            // Etudiants
            Route::get('etudiants', [EtudiantsEnseignantsController::class, 'index'])->name('students');
        });

        // Cours
        Route::get('cours', [CoursController::class, 'index'])->name('courses.index');
        Route::get('cours/créer', [CoursController::class, 'create'])->name('courses.create');


        // Droit : Directeur etude
        Route::middleware(['directeur.etude'])->group(function () {
            // Etudiants



            // Droit : Admin
            Route::middleware(['admin'])->group(function () {
                // Etudiants
                Route::prefix('etudiants')->name('students.')->group(function () {
                    Route::get('créer', [EtudiantsController::class, 'create'])->name('create');
                    Route::post('', [EtudiantsController::class, 'store'])->name('store');
                    Route::get('{etudiant}', [EtudiantsController::class, 'edit'])->name('edit');
                    Route::put('{etudiant}', [EtudiantsController::class, 'update'])->name('update');
                    Route::delete('{etudiant}', [EtudiantsController::class, 'destroy'])->name('destroy');
                });

                // Enseignants
                Route::prefix('enseignants')->name('teachers.')->group(function () {
                    Route::get('', [EnseignantsController::class, 'index'])->name('index');
                    Route::get('créer', [EnseignantsController::class, 'create'])->name('create');
                    Route::post('', [EnseignantsController::class, 'store'])->name('store');
                    Route::get('{enseignant}', [EnseignantsController::class, 'edit'])->name('edit');
                    Route::put('{enseignant}', [EnseignantsController::class, 'update'])->name('update');
                    Route::delete('{enseignant}', [EnseignantsController::class, 'destroy'])->name('destroy');
                });

            });
        });
    });


});

// 404 for undefined routes
Route::any('/{page?}', function () {
    return View::make('pages.error.404');
})->where('page', '.*');
