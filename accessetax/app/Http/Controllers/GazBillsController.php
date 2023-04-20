<?php

namespace App\Http\Controllers;

use App\Models\GazBill;
use Illuminate\Http\Request;

class GazBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $FacturesGazs = GazBill::all();
        return response(view('pages.Factures.Gaz.index', compact('FacturesGazs'))->with('status', "liste des factures de de gaz a été retouvé."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return response(view('pages.Factures.Gaz.create')->with('status', "vous pouvez ajouter une nouvelle facture."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $FacturesGaz = GazBill::create([
            "nom_facture" => $request->nom_facture,
            "fournisseur" => $request->fournisseur,
            "fichier" =>     $request->fichier->store('factureGazs', 'public'),
            "type" => $request->type,
            "date_debut" => $request->date_debut,
            "date_fin" => $request->date_fin,
            "numero_facture" => $request->numero_facture,
            "numero_contrat" => $request->numero_contrat,
            "numero_compteur" => $request->numero_compteur,
            "numero_client" => $request->numero_client,
            "numero_site" => $request->numero_site,
            "numero_etude" => $request->numero_etude,
            "consommation" => $request->consommation,
            "annee" => $request->annee,
            "gaz_contract_id" => $request->gaz_contract_id
        ]);
        return response(view('pages.Factures.Gaz.show', compact('FacturesGaz'))->with('status', "la facture de gaz a été ajouter avec succès."));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GazBill  $gazBill
     * @return \Illuminate\Http\Response
     */

    public function show(GazBill $gazBill)
    {
        $FacturesGaz = GazBill::findOrFail($gazBill);
        return response(view('pages.Factures.Gaz.show', compact('FacturesGaz'))->with('status', "visualiser les détails de cette facture."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GazBill  $gazBill
     * @return \Illuminate\Http\Response
     */

    public function edit(GazBill $gazBill)
    {
        $FacturesGaz = GazBill::findOrFail($gazBill);
        return response(view('pages.Factures.Gaz.edit', compact('FacturesGaz'))->with('status', "la facture est prête pour les modifications."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GazBill  $gazBill
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, GazBill $gazBill)
    {
        $FacturesGaz = GazBill::findOrFail($gazBill);

        $FacturesGaz->annee = $request->annee;
        $FacturesGaz->consommation = $request->consommation;
        $FacturesGaz->date_debut = $request->date_debut;
        $FacturesGaz->date_fin = $request->date_fin;
        $FacturesGaz->fichier = $request->fichier->store('factureGazs', 'public');
        $FacturesGaz->fournisseur = $request->fournisseur;
        $FacturesGaz->gaz_contract_id = $request->gaz_contract_id;
        $FacturesGaz->nom_facture = $request->nom_facture;
        $FacturesGaz->numero_client = $request->numero_client;
        $FacturesGaz->numero_compteur = $request->numero_compteur;
        $FacturesGaz->numero_contrat = $request->numero_contrat;
        $FacturesGaz->numero_etude = $request->numero_etude;
        $FacturesGaz->numero_facture = $request->numero_facture;
        $FacturesGaz->numero_site = $request->numero_site;
        $FacturesGaz->type = $request->type;

        $FacturesGaz->save();

        return response(view('pages.Factures.Gaz.show', compact('FacturesGaz'))->with('status', "les modifications ont été executer avec succès."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GazBill  $gazBill
     * @return \Illuminate\Http\Response
     */

    public function destroy(GazBill $gazBill)
    {
        $FacturesGaz = GazBill::findOrFail($gazBill);

        $FacturesGaz->delete();

        return response(view('pages.Factures.Gaz.index')->with('status', "la facture a été supprimé avec succès."));
    }
}
