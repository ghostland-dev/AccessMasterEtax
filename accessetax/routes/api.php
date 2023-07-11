<?php

use App\Http\Controllers\API\SocieteController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/v1/data/code_naf', [CodeNafController::class, 'index']) ;
Route::get('/v1/data/code_naf', [CodeNafController::class, 'codenafs']);

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


Route::prefix('v1')->group(function () {
    // Utilisateur Routes
    Route::resource('utilisateurs', UtilisateurController::class);

    // Profile Routes
    Route::resource('profiles', ProfileController::class);

    // Activity Code Routes
    Route::resource('activity-codes', ActivityCodeController::class);

    // Alerte Routes
    Route::resource('alertes', AlerteController::class);

    // Base Document Routes
    Route::resource('base-documents', BaseDocumentController::class);

    // Base Folder Routes
    Route::resource('base-folders', BaseFolderController::class);

    // Code Naf Routes
    Route::resource('code-nafs', CodeNafController::class);

    // Company Routes
    Route::resource('companies', SocieteController::class);

    // Constant Routes
    Route::resource('constants', ConstantController::class);

    // Contact Routes
    Route::resource('contacts', ContactController::class);

    // Council Office Routes
    Route::resource('council-offices', CouncilOfficeController::class);

    // Elec Contract Routes
    Route::resource('elec-contracts', ElecContractController::class);

    // Elec Meter Routes
    Route::resource('elec-meters', ElecMeterController::class);

    // Gaz Bills Routes
    Route::resource('gaz-bills', GazBillsController::class);

    // Gaz Contract Routes
    Route::resource('gaz-contracts', GazContractController::class);

    // Gaz Meter Routes
    Route::resource('gaz-meters', GazMeterController::class);

    // Eligibility CSPE Routes
    Route::resource('eligibility-cspe', EligibilityCSPEController::class);

    // Eligibility TICGN Routes
    Route::resource('eligibility-ticgn', EligibilityTICGNController::class);

    // Gen Folder Routes
    Route::resource('gen-folders', GenFolderController::class);

    // Message Routes
    Route::resource('messages', MessageController::class);

    // Supplier Routes
    Route::resource('suppliers', SupplierController::class);

    // Meter Premeter Routes
    Route::resource('meter-premeters', MeterPremeterController::class);

    // Parameter Routes
    Route::resource('parameters', ParameterController::class);

    // Reduced Tax Board Routes
    Route::resource('reduced-tax-boards', ReducedTaxBoardController::class);

    // Refund CSPE Routes
    Route::resource('refund-cspe', RefundCSPEController::class);

    // Refund TCGN Routes
    Route::resource('refund-tcgn', RefundTCGNController::class);

    // Responsible Routes
    Route::resource('responsibles', ResponsibleController::class);

    // Site Routes
    Route::resource('sites', SiteController::class);

    // Study Routes
    Route::resource('studies', StudyController::class);

    // Client Routes
    Route::resource('clients', ClientController::class);

    // Pappers Routes
    Route::get('pappers', [PappersController::class, 'index']);
    Route::get('pappers/{id}', [PappersController::class, 'show']);
    // Add more Pappers routes as needed

    // GenPDF Routes
    Route::get('gen-pdf/contract/{siren?}', [GenPDFController::class, 'generatePDFcontract']);
    Route::get('gen-pdf/pouvoir/{siren?}', [GenPDFController::class, 'generatePDFpouvoir']);
    Route::get('gen-pdf/courrier', [GenPDFController::class, 'courrierType']);

    // Pipeline Routes
    Route::get('pipeline/etape/bienvenue', [StepsController::class, 'bienvenue']);
    Route::get('pipeline/etape/eligibilite-client', [StepsController::class, 'eligibilityClient']);

    // Add more pipeline routes as needed

    // Other Routes
    // Add other routes for CarbonLiqueController, ElecBillsController, HomeController, ZipController, etc.

});
