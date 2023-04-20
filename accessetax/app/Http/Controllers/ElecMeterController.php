<?php

namespace App\Http\Controllers;

use App\Models\ElecMeter;
use Illuminate\Http\Request;

class ElecMeterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compteursElecs = ElecMeter::all();

        return response(view('pages.Compteurs.Elec.index', compact('compteursElecs'))->with('status', "liste des compteurs d'éléctrcité"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('pages.Compteurs.Elec.create')->with('status', "Ajouter un nouveau compteur et assigné le à un site."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compteurElec = ElecMeter::create($request->all());
        return response(view('pages.Compteurs.Elec.show', compact('compteurElec'))->with('status', "le compteur a été créé et assigné le à un site avec succès."));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ElecMeter  $elecMeter
     * @return \Illuminate\Http\Response
     */
    public function show(ElecMeter $elecMeter)
    {
        $compteurElec = ElecMeter::findOrFail($elecMeter);
        return response(view('pages.Compteurs.Elec.show', compact('compteurElec'))->with('status', "Voici les détails de ce compteur d'electrcité."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ElecMeter  $elecMeter
     * @return \Illuminate\Http\Response
     */
    public function edit(ElecMeter $elecMeter)
    {
        $compteurElec = ElecMeter::findOrFail($elecMeter);
        return response(view('pages.Compteurs.Elec.edit', compact('compteurElec'))->with('status', "vous pouvez commencer désormais à modifier ce compteur."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ElecMeter  $elecMeter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ElecMeter $elecMeter)
    {
        $compteurElec = ElecMeter::findOrFail($elecMeter);

        $compteurElec->annee = $request->annee;
        $compteurElec->consommation = $request->consommation;
        $compteurElec->fournisseur = $request->fournisseur;
        $compteurElec->nom_compteur = $request->nom_compteur;
        $compteurElec->numero_client = $request->numero_client;
        $compteurElec->numero_contrat = $request->numero_contrat;
        $compteurElec->numero_etude = $request->numero_etude;
        $compteurElec->nom_site = $request->nom_site;
        $compteurElec->PDL = $request->PDL;
        $compteurElec->profile = $request->profile;
        $compteurElec->puissance = $request->puissance;
        $compteurElec->site_id = $request->site_id;


        $compteurElec->save();

        return response(view('pages.Compteurs.Elec.show', compact('compteurElec'))->with('status', "vous pouvez commencer désormais à modifier ce compteur."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ElecMeter  $elecMeter
     * @return \Illuminate\Http\Response
     */
    public function destroy(ElecMeter $elecMeter)
    {
        $compteurElec = ElecMeter::findOrFail($elecMeter);

        return response(view('pages.Compteurs.Elec.index')->with('status', "le compteur a été supprimé avec succès."));
    }
}
