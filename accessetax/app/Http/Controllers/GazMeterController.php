<?php

namespace App\Http\Controllers;

use App\Models\GazMeter;
use Illuminate\Http\Request;

class GazMeterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compteursGazs = GazMeter::orderBy('created_at', 'desc')->paginate(10);
        return response(view('pages.Compteurs.Gaz.index', compact('compteursGazs'))->with('status', "liste des compteurs de gaz."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('pages.Compteurs.Gaz.create')->with('status', "vous pouvez créer un nouveau compteur de gaz."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $compteurGaz = GazMeter::create($request->all());
        return response(view('pages.Compteurs.Gaz.show', compact('compteurGaz'))->with('status', "Nouveau compteur de gaz a été ajouté avec succès."));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GazMeter  $gazMeter
     * @return \Illuminate\Http\Response
     */
    public function show(GazMeter $gazMeter)
    {
        $compteurGaz = GazMeter::findOrFail($gazMeter);
        return response(view('pages.Compteurs.Gaz.show', compact('compteurGaz'))->with('status', "Voici les details de ce compteur de gaz."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GazMeter  $gazMeter
     * @return \Illuminate\Http\Response
     */
    public function edit(GazMeter $gazMeter)
    {
        $compteurGaz = GazMeter::findOrFail($gazMeter);
        return response(view('pages.Compteurs.Gaz.edit', compact('compteurGaz'))->with('status', "Vous pouvez commencer la modification de compteur de gaz."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GazMeter  $gazMeter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GazMeter $gazMeter)
    {
        $compteurGaz = GazMeter::findOrFail($gazMeter);

        $compteurGaz->PCE = $request->PCE;
        $compteurGaz->consommation_annuelle = $request->consommation_annuelle;
        $compteurGaz->consommation_mentsauelle = $request->consommation_mentsauelle;
        $compteurGaz->nom_client = $request->nom_client;
        $compteurGaz->nom_contact = $request->nom_contact;
        $compteurGaz->nom_etude = $request->nom_etude;
        $compteurGaz->nom_responsable = $request->nom_responsable;
        $compteurGaz->nom_site = $request->nom_site;
        $compteurGaz->profil = $request->profil;
        $compteurGaz->siret = $request->siret;
        $compteurGaz->site_id = $request->site_id;
        $compteurGaz->tarif = $request->tarif;

        $compteurGaz->save();


        return response(view('pages.Compteurs.Gaz.show', compact('compteurGaz'))->with('status', "Ce compteur de gaz a été modifié avec succès."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GazMeter  $gazMeter
     * @return \Illuminate\Http\Response
     */
    public function destroy(GazMeter $gazMeter)
    {
        $compteurGaz = GazMeter::findOrFail($gazMeter);

        return response(view('pages.Compteurs.Gaz.index')->with('status', "le compteur de gaz a été supprimé avec succès."));
    }
}
