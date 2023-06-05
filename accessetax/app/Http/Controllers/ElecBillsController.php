<?php

namespace App\Http\Controllers;

use App\Models\ElecBill;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ElecBillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $FacturesElec = ElecBill::paginate(10);
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

        $FactureElec = ElecBill::create([
            "nom_facture" => $request->nom_facture,
            "fournisseur" => $request->fournisseur,
            "fichier" =>  url('storage/'. $request->fichier->store('factureelecs', 'public')),
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


        return view('pages.Factures.Elec.show', compact('FactureElec'))->with('status', "la facture d'electrcité a été créé avec succès.");
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
        return   view('pages.Factures.Elec.show', compact('FactureElec'))->with('status', "Détails de la facture d'éléctrcité.");
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
        return  view('pages.Factures.Elec.edit', compact('FactureElec'))->with('status', "Facture d'éléctrcité prête à être modifié.");
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
        $FactureElec = ElecBill::findOrFail($id);

        if ($request->hasFile('fichier')) {
            // Delete the old file if it exists
            if ($FactureElec->fichier && Storage::exists($FactureElec->fichier)) {
                Storage::delete($FactureElec->fichier);
            }

            // Update the model with the new file path
            $FactureElec->fichier = url('storage/' . $request->fichier->store('factureelecs', 'public'));
        }


        $FactureElec->annee = $request->annee;
        $FactureElec->consommation = $request->consommation;
        $FactureElec->date_debut = $request->date_debut;
        $FactureElec->date_fin = $request->date_fin;
        $FactureElec->fournisseur = $request->fournisseur;
        $FactureElec->Elec_contract_id = $request->Elec_contract_id;
        $FactureElec->nom_facture = $request->nom_facture;
        $FactureElec->numero_client = $request->numero_client;
        $FactureElec->numero_compteur = $request->numero_compteur;
        $FactureElec->numero_contrat = $request->numero_contrat;
        $FactureElec->numero_etude = $request->numero_etude;
        $FactureElec->numero_facture = $request->numero_facture;
        $FactureElec->numero_site = $request->numero_site;
        $FactureElec->type = $request->type;
        $FactureElec->elec_contract_id = $request->elec_contract_id;

        $FactureElec->save();
        return response(view('pages.Factures.Elec.show', compact('FactureElec'))->with('status', "."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ElecBills  $elecBills
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $FactureElec = ElecBill::findOrFail($id);

        if (ElecBill::exists($FactureElec->fichier)) {
            Storage::delete($FactureElec->fichier);
        }
        $FactureElec->delete();

        return   redirect()->route('billsElecs')->with('status', "la facture a été supprimé avec succès.");
    }
}
