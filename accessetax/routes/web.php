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
use App\Http\Controllers\ElecBillsController;
use App\Http\Controllers\ElecContractController;
use App\Http\Controllers\ElecMeterController;
use App\Http\Controllers\GazBillsController;
use App\Http\Controllers\GazContractController;
use App\Http\Controllers\GazMeterController;
use App\Http\Controllers\EligibiliteCSPEController;
use App\Http\Controllers\EligibiliteTCGNController;
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
    Route::get('/app/v1/data/utilisateurs/creer',     [UtilisateurController::class, 'create'])->name('users.create');
    Route::post('/app/v1/data/utilisateurs',           [UtilisateurController::class, 'store'])->name('users.store');
    Route::get('/app/v1/data/utilisateurs/{user}',     [UtilisateurController::class, 'show'])->name('users.show');
    Route::get('/app/v1/data/utilisateurs/{user}/editer',[UtilisateurController::class, 'edit'])->name('users.edit');
    Route::put('/app/v1/data/utilisateurs/{user}',     [UtilisateurController::class, 'update'])->name('users.update');
    Route::delete('/app/v1/data/utilisateurs/{user}',  [UtilisateurController::class, 'destroy'])->name('users.destroy');
});

// Profils
Route::middleware(['auth'])->group(function(){
    Route::get('/app/v1/profil/visiteur',[ProfileController::class, 'visitor'])->name('profile.visitor');
    Route::get('/app/v1/profil/adminisrateur',[ProfileController::class, 'admin'])->name('profile.admin');
    Route::get('/app/v1/profil/commercial',[ProfileController::class, 'seller'])->name('profile.seller');
    Route::get('/app/v1/profil/client',[ProfileController::class, 'customer'])->name('profile.customer');
});


// Suppliers routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/fournisseurs',            [SupplierController::class, 'index'])->name('suppliers');
    Route::get('/app/v1/data/fournisseur/creer',     [SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('/app/v1/data/fournisseur',           [SupplierController::class, 'store'])->name('suppliers.store');
    Route::get('/app/v1/data/fournisseur/{supplier}',     [SupplierController::class, 'show'])->name('suppliers.show');
    Route::get('/app/v1/data/fournisseur/{supplier}/editer',[SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::put('/app/v1/data/fournisseur/{supplier}',     [SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('/app/v1/data/fournisseur/{supplier}',  [SupplierController::class, 'destroy'])->name('suppliers.destroy');
});

// Activity Codes routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/code-activites',            [ActivityCodeController::class, 'index'])->name('activityCodes');
    Route::get('/app/v1/data/code-activites/creer',     [ActivityCodeController::class, 'create'])->name('activityCodes.create');
    Route::post('/app/v1/data/code-activites',           [ActivityCodeController::class, 'store'])->name('activityCodes.store');
    Route::get('/app/v1/data/code-activites/{code}',     [ActivityCodeController::class, 'show'])->name('activityCodes.show');
    Route::get('/app/v1/data/code-activites/{code}/editer',[ActivityCodeController::class, 'edit'])->name('activityCodes.edit');
    Route::put('/app/v1/data/code-activites/{code}',     [ActivityCodeController::class, 'update'])->name('activityCodes.update');
    Route::delete('/app/v1/data/code-activites/{code}',  [ActivityCodeController::class, 'destroy'])->name('activityCodes.destroy');
});

// Alerte  routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/alertes',            [AlerteController::class, 'index'])->name('alertes');
    Route::get('/app/v1/data/alertes/creer',     [AlerteController::class, 'create'])->name('alertes.create');
    Route::post('/app/v1/data/alertes',           [AlerteController::class, 'store'])->name('alertes.store');
    Route::get('/app/v1/data/alertes/{alert}',     [AlerteController::class, 'show'])->name('alertes.show');
    Route::get('/app/v1/data/alertes/{alert}/editer',[AlerteController::class, 'edit'])->name('alertes.edit');
    Route::put('/app/v1/data/alertes/{alert}',     [AlerteController::class, 'update'])->name('alertes.update');
    Route::delete('/app/v1/data/alertes/{alert}',  [AlerteController::class, 'destroy'])->name('alertes.destroy');
});

// Base Documents  routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/document-base',            [BaseDocumentController::class, 'index'])->name('baseDocs');
    Route::get('/app/v1/data/document-base/creer',     [BaseDocumentController::class, 'create'])->name('baseDocs.create');
    Route::post('/app/v1/data/document-base',           [BaseDocumentController::class, 'store'])->name('baseDocs.store');
    Route::get('/app/v1/data/document-base/{document}',     [BaseDocumentController::class, 'show'])->name('baseDocs.show');
    Route::get('/app/v1/data/document-base/{document}/editer',[BaseDocumentController::class, 'edit'])->name('baseDocs.edit');
    Route::put('/app/v1/data/document-base/{document}',     [BaseDocumentController::class, 'update'])->name('baseDocs.update');
    Route::delete('/app/v1/data/document-base/{document}',  [BaseDocumentController::class, 'destroy'])->name('baseDocs.destroy');
});

// Base Folder routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/folder-base',            [BaseFolderController::class, 'index'])->name('baseFolers');
    Route::get('/app/v1/data/folder-base/creer',     [BaseFolderController::class, 'create'])->name('baseFolers.create');
    Route::post('/app/v1/data/folder-base',           [BaseFolderController::class, 'store'])->name('baseFolers.store');
    Route::get('/app/v1/data/folder-base/{folder}',     [BaseFolderController::class, 'show'])->name('baseFolers.show');
    Route::get('/app/v1/data/folder-base/{folder}/editer',[BaseFolderController::class, 'edit'])->name('baseFolers.edit');
    Route::put('/app/v1/data/folder-base/{folder}',     [BaseFolderController::class, 'update'])->name('baseFolers.update');
    Route::delete('/app/v1/data/folder-base/{folder}',  [BaseFolderController::class, 'destroy'])->name('baseFolers.destroy');
});


//  Codes NAF routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/codes-nafs',            [CodeNafController::class, 'index'])->name('codesNafs');
    Route::get('/app/v1/data/codes-naf/creer',     [CodeNafController::class, 'create'])->name('codesNafs.create');
    Route::post('/app/v1/data/codes-naf',           [CodeNafController::class, 'store'])->name('codesNafs.store');
    Route::get('/app/v1/data/codes-naf/{naf}',     [CodeNafController::class, 'show'])->name('codesNafs.show');
    Route::get('/app/v1/data/codes-naf/{naf}/editer',[CodeNafController::class, 'edit'])->name('codesNafs.edit');
    Route::put('/app/v1/data/codes-naf/{naf}',     [CodeNafController::class, 'update'])->name('codesNafs.update');
    Route::delete('/app/v1/data/codes-naf/{naf}',  [CodeNafController::class, 'destroy'])->name('codesNafs.destroy');
});

//  Companies routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/societes',            [CompanyController::class, 'index'])->name('companies');
    Route::get('/app/v1/data/societe/creer',     [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/app/v1/data/societe',           [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/app/v1/data/societe/{societe}', [CompanyController::class, 'show'])->name('companies.show');
    Route::get('/app/v1/data/societe/{societe}/editer',[CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/app/v1/data/societe/{societe}',     [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/app/v1/data/societe/{societe}',  [CompanyController::class, 'destroy'])->name('companies.destroy');
});

//  Constants routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/constants',            [ConstantController::class, 'index'])->name('constants');
    Route::get('/app/v1/data/constant/creer',     [ConstantController::class, 'create'])->name('constants.create');
    Route::post('/app/v1/data/constant',           [ConstantController::class, 'store'])->name('constants.store');
    Route::get('/app/v1/data/constant/{constant}', [ConstantController::class, 'show'])->name('constants.show');
    Route::get('/app/v1/data/constant/{constant}/editer',[ConstantController::class, 'edit'])->name('constants.edit');
    Route::put('/app/v1/data/constant/{constant}',     [ConstantController::class, 'update'])->name('constants.update');
    Route::delete('/app/v1/data/constant/{constant}',  [ConstantController::class, 'destroy'])->name('constants.destroy');
});

//  Contacts routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/contacts',            [ContactController::class, 'index'])->name('contacts');
    Route::get('/app/v1/data/contact/creer',     [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/app/v1/data/contact',           [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/app/v1/data/contact/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::get('/app/v1/data/contact/{contact}/editer',[ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/app/v1/data/contact/{contact}',     [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/app/v1/data/contact/{contact}',  [ContactController::class, 'destroy'])->name('contacts.destroy');
});

//  Douanes routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/douanes',            [CouncilOfficeController::class, 'index'])->name('douanes');
    Route::get('/app/v1/data/douane/creer',     [CouncilOfficeController::class, 'create'])->name('douanes.create');
    Route::post('/app/v1/data/douane',           [CouncilOfficeController::class, 'store'])->name('douanes.store');
    Route::get('/app/v1/data/douane/{douane}', [CouncilOfficeController::class, 'show'])->name('douanes.show');
    Route::get('/app/v1/data/douane/{douane}/editer',[CouncilOfficeController::class, 'edit'])->name('douanes.edit');
    Route::put('/app/v1/data/douane/{douane}',     [CouncilOfficeController::class, 'update'])->name('douanes.update');
    Route::delete('/app/v1/data/douane/{douane}',  [CouncilOfficeController::class, 'destroy'])->name('douanes.destroy');
});



//  Elec Meters routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/contrat-elecs',            [ElecMeterController::class, 'index'])->name('contractElecs');
    Route::get('/app/v1/data/contrat-elec/creer',     [ElecMeterController::class, 'create'])->name('contractElecs.create');
    Route::post('/app/v1/data/contrat-elec',           [ElecMeterController::class, 'store'])->name('contractElecs.store');
    Route::get('/app/v1/data/contrat-elec/{contratElec}', [ElecMeterController::class, 'show'])->name('contractElecs.show');
    Route::get('/app/v1/data/contrat-elec/{contratElec}/editer',[ElecMeterController::class, 'edit'])->name('contractElecs.edit');
    Route::put('/app/v1/data/contrat-elec/{contratElec}',     [ElecMeterController::class, 'update'])->name('contractElecs.update');
    Route::delete('/app/v1/data/contrat-elec/{contratElec}',  [ElecMeterController::class, 'destroy'])->name('contractElecs.destroy');
});



//  Elec Contracts routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/contrat-elecs',            [ElecContractController::class, 'index'])->name('contractElecs');
    Route::get('/app/v1/data/contrat-elec/creer',     [ElecContractController::class, 'create'])->name('contractElecs.create');
    Route::post('/app/v1/data/contrat-elec',           [ElecContractController::class, 'store'])->name('contractElecs.store');
    Route::get('/app/v1/data/contrat-elec/{contratElec}', [ElecContractController::class, 'show'])->name('contractElecs.show');
    Route::get('/app/v1/data/contrat-elec/{contratElec}/editer',[ElecContractController::class, 'edit'])->name('contractElecs.edit');
    Route::put('/app/v1/data/contrat-elec/{contratElec}',     [ElecContractController::class, 'update'])->name('contractElecs.update');
    Route::delete('/app/v1/data/contrat-elec/{contratElec}',  [ElecContractController::class, 'destroy'])->name('contractElecs.destroy');
});


//  Elec Invoices routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/facture-elecs',            [ElecBillsController::class, 'index'])->name('billsElecs');
    Route::get('/app/v1/data/facture-elec/creer',     [ElecBillsController::class, 'create'])->name('billsElecs.create');
    Route::post('/app/v1/data/facture-elec',           [ElecBillsController::class, 'store'])->name('billsElecs.store');
    Route::get('/app/v1/data/facture-elec/{factureElec}', [ElecBillsController::class, 'show'])->name('billsElecs.show');
    Route::get('/app/v1/data/facture-elec/{factureElec}/editer',[ElecBillsController::class, 'edit'])->name('billsElecs.edit');
    Route::put('/app/v1/data/facture-elec/{factureElec}',     [ElecBillsController::class, 'update'])->name('billsElecs.update');
    Route::delete('/app/v1/data/facture-elec/{factureElec}',  [ElecBillsController::class, 'destroy'])->name('billsElecs.destroy');
});



//  Gaz Meters routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/contrat-gazs',            [GazMeterController::class, 'index'])->name('contractGazs');
    Route::get('/app/v1/data/contrat-gaz/creer',     [GazMeterController::class, 'create'])->name('contractGazs.create');
    Route::post('/app/v1/data/contrat-gaz',           [GazMeterController::class, 'store'])->name('contractGazs.store');
    Route::get('/app/v1/data/contrat-gaz/{contratGaz}', [GazMeterController::class, 'show'])->name('contractGazs.show');
    Route::get('/app/v1/data/contrat-gaz/{contratGaz}/editer',[GazMeterController::class, 'edit'])->name('contractGazs.edit');
    Route::put('/app/v1/data/contrat-gaz/{contratGaz}',     [GazMeterController::class, 'update'])->name('contractGazs.update');
    Route::delete('/app/v1/data/contrat-gaz/{contratGaz}',  [GazMeterController::class, 'destroy'])->name('contractGazs.destroy');
});



//  Elec Contracts routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/contrat-gazs',            [GazContractController::class, 'index'])->name('contractGazs');
    Route::get('/app/v1/data/contrat-gaz/creer',     [GazContractController::class, 'create'])->name('contractGazs.create');
    Route::post('/app/v1/data/contrat-gaz',           [GazContractController::class, 'store'])->name('contractGazs.store');
    Route::get('/app/v1/data/contrat-gaz/{contratGaz}', [GazContractController::class, 'show'])->name('contractGazs.show');
    Route::get('/app/v1/data/contrat-gaz/{contratGaz}/editer',[GazContractController::class, 'edit'])->name('contractGazs.edit');
    Route::put('/app/v1/data/contrat-gaz/{contratGaz}',     [GazContractController::class, 'update'])->name('contractGazs.update');
    Route::delete('/app/v1/data/contrat-gaz/{contratGaz}',  [GazContractController::class, 'destroy'])->name('contractGazs.destroy');
});


//  Gaz Bills routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/compteur-gazs',            [GazMeterController::class, 'index'])->name('meterGazs');
    Route::get('/app/v1/data/compteur-gaz/creer',     [GazMeterController::class, 'create'])->name('meterGazs.create');
    Route::post('/app/v1/data/compteur-gaz',           [GazMeterController::class, 'store'])->name('meterGazs.store');
    Route::get('/app/v1/data/compteur-gaz/{compteurGaz}', [GazMeterController::class, 'show'])->name('meterGazs.show');
    Route::get('/app/v1/data/compteur-gaz/{compteurGaz}/editer',[GazMeterController::class, 'edit'])->name('meterGazs.edit');
    Route::put('/app/v1/data/compteur-gaz/{compteurGaz}',     [GazMeterController::class, 'update'])->name('meterGazs.update');
    Route::delete('/app/v1/data/compteur-gaz/{compteurGaz}',  [GazMeterController::class, 'destroy'])->name('meterGazs.destroy');
});

//  Eligibility CSPE routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/eligibilite-cspees',            [EligibiliteCSPEController::class, 'index'])->name('cspeEligs');
    Route::get('/app/v1/data/eligibilite-cspee/creer',     [EligibiliteCSPEController::class, 'create'])->name('cspeEligs.create');
    Route::post('/app/v1/data/eligibilite-cspee',           [EligibiliteCSPEController::class, 'store'])->name('cspeEligs.store');
    Route::get('/app/v1/data/eligibilite-cspee/{cspe}', [EligibiliteCSPEController::class, 'show'])->name('cspeEligs.show');
    Route::get('/app/v1/data/eligibilite-cspee/{cspeElig}/editer',[EligibiliteCSPEController::class, 'edit'])->name('cspeEligs.edit');
    Route::put('/app/v1/data/eligibilite-cspee/{cspeElig}',     [EligibiliteCSPEController::class, 'update'])->name('cspeEligs.update');
    Route::delete('/app/v1/data/eligibilite-cspee/{cspeElig}',  [EligibiliteCSPEController::class, 'destroy'])->name('cspeEligs.destroy');
});

//  Eligibility TCGNE routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/eligibilite-tcgnes',            [EligibiliteTCGNController::class, 'index'])->name('tcgnEligs');
    Route::get('/app/v1/data/eligibilite-tcgne/creer',     [EligibiliteTCGNController::class, 'create'])->name('tcgnEligs.create');
    Route::post('/app/v1/data/eligibilite-tcgne',           [EligibiliteTCGNController::class, 'store'])->name('tcgnEligs.store');
    Route::get('/app/v1/data/eligibilite-tcgne/{tcgn}', [EligibiliteTCGNController::class, 'show'])->name('tcgnEligs.show');
    Route::get('/app/v1/data/eligibilite-tcgne/{tcgn}/editer',[EligibiliteTCGNController::class, 'edit'])->name('tcgnEligs.edit');
    Route::put('/app/v1/data/eligibilite-tcgne/{tcgn}',     [EligibiliteTCGNController::class, 'update'])->name('tcgnEligs.update');
    Route::delete('/app/v1/data/eligibilite-tcgne/{tcgn }',  [EligibiliteTCGNController::class, 'destroy'])->name('tcgnEligs.destroy');
});


//  Generated Folders TCGNE routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/dossier-generes',            [GenFolderController::class, 'index'])->name('genFolds');
    Route::get('/app/v1/data/dossier-genere/creer',     [GenFolderController::class, 'create'])->name('genFolds.create');
    Route::post('/app/v1/data/dossier-genere',           [GenFolderController::class, 'store'])->name('genFolds.store');
    Route::get('/app/v1/data/dossier-genere/{genFold}', [GenFolderController::class, 'show'])->name('genFolds.show');
    Route::get('/app/v1/data/dossier-genere/{genFold}/editer',[GenFolderController::class, 'edit'])->name('genFolds.edit');
    Route::put('/app/v1/data/dossier-genere/{genFold}',     [GenFolderController::class, 'update'])->name('genFolds.update');
    Route::delete('/app/v1/data/dossier-genere/{genFold}',  [GenFolderController::class, 'destroy'])->name('genFolds.destroy');
});


//  MeterParamter routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/peremetres-compteurs',            [MeterPremeterController::class, 'index'])->name('premMeters');
    Route::get('/app/v1/data/peremetres-compteur/creer',     [MeterPremeterController::class, 'create'])->name('premMeters.create');
    Route::post('/app/v1/data/peremetres-compteur',           [MeterPremeterController::class, 'store'])->name('premMeters.store');
    Route::get('/app/v1/data/peremetres-compteur/{premMeter}', [MeterPremeterController::class, 'show'])->name('premMeters.show');
    Route::get('/app/v1/data/peremetres-compteur/{premMeter}/editer',[MeterPremeterController::class, 'edit'])->name('premMeters.edit');
    Route::put('/app/v1/data/peremetres-compteur/{premMeter}',     [MeterPremeterController::class, 'update'])->name('premMeters.update');
    Route::delete('/app/v1/data/peremetres-compteur/{premMeter}',  [MeterPremeterController::class, 'destroy'])->name('premMeters.destroy');
});


//  Paramteres of the app routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/parametres',            [ParameterController::class, 'index'])->name('parameters');
    Route::get('/app/v1/data/parametre/creer',     [ParameterController::class, 'create'])->name('parameters.create');
    Route::post('/app/v1/data/parametre',           [ParameterController::class, 'store'])->name('parameters.store');
    Route::get('/app/v1/data/parametre/{parameter}', [ParameterController::class, 'show'])->name('parameters.show');
    Route::get('/app/v1/data/parametre/{parameter}/editer',[ParameterController::class, 'edit'])->name('parameters.edit');
    Route::put('/app/v1/data/parametre/{parameter}',     [ParameterController::class, 'update'])->name('parameters.update');
    Route::delete('/app/v1/data/parametre/{parameter}',  [ParameterController::class, 'destroy'])->name('parameters.destroy');
});



//  MeterParamter routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/messages',            [MessageController::class, 'index'])->name('messages');
    Route::get('/app/v1/data/message/creer',     [MessageController::class, 'create'])->name('messages.create');
    Route::post('/app/v1/data/message',           [MessageController::class, 'store'])->name('messages.store');
    Route::get('/app/v1/data/message/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::get('/app/v1/data/message/{message}/editer',[MessageController::class, 'edit'])->name('messages.edit');
    Route::put('/app/v1/data/message/{message}',     [MessageController::class, 'update'])->name('messages.update');
    Route::delete('/app/v1/data/message/{message}',  [MessageController::class, 'destroy'])->name('messages.destroy');
});
