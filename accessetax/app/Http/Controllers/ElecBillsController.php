<?php

namespace App\Http\Controllers;

use App\Models\ElecBill;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ElecBillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $FacturesElec = ElecBill::all();
        return  view('pages.Factures.Elec.index', compact('FacturesElec'))->with('status', "liste des factures d'electrcité.");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $fournisseurs = Supplier::query()->where('fournisseur_electrcite', true)->get();

        return  view('pages.Factures.Elec.create', compact('fournisseurs'))->with('status', "vous pouvez ajouter une nouvelle facture d'éléctrcité.");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $FacturesElec = ElecBill::create([
            "nom_facture" => $request->nom_facture,
            "fournisseur" => $request->fournisseur,
            "fichier" =>  url('storage/'. $request->fichier->store('factureGazs', 'public')),
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
            "elec_contract_id" => $request->elec_contract_id
        ]);


        return response(view('pages.Factures.Elec.show', compact('FacturesElec'))->with('status', "la facture d'electrcité a été créé avec succès."));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ElecBills  $elecBills
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $FactureElec = ElecBill::findOrFail($id);
        return response(view('pages.Factures.Elec.show', compact('FactureElec'))->with('status', "Détails de la facture d'éléctrcité."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ElecBills  $elecBills
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $FactureElec = ElecBill::findOrFail($id);
        return response(view('pages.Factures.Elec.edit', compact('FactureElec'))->with('status', "Facture d'éléctrcité prête à être modifié."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ElecBills  $elecBills
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $FacturesElec = ElecBill::findOrFail($id);

        $FacturesElec->annee = $request->annee;
        $FacturesElec->consommation = $request->consommation;
        $FacturesElec->date_debut = $request->date_debut;
        $FacturesElec->date_fin = $request->date_fin;
        $FacturesElec->fichier = url('storage/' . $request->fichier->store('factureElecs', 'public'));
        $FacturesElec->fournisseur = $request->fournisseur;
        $FacturesElec->Elec_contract_id = $request->Elec_contract_id;
        $FacturesElec->nom_facture = $request->nom_facture;
        $FacturesElec->numero_client = $request->numero_client;
        $FacturesElec->numero_compteur = $request->numero_compteur;
        $FacturesElec->numero_contrat = $request->numero_contrat;
        $FacturesElec->numero_etude = $request->numero_etude;
        $FacturesElec->numero_facture = $request->numero_facture;
        $FacturesElec->numero_site = $request->numero_site;
        $FacturesElec->type = $request->type;

        $FacturesElec->save();
        return response(view('pages.Factures.Elec.show', compact('FacturesElec'))->with('status', "."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ElecBills  $elecBills
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $FacturesElec = ElecBill::findOrFail($id);
        return response(view('pages.Factures.Elec.index')->with('status', "."));
    }
}
