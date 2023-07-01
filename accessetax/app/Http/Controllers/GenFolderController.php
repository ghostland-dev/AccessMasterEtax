<?php

namespace App\Http\Controllers;

use App\Models\BaseFolder;
use App\Models\GenFolder;
use Illuminate\Http\Request;

class GenFolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $DossierGens = GenFolder::orderBy('created_at', 'desc')->paginate(10);
        return  view('pages.Dossier.Gen.index', compact('DossierGens'))->with('status', 'liste des dossiers générés.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $DossiersBase = BaseFolder::all();
        return  view('pages.Dossier.Gen.create', compact('DossiersBase'))->with('status', 'vous pouvez générer votre dossier.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        return view('pages.Dossier.Gen.index')->with('status', 'Dossier générer avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GenFolder  $genFolder
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $DossierGen = GenFolder::findOrFail($id);


        return  view('pages.Dossier.Docs.show', compact('DossierGen'))->with('status', 'le dossier a été retrouvé dans nos enregistrements.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GenFolder  $genFolder
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $DossierGen = GenFolder::findOrFail($id);

        $DossiersBase = BaseFolder::all();
        return  view('pages.Dossier.Gen.edit', compact('DossierGen', 'DossiersBase'))->with('status', 'le dossier est prêt a être modifié.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GenFolder  $genFolder
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $DossierGen = GenFolder::findOrFail($id);

        $DossierGen->attestation_non_rembourse = $request->attestation_non_rembourse->store('dossierGeneres', 'public');
        $DossierGen->contrat_de_prestation = $request->contrat_de_prestation->store('dossierGeneres', 'public');
        $DossierGen->courrier_cerfa = $request->courrier_cerfa->store('dossierGeneres', 'public');
        $DossierGen->pouvoir_jdmp = $request->pouvoir_jdmp->store('dossierGeneres', 'public');
        $DossierGen->demande_rembourse = $request->demande_rembourse->store('dossierGeneres', 'public');
        $DossierGen->jdmp_cerfa_14317_07 = $request->jdmp_cerfa_14317_07->store('dossierGeneres', 'public');
        $DossierGen->jdmp_cerfa_14318_08 = $request->jdmp_cerfa_14318_08->store('dossierGeneres', 'public');
        $DossierGen->jdmp_cerfa_14319 = $request->jdmp_cerfa_14319->store('dossierGeneres', 'public');
        $DossierGen->jdmp_cerfa_14700_03 = $request->jdmp_cerfa_14700_03->store('dossierGeneres', 'public');
        $DossierGen->jdmp_pouvoir_ae = $request->jdmp_pouvoir_ae->store('dossierGeneres', 'public');
        $DossierGen->attestation_non_rembourse = $request->attestation_non_rembourse->store('dossierGeneres', 'public');
        $DossierGen->base_folder_id = $request->base_folder_id;

        $DossierGen->save();
        return response(view('pages.Dossier.Gen.show', compact('DossierGen')))->with('status', 'le dossier est prêt a être modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GenFolder  $genFolder
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $DossierGen = GenFolder::findOrFail($id);
        $DossierGen->delete();

        return response(view('pages.DossierGens.index'))->with('status', 'le dossier a été supprimé avec succès.');
    }
}
