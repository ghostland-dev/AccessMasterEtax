<?php

namespace App\Http\Controllers;

use App\Models\GazContract;
use Illuminate\Http\Request;

class GazContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratGazs =  GazContract::all();
        return response(view('pages.Contrats.Gaz.index', compact('contratGazs'))->with('status', "liste des contrat de gaz."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return response(view('pages.Contrats.Gaz.create')->with('status', "vous pouvez ajouter un contrat de gaz."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contratGaz =  GazContract::create($request->all());
        return response(view('pages.Contrats.Gaz.show', compact('contratGaz'))->with('status', "le contrat de gaz a été créé avec succès."));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GazContract  $gazContract
     * @return \Illuminate\Http\Response
     */
    public function show(GazContract $gazContract)
    {
        $contratGaz =  GazContract::findOrFail($gazContract);
        return response(view('pages.Contrats.Gaz.show', compact('contratGaz'))->with('status', "le contrat de gaz a été retoruvé."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GazContract  $gazContract
     * @return \Illuminate\Http\Response
     */
    public function edit(GazContract $gazContract)
    {
        $contratGaz =  GazContract::findOrFail($gazContract);
        return response(view('pages.Contrats.Gaz.edit', compact('contratGaz'))->with('status', "le contrat de gaz est prêt à être modifié."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GazContract  $gazContract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GazContract $gazContract)
    {
        $contratGaz =  GazContract::findOrFail($gazContract);

        $contratGaz->date_debut = $request->date_debut;
        $contratGaz->date_fin = $request->date_fin;
        $contratGaz->date_signature = $request->date_signature;
        $contratGaz->fichier = $request->fichier;
        $contratGaz->fournisseur = $request->fournisseur;
        $contratGaz->gaz_meter_id = $request->gaz_meter_id;
        $contratGaz->nom_contrat = $request->nom_contrat;

        $contratGaz->save();
        return response(view('pages.Contrats.Gaz.show', compact('contratGaz'))->with('status', "le contrat de gaz a été modifié avec succès."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GazContract  $gazContract
     * @return \Illuminate\Http\Response
     */
    public function destroy(GazContract $gazContract)
    {
        $contratGaz =  GazContract::findOrFail($gazContract);

        $contratGaz->delete();

        return response(view('pages.Contrats.Gaz.index')->with('status', "le contrat de gaz a été modifié avec succès."));
    }
}
