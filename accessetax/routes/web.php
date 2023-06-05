<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\profiles\ProfileController;
use App\Http\Controllers\ActivityCodeController;
use App\Http\Controllers\AlerteController;
use App\Http\Controllers\BaseDocumentController;
use App\Http\Controllers\BaseFolderController;
use App\Http\Controllers\CodeNafController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ConstantController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouncilOfficeController;
use App\Http\Controllers\ElecContractController;
use App\Http\Controllers\ElecMeterController;
use App\Http\Controllers\GazBillsController;
use App\Http\Controllers\GazContractController;
use App\Http\Controllers\GazMeterController;
use App\Http\Controllers\EligibilityCSPEController;
use App\Http\Controllers\EligibilityTICGNController;
use App\Http\Controllers\GenFolderController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MeterPremeterController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\ReducedTaxBoardController;
use App\Http\Controllers\RefundCSPEController;
use App\Http\Controllers\RefundTCGNController;
use App\Http\Controllers\ResponsibleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Pappers\PappersController;
use App\Http\Controllers\Docs\GenPDFController;
use App\Http\Controllers\pipeline\StepsController;
use App\Http\Controllers\CarbonLiqueController;
use App\Http\Controllers\ElecBillsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Zipper\ZipController;

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


Auth::routes();


Route::get('/', function () {
    return view('welcome');
});


Route::get('/app/v1/data/pappers/{siren?}', [PappersController::class, 'getPappersData'])->name('pappers');
Route::get('/app/v1/data/generate/{siren?}', [GenPDFController::class, "generatePDFcontract"])->name('contract');
Route::get('/app/v1/data/pouvoir/{siren?}', [GenPDFController::class, "generatePDFpouvoir"])->name('pouvoir');
Route::get('/app/v1/data/courrier',         [GenPDFController::class, "courrierType"])->name('courrier');
Route::get('/zip/create', [ZipController::class, 'create'])->name('zip.create');

Route::get('/home', [HomeController::class, 'index'])->name('home');


// Users routes

Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/utilisateurs',            [UtilisateurController::class, 'index'])->name('utilisateurs');
    Route::get('/app/v1/data/utilisateur/creer',     [UtilisateurController::class, 'create'])->name('utilisateur.create');
    Route::post('/app/v1/data/utilisateur/enregistrer',           [UtilisateurController::class, 'store'])->name('utilisateur.store');
    Route::get('/app/v1/data/utilisateur/{utilisateur}/details',     [UtilisateurController::class, 'show'])->name('utilisateur.show');
    Route::get('/app/v1/data/utilisateur/{utilisateur}/editer', [UtilisateurController::class, 'edit'])->name('utilisateur.edit');
    Route::put('/app/v1/data/utilisateur/{utilisateur}/modifier',     [UtilisateurController::class, 'update'])->name('utilisateur.update');
    Route::delete('/app/v1/data/utilisateur/{utilisateur}/supprimer',  [UtilisateurController::class, 'destroy'])->name('utilisateur.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/clients',            [ClientController::class, 'index'])->name('clients');
    Route::get('/app/v1/data/client/creer',     [ClientController::class, 'create'])->name('client.create');
    Route::post('/app/v1/data/client/enregistrer',           [ClientController::class, 'store'])->name('client.store');
    Route::get('/app/v1/data/client/{user}/details',     [ClientController::class, 'show'])->name('client.show');
    Route::get('/app/v1/data/client/{user}/editer', [ClientController::class, 'edit'])->name('client.edit');
    Route::put('/app/v1/data/client/{user}/modifier',     [ClientController::class, 'update'])->name('client.update');
    Route::delete('/app/v1/data/client/{user}/supprimer',  [ClientController::class, 'destroy'])->name('client.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/fuitcarbons',            [CarbonLiqueController::class, 'index'])->name('fuitcarbons');
    Route::get('/app/v1/data/fuitcarbon/creer',     [CarbonLiqueController::class, 'create'])->name('fuitcarbon.create');
    Route::post('/app/v1/data/fuitcarbon/enregistrer',           [CarbonLiqueController::class, 'store'])->name('fuitcarbon.store');
    Route::get('/app/v1/data/fuitcarbon/{id}/details',     [CarbonLiqueController::class, 'show'])->name('fuitcarbon.show');
    Route::get('/app/v1/data/fuitcarbon/{id}/editer', [CarbonLiqueController::class, 'edit'])->name('fuitcarbon.edit');
    Route::put('/app/v1/data/fuitcarbon/{id}/modifier',     [CarbonLiqueController::class, 'update'])->name('fuitcarbon.update');
    Route::delete('/app/v1/data/fuitcarbon/{id}/supprimer',  [CarbonLiqueController::class, 'destroy'])->name('fuitcarbon.destroy');
});


// Profils
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/profil/visiteur', [ProfileController::class, 'visitor'])->name('profile.visitor');
    Route::get('/app/v1/profil/adminisrateur', [ProfileController::class, 'admin'])->name('profile.admin');
    Route::get('/app/v1/profil/commercial', [ProfileController::class, 'seller'])->name('profile.seller');
    Route::get('/app/v1/profil/client', [ProfileController::class, 'customer'])->name('profile.customer');
});


Route::get('/app/v1/pipline/etape/recap-details',                [StepsController::class, 'recapDetails'])->name('recapDetails');
Route::get('/app/v1/pipline/etape/Simulateur-TICGN',             [StepsController::class, 'SimulateurTICGN'])->name('SimulateurTICGN');
Route::post('/app/v1/pipline/etape/validation-TICGN',            [StepsController::class, 'CheckTICGN'])->name('ValidationTICGN');
Route::get('/app/v1/pipline/etape/Simulateur-CSPE',              [StepsController::class, 'SimulateurCSPE'])->name('SimulateurCSPE');
Route::post('/app/v1/pipline/etape/validation-CSPE',             [StepsController::class, 'CheckCSPE'])->name('ValidationCSPE');
Route::post('/app/v1/pipline/etape/resultats',                    [StepsController::class, 'resultsCSPETICGN'])->name('resultsCSPETICGN');

// Pipeline
Route::middleware([])->group(function () {
    Route::get('/app/v1/pipline/etape/bienvenue',                   [StepsController::class, 'bienvenue'])->name('etape1');
    Route::get('/app/v1/pipline/etape/elegibilite-client',          [StepsController::class, 'eligibilityClient'])->name('etape2');
    Route::get('/app/v1/pipline/etape/envoie-contrat',              [StepsController::class, 'contractSend'])->name('etape3');
    Route::get('/app/v1/pipline/etape/confirmation-contrat',        [StepsController::class, 'contractAccepted'])->name('etape4');
    Route::get('/app/v1/pipline/etape/montage-dossier',             [StepsController::class, 'folderBuilding'])->name('etape5');
    Route::get('/app/v1/pipline/etape/envoie-aux-authorites',       [StepsController::class, 'folderSentCouncil'])->name('etape6');
    Route::get('/app/v1/pipline/etape/confirmation-authoritess',     [StepsController::class, 'CouncilConfirmation'])->name('etape7');
    Route::get('/app/v1/pipline/etape/confirmation-authorites',     [StepsController::class, 'CustomerRefund'])->name('etape8');
    Route::get('/app/v1/pipline/etape/facturation-de-client',       [StepsController::class, 'ServiceInvoice'])->name('etape9');
    Route::get('/app/v1/pipline/etape/changement-taux-reduit',      [StepsController::class, 'folderStatus'])->name('etape10');
});

// Suppliers routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/fournisseurs',                   [SupplierController::class, 'index'])->name('suppliers');
    Route::get('/app/v1/data/fournisseur/creer',              [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/app/v1/data/fournisseur/enregistrer',                   [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/app/v1/data/fournisseur/{supplier}/details',         [SupplierController::class, 'show'])->name('supplier.show');
    Route::get('/app/v1/data/fournisseur/{supplier}/editer',  [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/app/v1/data/fournisseur/{supplier}/modifier',         [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/app/v1/data/fournisseur/{supplier}/supprimer',      [SupplierController::class, 'destroy'])->name('supplier.destroy');
});

// Activity Codes routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/code-activites',            [ActivityCodeController::class, 'index'])->name('activityCodes');
    Route::get('/app/v1/data/code-activites/creer',     [ActivityCodeController::class, 'create'])->name('activityCode.create');
    Route::post('/app/v1/data/code-activites/enregistrer',           [ActivityCodeController::class, 'store'])->name('activityCode.store');
    Route::get('/app/v1/data/code-activites/{code}/details',     [ActivityCodeController::class, 'show'])->name('activityCode.show');
    Route::get('/app/v1/data/code-activites/{code}/editer', [ActivityCodeController::class, 'edit'])->name('activityCode.edit');
    Route::put('/app/v1/data/code-activites/{code}/modifier',     [ActivityCodeController::class, 'update'])->name('activityCode.update');
    Route::delete('/app/v1/data/code-activites/{code}/supprimer',  [ActivityCodeController::class, 'destroy'])->name('activityCode.destroy');
});

// Alerte  routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/alertes',            [AlerteController::class, 'index'])->name('alertes');
    Route::get('/app/v1/data/alertes/creer',     [AlerteController::class, 'create'])->name('alerte.create');
    Route::post('/app/v1/data/alertes/enregistrer',           [AlerteController::class, 'store'])->name('alerte.store');
    Route::get('/app/v1/data/alertes/{id}/details',     [AlerteController::class, 'show'])->name('alerte.show');
    Route::get('/app/v1/data/alertes/{id}/editer', [AlerteController::class, 'edit'])->name('alerte.edit');
    Route::put('/app/v1/data/alertes/{id}/modifier',     [AlerteController::class, 'update'])->name('alerte.update');
    Route::delete('/app/v1/data/alertes/{id}/supprimer',  [AlerteController::class, 'destroy'])->name('alerte.destroy');
});

// Base Documents  routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/document-bases',            [BaseDocumentController::class, 'index'])->name('baseDocs');
    Route::get('/app/v1/data/document-base/creer',     [BaseDocumentController::class, 'create'])->name('baseDoc.create');
    Route::post('/app/v1/data/document-base/enregistrer',           [BaseDocumentController::class, 'store'])->name('baseDoc.store');
    Route::get('/app/v1/data/document-base/{document}/details',     [BaseDocumentController::class, 'show'])->name('baseDoc.show');
    Route::get('/app/v1/data/document-base/{document}/editer', [BaseDocumentController::class, 'edit'])->name('baseDoc.edit');
    Route::put('/app/v1/data/document-base/{document}/modifier',     [BaseDocumentController::class, 'update'])->name('baseDoc.update');
    Route::delete('/app/v1/data/document-base/{document}/supprimer',  [BaseDocumentController::class, 'destroy'])->name('baseDoc.destroy');
});

// Base Folder routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/folderBases',            [BaseFolderController::class, 'index'])->name('baseFolers');
    Route::get('/app/v1/data/folderBase/creer',     [BaseFolderController::class, 'create'])->name('baseFoler.create');
    Route::post('/app/v1/data/folderBase/enregistrer',           [BaseFolderController::class, 'store'])->name('baseFoler.store');
    Route::get('/app/v1/data/folderBase/{id}/details',     [BaseFolderController::class, 'show'])->name('baseFoler.show');
    Route::get('/app/v1/data/folderBase/{id}/editer', [BaseFolderController::class, 'edit'])->name('baseFoler.edit');
    Route::put('/app/v1/data/folderBase/{id}/modifier',     [BaseFolderController::class, 'update'])->name('baseFoler.update');
    Route::delete('/app/v1/data/folderBase/{id}/supprimer',  [BaseFolderController::class, 'destroy'])->name('baseFoler.destroy');
});


//  Codes NAF routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/codes-nafs',            [CodeNafController::class, 'index'])->name('codesNafs');
    Route::get('/app/v1/data/codes-naf/creer',     [CodeNafController::class, 'create'])->name('codesNaf.create');
    Route::post('/app/v1/data/codes-naf/enregistrer',           [CodeNafController::class, 'store'])->name('codesNaf.store');
    Route::get('/app/v1/data/codes-naf/{naf}/details',     [CodeNafController::class, 'show'])->name('codesNaf.show');
    Route::get('/app/v1/data/codes-naf/{naf}/editer', [CodeNafController::class, 'edit'])->name('codesNaf.edit');
    Route::put('/app/v1/data/codes-naf/{naf}/modifier',     [CodeNafController::class, 'update'])->name('codesNaf.update');
    Route::delete('/app/v1/data/codes-naf/{naf}/supprimer',  [CodeNafController::class, 'destroy'])->name('codesNaf.destroy');
});

//  Companies routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/societes',            [CompanyController::class, 'index'])->name('companies');
    Route::get('/app/v1/data/societe/creer',     [CompanyController::class, 'create'])->name('companie.create');
    Route::post('/app/v1/data/societe/sauvgarder',           [CompanyController::class, 'store'])->name('companie.store');
    Route::get('/app/v1/data/societe/{societe}/details', [CompanyController::class, 'show'])->name('companie.show');
    Route::get('/app/v1/data/societe/{societe}/editer', [CompanyController::class, 'edit'])->name('companie.edit');
    Route::put('/app/v1/data/societe/{societe}/modifier',     [CompanyController::class, 'update'])->name('companie.update');
    Route::delete('/app/v1/data/societe/{societe}/supprimer',  [CompanyController::class, 'destroy'])->name('companie.destroy');
});

//  Constants routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/constants',            [ConstantController::class, 'index'])->name('constants');
    Route::get('/app/v1/data/constant/creer',     [ConstantController::class, 'create'])->name('constant.create');
    Route::post('/app/v1/data/constant/enregistrer',           [ConstantController::class, 'store'])->name('constant.store');
    Route::get('/app/v1/data/constant/{constant}/details', [ConstantController::class, 'show'])->name('constant.show');
    Route::get('/app/v1/data/constant/{constant}/editer', [ConstantController::class, 'edit'])->name('constant.edit');
    Route::put('/app/v1/data/constant/{constant}/modifier',     [ConstantController::class, 'update'])->name('constant.update');
    Route::delete('/app/v1/data/constant/{constant}/supprimer',  [ConstantController::class, 'destroy'])->name('constant.destroy');
});

//  Contacts routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/contacts',            [ContactController::class, 'index'])->name('contacts');
    Route::get('/app/v1/data/contact/creer',     [ContactController::class, 'create'])->name('contact.create');
    Route::post('/app/v1/data/contact/enregistrer',           [ContactController::class, 'store'])->name('contact.store');
    Route::get('/app/v1/data/contact/{contact}/details', [ContactController::class, 'show'])->name('contact.show');
    Route::get('/app/v1/data/contact/{contact}/editer', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/app/v1/data/contact/{contact}/modifier',     [ContactController::class, 'update'])->name('contact.update');
    Route::delete('/app/v1/data/contact/{contact}/supprimer',  [ContactController::class, 'destroy'])->name('contact.destroy');
});

//  Douanes routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/douanes',            [CouncilOfficeController::class, 'index'])->name('douanes');
    Route::get('/app/v1/data/douane/creer',     [CouncilOfficeController::class, 'create'])->name('douane.create');
    Route::post('/app/v1/data/douane/enregistrer',           [CouncilOfficeController::class, 'store'])->name('douane.store');
    Route::get('/app/v1/data/douane/{douane}/details', [CouncilOfficeController::class, 'show'])->name('douane.show');
    Route::get('/app/v1/data/douane/{douane}/editer', [CouncilOfficeController::class, 'edit'])->name('douane.edit');
    Route::put('/app/v1/data/douane/{douane}/modifier',     [CouncilOfficeController::class, 'update'])->name('douane.update');
    Route::delete('/app/v1/data/douane/{douane}/supprimer',  [CouncilOfficeController::class, 'destroy'])->name('douane.destroy');
});



//  Elec Meters routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/compteur-elecs',            [ElecMeterController::class, 'index'])->name('elecMeters');
    Route::get('/app/v1/data/compteur-elec/creer',     [ElecMeterController::class, 'create'])->name('elecMeter.create');
    Route::post('/app/v1/data/compteur-elec/enregistrer',           [ElecMeterController::class, 'store'])->name('elecMeter.store');
    Route::get('/app/v1/data/compteur-elec/{compteurElec}/details', [ElecMeterController::class, 'show'])->name('elecMeter.show');
    Route::get('/app/v1/data/compteur-elec/{compteurElec}/editer', [ElecMeterController::class, 'edit'])->name('elecMeter.edit');
    Route::put('/app/v1/data/compteur-elec/{compteurElec}/modifier',     [ElecMeterController::class, 'update'])->name('elecMeter.update');
    Route::delete('/app/v1/data/compteur-elec/{compteurElec}/supprimer',  [ElecMeterController::class, 'destroy'])->name('elecMeter.destroy');
});



//  Elec Contracts routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/contrat-elecs',            [ElecContractController::class, 'index'])->name('contractElecs');
    Route::get('/app/v1/data/contrat-elec/creer',     [ElecContractController::class, 'create'])->name('contractElec.create');
    Route::post('/app/v1/data/contrat-elec/enregistrer',           [ElecContractController::class, 'store'])->name('contractElec.store');
    Route::get('/app/v1/data/contrat-elec/{contratElec}/details', [ElecContractController::class, 'show'])->name('contractElec.show');
    Route::get('/app/v1/data/contrat-elec/{contratElec}/editer', [ElecContractController::class, 'edit'])->name('contractElec.edit');
    Route::put('/app/v1/data/contrat-elec/{contratElec}/modifier',     [ElecContractController::class, 'update'])->name('contractElec.update');
    Route::delete('/app/v1/data/contrat-elec/{contratElec}/supprimer',  [ElecContractController::class, 'destroy'])->name('contractElec.destroy');
});


//  Elec Invoices routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/facture-elecs',            [ElecBillsController::class, 'index'])->name('billsElecs');
    Route::get('/app/v1/data/facture-elec/creer',     [ElecBillsController::class, 'create'])->name('billsElec.create');
    Route::post('/app/v1/data/facture-elec/enregistrer',           [ElecBillsController::class, 'store'])->name('billsElec.store');
    Route::get('/app/v1/data/facture-elec/{id}/details', [ElecBillsController::class, 'show'])->name('billsElec.show');
    Route::get('/app/v1/data/facture-elec/{id}/editer', [ElecBillsController::class, 'edit'])->name('billsElec.edit');
    Route::put('/app/v1/data/facture-elec/{id}/modifier',     [ElecBillsController::class, 'update'])->name('billsElec.update');
    Route::delete('/app/v1/data/facture-elec/{id}/supprimer',  [ElecBillsController::class, 'destroy'])->name('billsElec.destroy');
});



//  Gaz Meters routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/compteur-gazs',            [GazMeterController::class, 'index'])->name('gazMeters');
    Route::get('/app/v1/data/compteur-gaz/creer',     [GazMeterController::class, 'create'])->name('gazMeter.create');
    Route::post('/app/v1/data/compteur-gaz/enregistrer',           [GazMeterController::class, 'store'])->name('gazMeter.store');
    Route::get('/app/v1/data/compteur-gaz/{compteur}/details', [GazMeterController::class, 'show'])->name('gazMeter.show');
    Route::get('/app/v1/data/compteur-gaz/{compteur}/editer', [GazMeterController::class, 'edit'])->name('gazMeter.edit');
    Route::put('/app/v1/data/compteur-gaz/{compteur}/modifier',     [GazMeterController::class, 'update'])->name('gazMeter.update');
    Route::delete('/app/v1/data/compteur-gaz/{compteur}/supprimer',  [GazMeterController::class, 'destroy'])->name('gazMeter.destroy');
});



//  Gaz Contracts routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/contrat-gazs',            [GazContractController::class, 'index'])->name('contractGazs');
    Route::get('/app/v1/data/contrat-gaz/creer',     [GazContractController::class, 'create'])->name('contractGaz.create');
    Route::post('/app/v1/data/contrat-gaz/enregistrer',           [GazContractController::class, 'store'])->name('contractGaz.store');
    Route::get('/app/v1/data/contrat-gaz/{contratGaz}/details', [GazContractController::class, 'show'])->name('contractGaz.show');
    Route::get('/app/v1/data/contrat-gaz/{contratGaz}/editer', [GazContractController::class, 'edit'])->name('contractGaz.edit');
    Route::put('/app/v1/data/contrat-gaz/{contratGaz}/modifier',     [GazContractController::class, 'update'])->name('contractGaz.update');
    Route::delete('/app/v1/data/contrat-gaz/{contratGaz}/supprimer',  [GazContractController::class, 'destroy'])->name('contractGaz.destroy');
});


//  Gaz Bills routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/facture-gazs',            [GazBillsController::class, 'index'])->name('billGazs');
    Route::get('/app/v1/data/facture-gaz/creer',     [GazBillsController::class, 'create'])->name('billGaz.create');
    Route::post('/app/v1/data/facture-gaz/enregistrer',           [GazBillsController::class, 'store'])->name('billGaz.store');
    Route::get('/app/v1/data/facture-gaz/{factureGaz}/details', [GazBillsController::class, 'show'])->name('billGaz.show');
    Route::get('/app/v1/data/facture-gaz/{factureGaz}/editer', [GazBillsController::class, 'edit'])->name('billGaz.edit');
    Route::put('/app/v1/data/facture-gaz/{factureGaz}/modifier',     [GazBillsController::class, 'update'])->name('billGaz.update');
    Route::delete('/app/v1/data/facture-gaz/{factureGaz}/supprimer',  [GazBillsController::class, 'destroy'])->name('billGaz.destroy');
});

//  Eligibility CSPE routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/eligibilite-cspees',            [EligibilityCSPEController::class, 'index'])->name('cspeEligs');
    Route::get('/app/v1/data/eligibilite-cspee/creer',     [EligibilityCSPEController::class, 'create'])->name('cspeElig.create');
    Route::post('/app/v1/data/eligibilite-cspee/enregistrer',           [EligibilityCSPEController::class, 'store'])->name('cspeElig.store');
    Route::get('/app/v1/data/eligibilite-cspee/{cspeElig}/details', [EligibilityCSPEController::class, 'show'])->name('cspeElig.show');
    Route::get('/app/v1/data/eligibilite-cspee/{cspeElig}/editer', [EligibilityCSPEController::class, 'edit'])->name('cspeElig.edit');
    Route::put('/app/v1/data/eligibilite-cspee/{cspeElig}/modifier',     [EligibilityCSPEController::class, 'update'])->name('cspeElig.update');
    Route::delete('/app/v1/data/eligibilite-cspee/{cspeElig}/supprimer',  [EligibilityCSPEController::class, 'destroy'])->name('cspeElig.destroy');
});

//  Eligibility TCGNE routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/eligibilite-tcgnes',            [EligibilityTICGNController::class, 'index'])->name('tcgnEligs');
    Route::get('/app/v1/data/eligibilite-tcgne/creer',     [EligibilityTICGNController::class, 'create'])->name('tcgnElig.create');
    Route::post('/app/v1/data/eligibilite-tcgne/enregistrer',           [EligibilityTICGNController::class, 'store'])->name('tcgnElig.store');
    Route::get('/app/v1/data/eligibilite-tcgne/{tcgn}/details', [EligibilityTICGNController::class, 'show'])->name('tcgnElig.show');
    Route::get('/app/v1/data/eligibilite-tcgne/{tcgn}/editer', [EligibilityTICGNController::class, 'edit'])->name('tcgnElig.edit');
    Route::put('/app/v1/data/eligibilite-tcgne/{tcgn}/modifier',     [EligibilityTICGNController::class, 'update'])->name('tcgnElig.update');
    Route::delete('/app/v1/data/eligibilite-tcgne/{tcgn}/supprimer',  [EligibilityTICGNController::class, 'destroy'])->name('tcgnElig.destroy');
});


//  Generated Folders TCGNE routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/dossier-generes',            [GenFolderController::class, 'index'])->name('genFolds');
    Route::get('/app/v1/data/dossier-genere/creer',     [GenFolderController::class, 'create'])->name('genFold.create');
    Route::post('/app/v1/data/dossier-genere/enregistrer',           [GenFolderController::class, 'store'])->name('genFold.store');
    Route::get('/app/v1/data/dossier-genere/{genFold}/details', [GenFolderController::class, 'show'])->name('genFold.show');
    Route::get('/app/v1/data/dossier-genere/{genFold}/editer', [GenFolderController::class, 'edit'])->name('genFold.edit');
    Route::put('/app/v1/data/dossier-genere/{genFold}/modifier',     [GenFolderController::class, 'update'])->name('genFold.update');
    Route::delete('/app/v1/data/dossier-genere/{genFold}/supprimer',  [GenFolderController::class, 'destroy'])->name('genFold.destroy');
});


//  MeterPremeter routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/peremetres-compteurs',            [MeterPremeterController::class, 'index'])->name('premMeters');
    Route::get('/app/v1/data/peremetres-compteur/creer',     [MeterPremeterController::class, 'create'])->name('premMeter.create');
    Route::post('/app/v1/data/peremetres-compteur/enregistrer',           [MeterPremeterController::class, 'store'])->name('premMeter.store');
    Route::get('/app/v1/data/peremetres-compteur/{premMeter}/details', [MeterPremeterController::class, 'show'])->name('premMeter.show');
    Route::get('/app/v1/data/peremetres-compteur/{premMeter}/editer', [MeterPremeterController::class, 'edit'])->name('premMeter.edit');
    Route::put('/app/v1/data/peremetres-compteur/{premMeter}/modifier',     [MeterPremeterController::class, 'update'])->name('premMeter.update');
    Route::delete('/app/v1/data/peremetres-compteur/{premMeter}/supprimer',  [MeterPremeterController::class, 'destroy'])->name('premMeter.destroy');
});


//  Paramteres routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/parametres',            [ParameterController::class, 'index'])->name('parameters');
    Route::get('/app/v1/data/parametre/creer',     [ParameterController::class, 'create'])->name('parameter.create');
    Route::post('/app/v1/data/parametre/enregistrer',           [ParameterController::class, 'store'])->name('parameter.store');
    Route::get('/app/v1/data/parametre/{parameter}/details', [ParameterController::class, 'show'])->name('parameter.show');
    Route::get('/app/v1/data/parametre/{parameter}/editer', [ParameterController::class, 'edit'])->name('parameter.edit');
    Route::put('/app/v1/data/parametre/{parameter}/modifier',     [ParameterController::class, 'update'])->name('parameter.update');
    Route::delete('/app/v1/data/parametre/{parameter}/supprimer',  [ParameterController::class, 'destroy'])->name('parameter.destroy');
});



//  Messages routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/messages',            [MessageController::class, 'index'])->name('messages');
    Route::get('/app/v1/data/message/creer',     [MessageController::class, 'create'])->name('message.create');
    Route::post('/app/v1/data/message/enregistrer',           [MessageController::class, 'store'])->name('message.store');
    Route::get('/app/v1/data/message/{message}/details', [MessageController::class, 'show'])->name('message.show');
    Route::get('/app/v1/data/message/{message}/editer', [MessageController::class, 'edit'])->name('message.edit');
    Route::put('/app/v1/data/message/{message}/modifier',     [MessageController::class, 'update'])->name('message.update');
    Route::delete('/app/v1/data/message/{message}/supprimer',  [MessageController::class, 'destroy'])->name('message.destroy');
});



//  Reduced Tax routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/taux-reduits',            [ReducedTaxBoardController::class, 'index'])->name('taxReds');
    Route::get('/app/v1/data/taux-reduit/creer',     [ReducedTaxBoardController::class, 'create'])->name('taxRed.create');
    Route::post('/app/v1/data/taux-reduit/sauvgarder',           [ReducedTaxBoardController::class, 'store'])->name('taxRed.store');
    Route::get('/app/v1/data/taux-reduit/{taxRed}/details', [ReducedTaxBoardController::class, 'show'])->name('taxRed.show');
    Route::get('/app/v1/data/taux-reduit/{taxRed}/editer', [ReducedTaxBoardController::class, 'edit'])->name('taxRed.edit');
    Route::put('/app/v1/data/taux-reduit/{taxRed}/modifier',     [ReducedTaxBoardController::class, 'update'])->name('taxRed.update');
    Route::delete('/app/v1/data/taux-reduit/{taxRed}/supprimer',  [ReducedTaxBoardController::class, 'destroy'])->name('taxRed.destroy');
});



//  Refund board routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/tableau-remboursements',            [ReducedTaxBoardController::class, 'index'])->name('refundBoards');
    Route::get('/app/v1/data/tableau-remboursement/creer',     [ReducedTaxBoardController::class, 'create'])->name('refundBoard.create');
    Route::post('/app/v1/data/tableau-remboursement/enregistrer',           [ReducedTaxBoardController::class, 'store'])->name('refundBoard.store');
    Route::get('/app/v1/data/tableau-remboursement/{refundBoard}/details', [ReducedTaxBoardController::class, 'show'])->name('refundBoard.show');
    Route::get('/app/v1/data/tableau-remboursement/{refundBoard}/editer', [ReducedTaxBoardController::class, 'edit'])->name('refundBoard.edit');
    Route::put('/app/v1/data/tableau-remboursement/{refundBoard}/modifier',     [ReducedTaxBoardController::class, 'update'])->name('refundBoard.update');
    Route::delete('/app/v1/data/tableau-remboursement/{refundBoard}/supprimer',  [ReducedTaxBoardController::class, 'destroy'])->name('refundBoard.destroy');
});


//  RefundCSPE routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/remboursement-cspes',            [RefundCSPEController::class, 'index'])->name('refundCspes');
    Route::get('/app/v1/data/remboursement-cspe/creer',     [RefundCSPEController::class, 'create'])->name('refundCspe.create');
    Route::post('/app/v1/data/remboursement-cspe/enregistrer',           [RefundCSPEController::class, 'store'])->name('refundCspe.store');
    Route::get('/app/v1/data/remboursement-cspe/{refundCspe}/details', [RefundCSPEController::class, 'show'])->name('refundCspe.show');
    Route::get('/app/v1/data/remboursement-cspe/{refundCspe}/editer', [RefundCSPEController::class, 'edit'])->name('refundCspe.edit');
    Route::put('/app/v1/data/remboursement-cspe/{refundCspe}/modifier',     [RefundCSPEController::class, 'update'])->name('refundCspe.update');
    Route::delete('/app/v1/data/remboursement-cspe/{refundCspe}/supprimer',  [RefundCSPEController::class, 'destroy'])->name('refundCspe.destroy');
});

//  Refund TCGN routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/remboursement-tcgns',            [RefundTCGNController::class, 'index'])->name('refundTcgns');
    Route::get('/app/v1/data/remboursement-tcgn/creer',     [RefundTCGNController::class, 'create'])->name('refundTcgn.create');
    Route::post('/app/v1/data/remboursement-tcgn/enregistrer',           [RefundTCGNController::class, 'store'])->name('refundTcgn.store');
    Route::get('/app/v1/data/remboursement-tcgn/{refundTcgn}/details', [RefundTCGNController::class, 'show'])->name('refundTcgn.show');
    Route::get('/app/v1/data/remboursement-tcgn/{refundTcgn}/editer', [RefundTCGNController::class, 'edit'])->name('refundTcgn.edit');
    Route::put('/app/v1/data/remboursement-tcgn/{refundTcgn}/modifier',     [RefundTCGNController::class, 'update'])->name('refundTcgn.update');
    Route::delete('/app/v1/data/remboursement-tcgn/{refundTcgn}/supprimer',  [RefundTCGNController::class, 'destroy'])->name('refundTcgn.destroy');
});


//  Sites routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/sites',            [SiteController::class, 'index'])->name('sites');
    Route::get('/app/v1/data/site/creer',     [SiteController::class, 'create'])->name('site.create');
    Route::post('/app/v1/data/site/enregistrer',           [SiteController::class, 'store'])->name('site.store');
    Route::get('/app/v1/data/site/{site}/details', [SiteController::class, 'show'])->name('site.show');
    Route::get('/app/v1/data/site/{site}/editer', [SiteController::class, 'edit'])->name('site.edit');
    Route::put('/app/v1/data/site/{site}/modifier',     [SiteController::class, 'update'])->name('site.update');
    Route::delete('/app/v1/data/site/{site}/supprimer',  [SiteController::class, 'destroy'])->name('message.destroy');
});


//  Studies routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/etudes',            [StudyController::class, 'index'])->name('studies');
    Route::get('/app/v1/data/etude/creer',     [StudyController::class, 'create'])->name('study.create');
    Route::post('/app/v1/data/etude/enregistrer',           [StudyController::class, 'store'])->name('study.store');
    Route::get('/app/v1/data/etude/{etude}/details', [StudyController::class, 'show'])->name('study.show');
    Route::get('/app/v1/data/etude/{etude}/editer', [StudyController::class, 'edit'])->name('study.edit');
    Route::put('/app/v1/data/etude/{etude}/modifier',     [StudyController::class, 'update'])->name('study.update');
    Route::delete('/app/v1/data/etude/{etude}/supprimer',  [StudyController::class, 'destroy'])->name('study.destroy');
});


//  CEOs routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/dirigeants',            [ResponsibleController::class, 'index'])->name('responsibles');
    Route::get('/app/v1/data/dirigeant/creer',     [ResponsibleController::class, 'create'])->name('responsible.create');
    Route::post('/app/v1/data/dirigeant/enregistrer',           [ResponsibleController::class, 'store'])->name('responsible.store');
    Route::get('/app/v1/data/dirigeant/{dirigeant}/details', [ResponsibleController::class, 'show'])->name('responsible.show');
    Route::get('/app/v1/data/dirigeant/{dirigeant}/editer', [ResponsibleController::class, 'edit'])->name('responsible.edit');
    Route::put('/app/v1/data/dirigeant/{dirigeant}/modifier',     [ResponsibleController::class, 'update'])->name('responsible.update');
    Route::delete('/app/v1/data/dirigeant/{dirigeant}supprimer',  [ResponsibleController::class, 'destroy'])->name('responsible.destroy');
});


// End of the routes for the Web Side
