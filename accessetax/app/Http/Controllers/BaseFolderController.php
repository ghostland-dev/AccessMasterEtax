<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\BaseFolder;


class BaseFolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $DossierBases = BaseFolder::all();
        return view('pages.Dossier.Base.index', compact('DossierBases'))->with('status', 'le dossier est prêt a être modifié.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return  response(view('pages.Dossier.Base.create')->with('status', 'vous pouvez commencer la création de dossier de base..'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $DossierBase = new BaseFolder();

        $DossierBase->numero_dossier = $request->numero_dossier;
        $DossierBase->statut_dossier = $request->statut_dossier;
        $DossierBase->nom_dossier = $request->nom_dossier;
        $DossierBase->nom_client = $request->nom_client;
        $DossierBase->study_id = $request->study_id;

        $DossierBase->save();

        return  view('pages.Dossier.Base.show', compact('DossierBase'))->with('status', 'vous pouvez commencer la création de dossier de base..');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaseFolder  $baseFolder
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $DossierBase = BaseFolder::findOrFail($id);

        view('pages.Dossier.Base.show', compact('DossierBase'))->with('status', 'vous pouvez consulter le dossier de base..');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaseFolder  $baseFolder
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $DossierBase = BaseFolder::findOrFail($id);

        view('pages.Dossier.Base.edit', compact('DossierBase'))->with('status', 'vous pouvez commencer à modifier le dossier de base..');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaseFolder  $baseFolder
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $DossierBase = BaseFolder::findOrFail($id);

        $DossierBase->numero_dossier = $request->numero_dossier;
        $DossierBase->statut_dossier = $request->statut_dossier;
        $DossierBase->nom_dossier = $request->nom_dossier;
        $DossierBase->nom_client = $request->nom_client;
        $DossierBase->study_id = $request->study_id;

        $DossierBase->save();

        return  view('pages.Dossier.Base.show', compact('DossierBase'))->with('status', 'vous pouvez consulter le dossier de base..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaseFolder  $baseFolder
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $DossierBase = BaseFolder::findOrFail($id);
        $DossierBase->delete();


        return redirect()->route('baseFolers')->with('status', " dossier de base a été supprimé avec succès.");
    }
}
