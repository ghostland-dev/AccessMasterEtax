<?php

namespace App\Http\Controllers;

use App\Models\BaseDocument;
use Illuminate\Http\Request;

class BaseDocumentController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $baseDocuments = BaseDocument::all();
        return response( view( 'pages.Dossier.Base.index', compact( 'baseDocuments' )   )->with( 'status', 'liste des dossiers de base'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        return response( view( 'pages.Dossier.Base.create' )->with( 'status', 'un dossier a été crée avec succès.' ));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $DocsBase = new BaseDocument() ;

        $DocsBase->cgv_access_anergies = $request->cgv_access_anergies->store('documentsBase','public');
        $DocsBase->rib_entreprise  = $request->rib_entreprise->store('documentsBase','public');
        $DocsBase->kabis  = $request->kabis->store('documentsBase','public');
        $DocsBase->bilan_comptable_1  = $request->bilan_comptable_1->store('documentsBase','public');
        $DocsBase->bilan_comptable_2  = $request->bilan_comptable_2->store('documentsBase','public');
        $DocsBase->annexe_1  = $request->annexe_1->store('documentsBase','public');
        $DocsBase->annexe_2  = $request->annexe_2->store('documentsBase','public');
        $DocsBase->courrier_type  = $request->courrier_type->store('documentsBase','public');
        $DocsBase->confirmation_douanaire = $request->confirmation_douanaire->store('documentsBase','public');
        $DocsBase->fichier_entreprise  = $request->fichier_entreprise->store('documentsBase','public');
        $DocsBase->valeur_ajoutee   = $request->valeur_ajoutee->store('documentsBase','public');
        $DocsBase->base_folder_id  = $request->base_folder_id->store('documentsBase','public');

        $DocsBase->save();

        return response(view('pages.Dossier.Base.show' ,compact('DocsBase'))->with('status', 'les documents de base ont été crées avec succès.'));
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\BaseDocument  $baseDocument
    * @return \Illuminate\Http\Response
    */

    public function show( BaseDocument $baseDocument ) {
        $DocsBase = BaseDocument::findORfail($baseDocument);
        return response(view('pages.Dossier.Base.show', compact('DocsBase'))->with('status', 'la liste des documents a été trouvé.'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\BaseDocument  $baseDocument
    * @return \Illuminate\Http\Response
    */

    public function edit( BaseDocument $baseDocument ) {
        $DocsBase = BaseDocument::findORfail($baseDocument);
         
        return response(view('pages.Dossier.Base.edit', compact('DocsBase'))->with('status', 'la liste des documents a été trouvé.'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\BaseDocument  $baseDocument
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, BaseDocument $baseDocument ) {
        $DocsBase = BaseDocument::findORfail($baseDocument);

        $DocsBase->cgv_access_anergies = $request->cgv_access_anergies->store('documentsBase','public');
        $DocsBase->rib_entreprise  = $request->rib_entreprise->store('documentsBase','public');
        $DocsBase->kabis  = $request->kabis->store('documentsBase','public');
        $DocsBase->bilan_comptable_1  = $request->bilan_comptable_1->store('documentsBase','public');
        $DocsBase->bilan_comptable_2  = $request->bilan_comptable_2->store('documentsBase','public');
        $DocsBase->annexe_1  = $request->annexe_1->store('documentsBase','public');
        $DocsBase->annexe_2  = $request->annexe_2->store('documentsBase','public');
        $DocsBase->courrier_type  = $request->courrier_type->store('documentsBase','public');
        $DocsBase->confirmation_douanaire = $request->confirmation_douanaire->store('documentsBase','public');
        $DocsBase->fichier_entreprise  = $request->fichier_entreprise->store('documentsBase','public');
        $DocsBase->valeur_ajoutee   = $request->valeur_ajoutee->store('documentsBase','public');
        $DocsBase->base_folder_id  = $request->base_folder_id->store('documentsBase','public');

        $DocsBase->save();

        return response(view('pages.Dossier.Base.edit', compact('DocsBase'))->with('status', 'la liste des documents a été modifié avec succès.'));
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\BaseDocument  $baseDocument
    * @return \Illuminate\Http\Response
    */

    public function destroy( BaseDocument $baseDocument ) {
         $DocsBase = BaseDocument::findORfail($baseDocument);

         $DocsBase->delete();
         return response(view('pages.Dossier.Base.index')->with('status', 'liste des documents a été supprimé .'));
    }
}