<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Services\UtilisateurApiController;
use App\Http\Controllers\CodeNafController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/v1/data/code_naf', [CodeNafController::class, 'index']) ;
Route::get('/v1/data/code_naf', [CodeNafController::class, 'codenafs']) ;
 
// Route::middleware(['auth'])->group(function () {
//     Route::get('/v1/data/utilisateurs',            [UtilisateurApiController::class, 'index'])->name('users');
//     Route::post('/v1/data/utilisateurs',           [UtilisateurApiController::class, 'store'])->name('users.store');
//     Route::get('/v1/data/utilisateurs/{user}',     [UtilisateurApiController::class, 'show'])->name('users.show');
//     Route::put('/v1/data/utilisateurs/{user}',     [UtilisateurApiController::class, 'update'])->name('users.update');
//     Route::delete('/v1/data/utilisateurs/{user}',  [UtilisateurApiController::class, 'destroy'])->name('users.destroy');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('/v1/data/',            [UtilisateurApiController::class, 'index'])->name('users');
//     Route::post('/v1/data/',           [UtilisateurApiController::class, 'store'])->name('users.store');
//      Route::get('/v1/data/',            [UtilisateurApiController::class, 'index'])->name('users');
//     Route::post('/v1/data/',           [UtilisateurApiController::class, 'store'])->name('users.store');

// });
