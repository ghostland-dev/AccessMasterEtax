<?php

namespace App\Http\Controllers;

use App\Models\BaseDocument;
use Illuminate\Http\Request;

class BaseDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $baseDocuments = BaseDocument::all();
        return response(view('pages.Dossier.Docs.index', compact('baseDocuments'))->with('status', 'liste des dossiers de base'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return response(view('pages.Dossier.Docs.create')->with('status', 'un dossier a été crée avec succès.'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $DocsBase = new BaseDocument();

        $DocsBase->cgv_access_anergies = url('storage/' . $request->cgv_access_anergies->store('cgv_access_anergies', 'public'));
        $DocsBase->rib_entreprise  = url('storage/' . $request->rib_entreprise->store('rib_entreprises', 'public'));
        $DocsBase->kabis  = url('storage/' . $request->kabis->store('kabis', 'public'));
        $DocsBase->bilan_comptable_1  = url('storage/' . $request->bilan_comptable_1->store('bilan_comptables', 'public'));
        $DocsBase->bilan_comptable_2  = url('storage/' . $request->bilan_comptable_2->store('bilan_comptables', 'public'));
        $DocsBase->annexe_1  = url('storage/' . $request->annexe_1->store('annexes', 'public'));
        $DocsBase->annexe_2  = url('storage/' . $request->annexe_2->store('annexes', 'public'));
        $DocsBase->courrier_type  = url('storage/' . $request->courrier_type->store('courrier_types', 'public'));
        $DocsBase->confirmation_douanaire = url('storage/' . $request->confirmation_douanaire->store('confirmation_douanaires', 'public'));
        $DocsBase->fichier_entreprise  = url('storage/' . $request->fichier_entreprise->store('fichier_entreprises', 'public'));
        $DocsBase->valeur_ajoutee   = url('storage/' . $request->valeur_ajoutee->store('valeur_ajoutees', 'public'));
        $DocsBase->base_folder_id  =  $request->base_folder_id->base_folder_id;

        $DocsBase->save();

        return response(view('pages.Dossier.Docs.show', compact('DocsBase'))->with('status', 'les documents de base ont été crées avec succès.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaseDocument  $baseDocument
     * @return \Illuminate\Http\Response
     */

    public function show(BaseDocument $baseDocument)
    {
        $DocsBase = BaseDocument::findORfail($baseDocument);
        return response(view('pages.Dossier.Docs.show', compact('DocsBase'))->with('status', 'la liste des documents a été trouvé.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaseDocument  $baseDocument
     * @return \Illuminate\Http\Response
     */

    public function edit(BaseDocument $baseDocument)
    {
        $DocsBase = BaseDocument::findORfail($baseDocument);

        return response(view('pages.Dossier.Docs.edit', compact('DocsBase'))->with('status', 'la liste des documents a été trouvé.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaseDocument  $baseDocument
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, BaseDocument $baseDocument)
    {
        $DocsBase = BaseDocument::findORfail($baseDocument);

        $DocsBase->cgv_access_anergies = url('storage/' . $request->cgv_access_anergies->store('cgv_access_anergies', 'public'));
        $DocsBase->rib_entreprise  = url('storage/' . $request->rib_entreprise->store('rib_entreprises', 'public'));
        $DocsBase->kabis  = url('storage/' . $request->kabis->store('kabis', 'public'));
        $DocsBase->bilan_comptable_1  = url('storage/' . $request->bilan_comptable_1->store('bilan_comptables', 'public'));
        $DocsBase->bilan_comptable_2  = url('storage/' . $request->bilan_comptable_2->store('bilan_comptables', 'public'));
        $DocsBase->annexe_1  = url('storage/' . $request->annexe_1->store('annexes', 'public'));
        $DocsBase->annexe_2  = url('storage/' . $request->annexe_2->store('annexes', 'public'));
        $DocsBase->courrier_type  = url('storage/' . $request->courrier_type->store('courrier_types', 'public'));
        $DocsBase->confirmation_douanaire = url('storage/' . $request->confirmation_douanaire->store('confirmation_douanaires', 'public'));
        $DocsBase->fichier_entreprise  = url('storage/' . $request->fichier_entreprise->store('fichier_entreprises', 'public'));
        $DocsBase->valeur_ajoutee   = url('storage/' . $request->valeur_ajoutee->store('valeur_ajoutees', 'public'));
        $DocsBase->base_folder_id  =  $request->base_folder_id->base_folder_id;

        $DocsBase->save();

        return response(view('pages.Dossier.Docs.edit', compact('DocsBase'))->with('status', 'la liste des documents a été modifié avec succès.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaseDocument  $baseDocument
     * @return \Illuminate\Http\Response
     */

    public function destroy(BaseDocument $baseDocument)
    {
        $DocsBase = BaseDocument::findORfail($baseDocument);

        $DocsBase->delete();
        return response(view('pages.Dossier.Docs.index')->with('status', 'liste des documents a été supprimé .'));
    }
}
