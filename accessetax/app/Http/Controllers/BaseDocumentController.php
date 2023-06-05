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
        $BaseDoc = new BaseDocument();

        $BaseDoc->cgv_access_anergies = url('storage/' . $request->cgv_access_anergies->store('cgv_access_anergies', 'public'));
        $BaseDoc->rib_entreprise  = url('storage/' . $request->rib_entreprise->store('rib_entreprises', 'public'));
        $BaseDoc->kabis  = url('storage/' . $request->kabis->store('kabis', 'public'));
        $BaseDoc->bilan_comptable_1  = url('storage/' . $request->bilan_comptable_1->store('bilan_comptables', 'public'));
        $BaseDoc->bilan_comptable_2  = url('storage/' . $request->bilan_comptable_2->store('bilan_comptables', 'public'));
        $BaseDoc->annexe_1  = url('storage/' . $request->annexe_1->store('annexes', 'public'));
        $BaseDoc->annexe_2  = url('storage/' . $request->annexe_2->store('annexes', 'public'));
        $BaseDoc->courrier_type  = url('storage/' . $request->courrier_type->store('courrier_types', 'public'));
        $BaseDoc->confirmation_douanaire = url('storage/' . $request->confirmation_douanaire->store('confirmation_douanaires', 'public'));
        $BaseDoc->fichier_entreprise  = url('storage/' . $request->fichier_entreprise->store('fichier_entreprises', 'public'));
        $BaseDoc->valeur_ajoutee   = url('storage/' . $request->valeur_ajoutee->store('valeur_ajoutees', 'public'));
        $BaseDoc->base_folder_id  =  $request->base_folder_id->base_folder_id;

        $BaseDoc->save();

        return response(view('pages.Dossier.Docs.show', compact('BaseDoc'))->with('status', 'les documents de base ont été crées avec succès.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaseDocument  $baseDocument
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $BaseDoc = BaseDocument::findORfail($id);
        return response(view('pages.Dossier.Docs.show', compact('BaseDoc'))->with('status', 'la liste des documents a été trouvé.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaseDocument  $baseDocument
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $BaseDoc = BaseDocument::findORfail($id);

        return response(view('pages.Dossier.Docs.edit', compact('BaseDoc'))->with('status', 'la liste des documents a été trouvé.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaseDocument  $baseDocument
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $BaseDoc = BaseDocument::findORfail($id);

        $BaseDoc->cgv_access_anergies = url('storage/' . $request->cgv_access_anergies->store('cgv_access_anergies', 'public'));
        $BaseDoc->rib_entreprise  = url('storage/' . $request->rib_entreprise->store('rib_entreprises', 'public'));
        $BaseDoc->kabis  = url('storage/' . $request->kabis->store('kabis', 'public'));
        $BaseDoc->bilan_comptable_1  = url('storage/' . $request->bilan_comptable_1->store('bilan_comptables', 'public'));
        $BaseDoc->bilan_comptable_2  = url('storage/' . $request->bilan_comptable_2->store('bilan_comptables', 'public'));
        $BaseDoc->annexe_1  = url('storage/' . $request->annexe_1->store('annexes', 'public'));
        $BaseDoc->annexe_2  = url('storage/' . $request->annexe_2->store('annexes', 'public'));
        $BaseDoc->courrier_type  = url('storage/' . $request->courrier_type->store('courrier_types', 'public'));
        $BaseDoc->confirmation_douanaire = url('storage/' . $request->confirmation_douanaire->store('confirmation_douanaires', 'public'));
        $BaseDoc->fichier_entreprise  = url('storage/' . $request->fichier_entreprise->store('fichier_entreprises', 'public'));
        $BaseDoc->valeur_ajoutee   = url('storage/' . $request->valeur_ajoutee->store('valeur_ajoutees', 'public'));
        $BaseDoc->base_folder_id  =  $request->base_folder_id->base_folder_id;

        $BaseDoc->save();

        return response(view('pages.Dossier.Docs.edit', compact('BaseDoc'))->with('status', 'la liste des documents a été modifié avec succès.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaseDocument  $baseDocument
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $BaseDoc = BaseDocument::findORfail($id);

        $BaseDoc->delete();
        return response(view('pages.Dossier.Docs.index')->with('status', 'liste des documents a été supprimé .'));
    }
}
