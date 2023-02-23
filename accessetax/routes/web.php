<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\profiles\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Users routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/utilisateurs',            [UtilisateurController::class, 'index'])->name('users');
    Route::get('/app/v1/data/utilisateurs/create',     [UtilisateurController::class, 'create'])->name('users.create');
    Route::post('/app/v1/data/utilisateurs',           [UtilisateurController::class, 'store'])->name('users.store');
    Route::get('/app/v1/data/utilisateurs/{user}',     [UtilisateurController::class, 'show'])->name('users.show');
    Route::get('/app/v1/data/utilisateurs/{user}/edit',[UtilisateurController::class, 'edit'])->name('users.edit');
    Route::put('/app/v1/data/utilisateurs/{user}',     [UtilisateurController::class, 'update'])->name('users.update');
    Route::delete('/app/v1/data/utilisateurs/{user}',  [UtilisateurController::class, 'destroy'])->name('users.destroy');
});

// Profils
Route::middleware(['auth'])->group(function(){
    Route::get('/app/v1/profil/visiteur',[ProfileController::class, 'visitor'])->name('prifile.visitor');
    Route::get('/app/v1/profil/adminisrateur',[ProfileController::class, 'admin'])->name('prifile.admin');
    Route::get('/app/v1/profil/commercial',[ProfileController::class, 'seller'])->name('prifile.seller');
    Route::get('/app/v1/profil/client',[ProfileController::class, 'customer'])->name('prifile.customer');
});
