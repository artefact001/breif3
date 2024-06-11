<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\CategorieController;

Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->middleware('auth');








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



// Route pour lister toutes les catégories
Route::get('categories', [CategorieController::class, 'index'])->name('categories.index');

// Route pour afficher le formulaire de création d'une nouvelle catégorie
Route::get('categories/create', [CategorieController::class, 'create'])->name('categories.create');

// Route pour enregistrer une nouvelle catégorie
Route::post('categories', [CategorieController::class, 'store'])->name('categories.store');

// Route pour afficher les détails d'une catégorie
Route::get('categories/{categorie}', [CategorieController::class, 'show'])->name('categories.show');

// Route pour afficher le formulaire d'édition d'une catégorie
Route::get('categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');

// Route pour mettre à jour une catégorie existante
Route::put('categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');

// Route pour supprimer une catégorie
Route::delete('categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');


Route::get('rayons', [RayonController::class, 'index'])->name('rayons.index');

Route::get('rayons/create', [RayonController::class, 'create'])->name('rayons.create');

Route::post('rayons', [RayonController::class, 'store'])->name('rayons.store');

Route::get('rayons/{rayon}', [RayonController::class, 'show'])->name('rayons.show');

Route::get('rayons/{rayon}/edit', [RayonController::class, 'edit'])->name('rayons.edit');

Route::put('rayons/{rayon}', [RayonController::class, 'update'])->name('rayons.update');

Route::delete('rayons/{rayon}', [RayonController::class, 'destroy'])->name('rayons.destroy');



// Routes pour afficher la liste des livres, créer un nouveau livre, enregistrer un nouveau livre
Route::get('/livres', [LivreController::class, 'index'])->name('livres.index');
Route::get('/livres/create', [LivreController::class, 'create'])->name('livres.create');
Route::post('/livres', [LivreController::class, 'store'])->name('livres.store');

// Routes pour afficher les détails d'un livre, modifier un livre, mettre à jour un livre

Route::get('/livres/{livre}', [LivreController::class, 'show'])->name('livres.show');
Route::get('/livres/{livre}/edit', [LivreController::class, 'edit'])->name('livres.edit');
Route::put('/livres/{livre}', [LivreController::class, 'update'])->name('livres.update');


// Route pour supprimer un livre

Route::delete('/livres/{livre}', [LivreController::class, 'destroy'])->name('livres.destroy');
