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
    Route::get('/app/v1/data/utilisateurs/creer',     [UtilisateurController::class, 'create'])->name('user.create');
    Route::post('/app/v1/data/utilisateurs',           [UtilisateurController::class, 'store'])->name('user.store');
    Route::get('/app/v1/data/utilisateurs/{user}',     [UtilisateurController::class, 'show'])->name('user.show');
    Route::get('/app/v1/data/utilisateurs/{user}/editer',[UtilisateurController::class, 'edit'])->name('user.edit');
    Route::put('/app/v1/data/utilisateurs/{user}',     [UtilisateurController::class, 'update'])->name('user.update');
    Route::delete('/app/v1/data/utilisateurs/{user}',  [UtilisateurController::class, 'destroy'])->name('user.destroy');
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
    Route::get('/app/v1/data/fournisseur/creer',     [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/app/v1/data/fournisseur',           [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/app/v1/data/fournisseur/{supplier}',     [SupplierController::class, 'show'])->name('supplier.show');
    Route::get('/app/v1/data/fournisseur/{supplier}/editer',[SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/app/v1/data/fournisseur/{supplier}',     [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/app/v1/data/fournisseur/{supplier}',  [SupplierController::class, 'destroy'])->name('supplier.destroy');
});

// Activity Codes routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/code-activites',            [ActivityCodeController::class, 'index'])->name('activityCodes');
    Route::get('/app/v1/data/code-activites/creer',     [ActivityCodeController::class, 'create'])->name('activityCode.create');
    Route::post('/app/v1/data/code-activites',           [ActivityCodeController::class, 'store'])->name('activityCode.store');
    Route::get('/app/v1/data/code-activites/{code}',     [ActivityCodeController::class, 'show'])->name('activityCode.show');
    Route::get('/app/v1/data/code-activites/{code}/editer',[ActivityCodeController::class, 'edit'])->name('activityCode.edit');
    Route::put('/app/v1/data/code-activites/{code}',     [ActivityCodeController::class, 'update'])->name('activityCode.update');
    Route::delete('/app/v1/data/code-activites/{code}',  [ActivityCodeController::class, 'destroy'])->name('activityCode.destroy');
});

// Alerte  routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/alertes',            [AlerteController::class, 'index'])->name('alertes');
    Route::get('/app/v1/data/alertes/creer',     [AlerteController::class, 'create'])->name('alerte.create');
    Route::post('/app/v1/data/alertes',           [AlerteController::class, 'store'])->name('alerte.store');
    Route::get('/app/v1/data/alertes/{alert}',     [AlerteController::class, 'show'])->name('alerte.show');
    Route::get('/app/v1/data/alertes/{alert}/editer',[AlerteController::class, 'edit'])->name('alerte.edit');
    Route::put('/app/v1/data/alertes/{alert}',     [AlerteController::class, 'update'])->name('alerte.update');
    Route::delete('/app/v1/data/alertes/{alert}',  [AlerteController::class, 'destroy'])->name('alerte.destroy');
});

// Base Documents  routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/document-base',            [BaseDocumentController::class, 'index'])->name('baseDocs');
    Route::get('/app/v1/data/document-base/creer',     [BaseDocumentController::class, 'create'])->name('baseDoc.create');
    Route::post('/app/v1/data/document-base',           [BaseDocumentController::class, 'store'])->name('baseDoc.store');
    Route::get('/app/v1/data/document-base/{document}',     [BaseDocumentController::class, 'show'])->name('baseDoc.show');
    Route::get('/app/v1/data/document-base/{document}/editer',[BaseDocumentController::class, 'edit'])->name('baseDoc.edit');
    Route::put('/app/v1/data/document-base/{document}',     [BaseDocumentController::class, 'update'])->name('baseDoc.update');
    Route::delete('/app/v1/data/document-base/{document}',  [BaseDocumentController::class, 'destroy'])->name('baseDoc.destroy');
});

// Base Folder routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/folder-base',            [BaseFolderController::class, 'index'])->name('baseFolers');
    Route::get('/app/v1/data/folder-base/creer',     [BaseFolderController::class, 'create'])->name('baseFoler.create');
    Route::post('/app/v1/data/folder-base',           [BaseFolderController::class, 'store'])->name('baseFoler.store');
    Route::get('/app/v1/data/folder-base/{folder}',     [BaseFolderController::class, 'show'])->name('baseFoler.show');
    Route::get('/app/v1/data/folder-base/{folder}/editer',[BaseFolderController::class, 'edit'])->name('baseFoler.edit');
    Route::put('/app/v1/data/folder-base/{folder}',     [BaseFolderController::class, 'update'])->name('baseFoler.update');
    Route::delete('/app/v1/data/folder-base/{folder}',  [BaseFolderController::class, 'destroy'])->name('baseFoler.destroy');
});


//  Codes NAF routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/codes-nafs',            [CodeNafController::class, 'index'])->name('codesNafs');
    Route::get('/app/v1/data/codes-naf/creer',     [CodeNafController::class, 'create'])->name('codesNaf.create');
    Route::post('/app/v1/data/codes-naf',           [CodeNafController::class, 'store'])->name('codesNaf.store');
    Route::get('/app/v1/data/codes-naf/{naf}',     [CodeNafController::class, 'show'])->name('codesNaf.show');
    Route::get('/app/v1/data/codes-naf/{naf}/editer',[CodeNafController::class, 'edit'])->name('codesNaf.edit');
    Route::put('/app/v1/data/codes-naf/{naf}',     [CodeNafController::class, 'update'])->name('codesNaf.update');
    Route::delete('/app/v1/data/codes-naf/{naf}',  [CodeNafController::class, 'destroy'])->name('codesNaf.destroy');
});

//  Companies routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/societes',            [CompanyController::class, 'index'])->name('companies');
    Route::get('/app/v1/data/societe/creer',     [CompanyController::class, 'create'])->name('companie.create');
    Route::post('/app/v1/data/societe',           [CompanyController::class, 'store'])->name('companie.store');
    Route::get('/app/v1/data/societe/{societe}', [CompanyController::class, 'show'])->name('companie.show');
    Route::get('/app/v1/data/societe/{societe}/editer',[CompanyController::class, 'edit'])->name('companie.edit');
    Route::put('/app/v1/data/societe/{societe}',     [CompanyController::class, 'update'])->name('companie.update');
    Route::delete('/app/v1/data/societe/{societe}',  [CompanyController::class, 'destroy'])->name('companie.destroy');
});

//  Constants routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/constants',            [ConstantController::class, 'index'])->name('constants');
    Route::get('/app/v1/data/constant/creer',     [ConstantController::class, 'create'])->name('constant.create');
    Route::post('/app/v1/data/constant',           [ConstantController::class, 'store'])->name('constant.store');
    Route::get('/app/v1/data/constant/{constant}', [ConstantController::class, 'show'])->name('constant.show');
    Route::get('/app/v1/data/constant/{constant}/editer',[ConstantController::class, 'edit'])->name('constant.edit');
    Route::put('/app/v1/data/constant/{constant}',     [ConstantController::class, 'update'])->name('constant.update');
    Route::delete('/app/v1/data/constant/{constant}',  [ConstantController::class, 'destroy'])->name('constant.destroy');
});

//  Contacts routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/contacts',            [ContactController::class, 'index'])->name('contacts');
    Route::get('/app/v1/data/contact/creer',     [ContactController::class, 'create'])->name('contact.create');
    Route::post('/app/v1/data/contact',           [ContactController::class, 'store'])->name('contact.store');
    Route::get('/app/v1/data/contact/{contact}', [ContactController::class, 'show'])->name('contact.show');
    Route::get('/app/v1/data/contact/{contact}/editer',[ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/app/v1/data/contact/{contact}',     [ContactController::class, 'update'])->name('contact.update');
    Route::delete('/app/v1/data/contact/{contact}',  [ContactController::class, 'destroy'])->name('contact.destroy');
});

//  Douanes routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/douanes',            [CouncilOfficeController::class, 'index'])->name('douanes');
    Route::get('/app/v1/data/douane/creer',     [CouncilOfficeController::class, 'create'])->name('douane.create');
    Route::post('/app/v1/data/douane',           [CouncilOfficeController::class, 'store'])->name('douane.store');
    Route::get('/app/v1/data/douane/{douane}', [CouncilOfficeController::class, 'show'])->name('douane.show');
    Route::get('/app/v1/data/douane/{douane}/editer',[CouncilOfficeController::class, 'edit'])->name('douane.edit');
    Route::put('/app/v1/data/douane/{douane}',     [CouncilOfficeController::class, 'update'])->name('douane.update');
    Route::delete('/app/v1/data/douane/{douane}',  [CouncilOfficeController::class, 'destroy'])->name('douane.destroy');
});



//  Elec Meters routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/contrat-elecs',            [ElecMeterController::class, 'index'])->name('contractElecs');
    Route::get('/app/v1/data/contrat-elec/creer',     [ElecMeterController::class, 'create'])->name('contractElec.create');
    Route::post('/app/v1/data/contrat-elec',           [ElecMeterController::class, 'store'])->name('contractElec.store');
    Route::get('/app/v1/data/contrat-elec/{contratElec}', [ElecMeterController::class, 'show'])->name('contractElec.show');
    Route::get('/app/v1/data/contrat-elec/{contratElec}/editer',[ElecMeterController::class, 'edit'])->name('contractElec.edit');
    Route::put('/app/v1/data/contrat-elec/{contratElec}',     [ElecMeterController::class, 'update'])->name('contractElec.update');
    Route::delete('/app/v1/data/contrat-elec/{contratElec}',  [ElecMeterController::class, 'destroy'])->name('contractElec.destroy');
});



//  Elec Contracts routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/contrat-elecs',            [ElecContractController::class, 'index'])->name('contractElecs');
    Route::get('/app/v1/data/contrat-elec/creer',     [ElecContractController::class, 'create'])->name('contractElec.create');
    Route::post('/app/v1/data/contrat-elec',           [ElecContractController::class, 'store'])->name('contractElec.store');
    Route::get('/app/v1/data/contrat-elec/{contratElec}', [ElecContractController::class, 'show'])->name('contractElec.show');
    Route::get('/app/v1/data/contrat-elec/{contratElec}/editer',[ElecContractController::class, 'edit'])->name('contractElec.edit');
    Route::put('/app/v1/data/contrat-elec/{contratElec}',     [ElecContractController::class, 'update'])->name('contractElec.update');
    Route::delete('/app/v1/data/contrat-elec/{contratElec}',  [ElecContractController::class, 'destroy'])->name('contractElec.destroy');
});


//  Elec Invoices routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/facture-elecs',            [ElecBillsController::class, 'index'])->name('billsElecs');
    Route::get('/app/v1/data/facture-elec/creer',     [ElecBillsController::class, 'create'])->name('billsElec.create');
    Route::post('/app/v1/data/facture-elec',           [ElecBillsController::class, 'store'])->name('billsElec.store');
    Route::get('/app/v1/data/facture-elec/{factureElec}', [ElecBillsController::class, 'show'])->name('billsElec.show');
    Route::get('/app/v1/data/facture-elec/{factureElec}/editer',[ElecBillsController::class, 'edit'])->name('billsElec.edit');
    Route::put('/app/v1/data/facture-elec/{factureElec}',     [ElecBillsController::class, 'update'])->name('billsElec.update');
    Route::delete('/app/v1/data/facture-elec/{factureElec}',  [ElecBillsController::class, 'destroy'])->name('billsElec.destroy');
});



//  Gaz Meters routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/contrat-gazs',            [GazMeterController::class, 'index'])->name('contractGazs');
    Route::get('/app/v1/data/contrat-gaz/creer',     [GazMeterController::class, 'create'])->name('contractGaz.create');
    Route::post('/app/v1/data/contrat-gaz',           [GazMeterController::class, 'store'])->name('contractGaz.store');
    Route::get('/app/v1/data/contrat-gaz/{contratGaz}', [GazMeterController::class, 'show'])->name('contractGaz.show');
    Route::get('/app/v1/data/contrat-gaz/{contratGaz}/editer',[GazMeterController::class, 'edit'])->name('contractGaz.edit');
    Route::put('/app/v1/data/contrat-gaz/{contratGaz}',     [GazMeterController::class, 'update'])->name('contractGaz.update');
    Route::delete('/app/v1/data/contrat-gaz/{contratGaz}',  [GazMeterController::class, 'destroy'])->name('contractGaz.destroy');
});



//  Gaz Contracts routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/contrat-gazs',            [GazContractController::class, 'index'])->name('contractGazs');
    Route::get('/app/v1/data/contrat-gaz/creer',     [GazContractController::class, 'create'])->name('contractGaz.create');
    Route::post('/app/v1/data/contrat-gaz',           [GazContractController::class, 'store'])->name('contractGaz.store');
    Route::get('/app/v1/data/contrat-gaz/{contratGaz}', [GazContractController::class, 'show'])->name('contractGaz.show');
    Route::get('/app/v1/data/contrat-gaz/{contratGaz}/editer',[GazContractController::class, 'edit'])->name('contractGaz.edit');
    Route::put('/app/v1/data/contrat-gaz/{contratGaz}',     [GazContractController::class, 'update'])->name('contractGaz.update');
    Route::delete('/app/v1/data/contrat-gaz/{contratGaz}',  [GazContractController::class, 'destroy'])->name('contractGaz.destroy');
});


//  Gaz Bills routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/compteur-gazs',            [GazMeterController::class, 'index'])->name('meterGazs');
    Route::get('/app/v1/data/compteur-gaz/creer',     [GazMeterController::class, 'create'])->name('meterGaz.create');
    Route::post('/app/v1/data/compteur-gaz',           [GazMeterController::class, 'store'])->name('meterGaz.store');
    Route::get('/app/v1/data/compteur-gaz/{compteurGaz}', [GazMeterController::class, 'show'])->name('meterGaz.show');
    Route::get('/app/v1/data/compteur-gaz/{compteurGaz}/editer',[GazMeterController::class, 'edit'])->name('meterGaz.edit');
    Route::put('/app/v1/data/compteur-gaz/{compteurGaz}',     [GazMeterController::class, 'update'])->name('meterGaz.update');
    Route::delete('/app/v1/data/compteur-gaz/{compteurGaz}',  [GazMeterController::class, 'destroy'])->name('meterGaz.destroy');
});

//  Eligibility CSPE routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/eligibilite-cspees',            [EligibiliteCSPEController::class, 'index'])->name('cspeEligs');
    Route::get('/app/v1/data/eligibilite-cspee/creer',     [EligibiliteCSPEController::class, 'create'])->name('cspeElig.create');
    Route::post('/app/v1/data/eligibilite-cspee',           [EligibiliteCSPEController::class, 'store'])->name('cspeElig.store');
    Route::get('/app/v1/data/eligibilite-cspee/{cspe}', [EligibiliteCSPEController::class, 'show'])->name('cspeElig.show');
    Route::get('/app/v1/data/eligibilite-cspee/{cspeElig}/editer',[EligibiliteCSPEController::class, 'edit'])->name('cspeElig.edit');
    Route::put('/app/v1/data/eligibilite-cspee/{cspeElig}',     [EligibiliteCSPEController::class, 'update'])->name('cspeElig.update');
    Route::delete('/app/v1/data/eligibilite-cspee/{cspeElig}',  [EligibiliteCSPEController::class, 'destroy'])->name('cspeElig.destroy');
});

//  Eligibility TCGNE routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/eligibilite-tcgnes',            [EligibiliteTCGNController::class, 'index'])->name('tcgnEligs');
    Route::get('/app/v1/data/eligibilite-tcgne/creer',     [EligibiliteTCGNController::class, 'create'])->name('tcgnElig.create');
    Route::post('/app/v1/data/eligibilite-tcgne',           [EligibiliteTCGNController::class, 'store'])->name('tcgnElig.store');
    Route::get('/app/v1/data/eligibilite-tcgne/{tcgn}', [EligibiliteTCGNController::class, 'show'])->name('tcgnElig.show');
    Route::get('/app/v1/data/eligibilite-tcgne/{tcgn}/editer',[EligibiliteTCGNController::class, 'edit'])->name('tcgnElig.edit');
    Route::put('/app/v1/data/eligibilite-tcgne/{tcgn}',     [EligibiliteTCGNController::class, 'update'])->name('tcgnElig.update');
    Route::delete('/app/v1/data/eligibilite-tcgne/{tcgn }',  [EligibiliteTCGNController::class, 'destroy'])->name('tcgnElig.destroy');
});


//  Generated Folders TCGNE routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/dossier-generes',            [GenFolderController::class, 'index'])->name('genFolds');
    Route::get('/app/v1/data/dossier-genere/creer',     [GenFolderController::class, 'create'])->name('genFold.create');
    Route::post('/app/v1/data/dossier-genere',           [GenFolderController::class, 'store'])->name('genFold.store');
    Route::get('/app/v1/data/dossier-genere/{genFold}', [GenFolderController::class, 'show'])->name('genFold.show');
    Route::get('/app/v1/data/dossier-genere/{genFold}/editer',[GenFolderController::class, 'edit'])->name('genFold.edit');
    Route::put('/app/v1/data/dossier-genere/{genFold}',     [GenFolderController::class, 'update'])->name('genFold.update');
    Route::delete('/app/v1/data/dossier-genere/{genFold}',  [GenFolderController::class, 'destroy'])->name('genFold.destroy');
});


//  MeterPremeter routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/peremetres-compteurs',            [MeterPremeterController::class, 'index'])->name('premMeters');
    Route::get('/app/v1/data/peremetres-compteur/creer',     [MeterPremeterController::class, 'create'])->name('premMeter.create');
    Route::post('/app/v1/data/peremetres-compteur',           [MeterPremeterController::class, 'store'])->name('premMeter.store');
    Route::get('/app/v1/data/peremetres-compteur/{premMeter}', [MeterPremeterController::class, 'show'])->name('premMeter.show');
    Route::get('/app/v1/data/peremetres-compteur/{premMeter}/editer',[MeterPremeterController::class, 'edit'])->name('premMeter.edit');
    Route::put('/app/v1/data/peremetres-compteur/{premMeter}',     [MeterPremeterController::class, 'update'])->name('premMeter.update');
    Route::delete('/app/v1/data/peremetres-compteur/{premMeter}',  [MeterPremeterController::class, 'destroy'])->name('premMeter.destroy');
});


//  Paramteres routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/parametres',            [ParameterController::class, 'index'])->name('parameters');
    Route::get('/app/v1/data/parametre/creer',     [ParameterController::class, 'create'])->name('parameter.create');
    Route::post('/app/v1/data/parametre',           [ParameterController::class, 'store'])->name('parameter.store');
    Route::get('/app/v1/data/parametre/{parameter}', [ParameterController::class, 'show'])->name('parameter.show');
    Route::get('/app/v1/data/parametre/{parameter}/editer',[ParameterController::class, 'edit'])->name('parameter.edit');
    Route::put('/app/v1/data/parametre/{parameter}',     [ParameterController::class, 'update'])->name('parameter.update');
    Route::delete('/app/v1/data/parametre/{parameter}',  [ParameterController::class, 'destroy'])->name('parameter.destroy');
});



//  Messages routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/messages',            [MessageController::class, 'index'])->name('messages');
    Route::get('/app/v1/data/message/creer',     [MessageController::class, 'create'])->name('message.create');
    Route::post('/app/v1/data/message',           [MessageController::class, 'store'])->name('message.store');
    Route::get('/app/v1/data/message/{message}', [MessageController::class, 'show'])->name('message.show');
    Route::get('/app/v1/data/message/{message}/editer',[MessageController::class, 'edit'])->name('message.edit');
    Route::put('/app/v1/data/message/{message}',     [MessageController::class, 'update'])->name('message.update');
    Route::delete('/app/v1/data/message/{message}',  [MessageController::class, 'destroy'])->name('message.destroy');
});



//  Reduced Tax routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/taux-reduits',            [ReducedTaxBoardController::class, 'index'])->name('taxReds');
    Route::get('/app/v1/data/taux-reduit/creer',     [ReducedTaxBoardController::class, 'create'])->name('taxRed.create');
    Route::post('/app/v1/data/taux-reduit',           [ReducedTaxBoardController::class, 'store'])->name('taxRed.store');
    Route::get('/app/v1/data/taux-reduit/{taxRed}', [ReducedTaxBoardController::class, 'show'])->name('taxRed.show');
    Route::get('/app/v1/data/taux-reduit/{taxRed}/editer',[ReducedTaxBoardController::class, 'edit'])->name('taxRed.edit');
    Route::put('/app/v1/data/taux-reduit/{taxRed}',     [ReducedTaxBoardController::class, 'update'])->name('taxRed.update');
    Route::delete('/app/v1/data/taux-reduit/{taxRed}',  [ReducedTaxBoardController::class, 'destroy'])->name('taxRed.destroy');
});



//  Refund board routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/tableau-remboursements',            [ReducedTaxBoardController::class, 'index'])->name('refundBoards');
    Route::get('/app/v1/data/tableau-remboursement/creer',     [ReducedTaxBoardController::class, 'create'])->name('refundBoard.create');
    Route::post('/app/v1/data/tableau-remboursement',           [ReducedTaxBoardController::class, 'store'])->name('refundBoard.store');
    Route::get('/app/v1/data/tableau-remboursement/{refundBoard}', [ReducedTaxBoardController::class, 'show'])->name('refundBoard.show');
    Route::get('/app/v1/data/tableau-remboursement/{refundBoard}/editer',[ReducedTaxBoardController::class, 'edit'])->name('refundBoard.edit');
    Route::put('/app/v1/data/tableau-remboursement/{refundBoard}',     [ReducedTaxBoardController::class, 'update'])->name('refundBoard.update');
    Route::delete('/app/v1/data/tableau-remboursement/{refundBoard}',  [ReducedTaxBoardController::class, 'destroy'])->name('refundBoard.destroy');
});


//  RefundCSPE routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/remboursement-cspes',            [RefundCSPEController::class, 'index'])->name('refundCspes');
    Route::get('/app/v1/data/remboursement-cspe/creer',     [RefundCSPEController::class, 'create'])->name('refundCspe.create');
    Route::post('/app/v1/data/remboursement-cspe',           [RefundCSPEController::class, 'store'])->name('refundCspe.store');
    Route::get('/app/v1/data/remboursement-cspe/{refundCspe}', [RefundCSPEController::class, 'show'])->name('refundCspe.show');
    Route::get('/app/v1/data/remboursement-cspe/{refundCspe}/editer',[RefundCSPEController::class, 'edit'])->name('refundCspe.edit');
    Route::put('/app/v1/data/remboursement-cspe/{refundCspe}',     [RefundCSPEController::class, 'update'])->name('refundCspe.update');
    Route::delete('/app/v1/data/remboursement-cspe/{refundCspe}',  [RefundCSPEController::class, 'destroy'])->name('refundCspe.destroy');
});

//  Refund TCGN routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/remboursement-tcgns',            [RefundTCGNController::class, 'index'])->name('refundTcgns');
    Route::get('/app/v1/data/remboursement-tcgn/creer',     [RefundTCGNController::class, 'create'])->name('refundTcgn.create');
    Route::post('/app/v1/data/remboursement-tcgn',           [RefundTCGNController::class, 'store'])->name('refundTcgn.store');
    Route::get('/app/v1/data/remboursement-tcgn/{refundTcgn}', [RefundTCGNController::class, 'show'])->name('refundTcgn.show');
    Route::get('/app/v1/data/remboursement-tcgn/{refundTcgn}/editer',[RefundTCGNController::class, 'edit'])->name('refundTcgn.edit');
    Route::put('/app/v1/data/remboursement-tcgn/{refundTcgn}',     [RefundTCGNController::class, 'update'])->name('refundTcgn.update');
    Route::delete('/app/v1/data/remboursement-tcgn/{refundTcgn}',  [RefundTCGNController::class, 'destroy'])->name('refundTcgn.destroy');
});


//  Sites routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/sites',            [SiteController::class, 'index'])->name('sites');
    Route::get('/app/v1/data/site/creer',     [SiteController::class, 'create'])->name('site.create');
    Route::post('/app/v1/data/site',           [SiteController::class, 'store'])->name('site.store');
    Route::get('/app/v1/data/site/{site}', [SiteController::class, 'show'])->name('site.show');
    Route::get('/app/v1/data/site/{site}/editer',[SiteController::class, 'edit'])->name('site.edit');
    Route::put('/app/v1/data/site/{site}',     [SiteController::class, 'update'])->name('site.update');
    Route::delete('/app/v1/data/site/{site}',  [SiteController::class, 'destroy'])->name('message.destroy');
});


//  Studies routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/etudes',            [StudyController::class, 'index'])->name('studies');
    Route::get('/app/v1/data/etude/creer',     [StudyController::class, 'create'])->name('study.create');
    Route::post('/app/v1/data/etude',           [StudyController::class, 'store'])->name('study.store');
    Route::get('/app/v1/data/etude/{etude}', [StudyController::class, 'show'])->name('study.show');
    Route::get('/app/v1/data/etude/{etude}/editer',[StudyController::class, 'edit'])->name('study.edit');
    Route::put('/app/v1/data/etude/{etude}',     [StudyController::class, 'update'])->name('study.update');
    Route::delete('/app/v1/data/etude/{etude}',  [StudyController::class, 'destroy'])->name('study.destroy');
});


//  CEOs routes
Route::middleware(['auth'])->group(function () {
    Route::get('/app/v1/data/dirigeants',            [ResponsibleController::class, 'index'])->name('responsibles');
    Route::get('/app/v1/data/dirigeant/creer',     [ResponsibleController::class, 'create'])->name('responsible.create');
    Route::post('/app/v1/data/dirigeant',           [ResponsibleController::class, 'store'])->name('responsible.store');
    Route::get('/app/v1/data/dirigeant/{dirigeant}', [ResponsibleController::class, 'show'])->name('responsible.show');
    Route::get('/app/v1/data/dirigeant/{dirigeant}/editer',[ResponsibleController::class, 'edit'])->name('responsible.edit');
    Route::put('/app/v1/data/dirigeant/{dirigeant}',     [ResponsibleController::class, 'update'])->name('responsible.update');
    Route::delete('/app/v1/data/dirigeant/{dirigeant}',  [ResponsibleController::class, 'destroy'])->name('responsible.destroy');
});
