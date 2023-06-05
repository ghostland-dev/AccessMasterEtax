<?php

namespace App\Http\Controllers;

use App\Models\GazBill;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class GazBillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $FactureGazs = GazBill::all();
        return response(view('pages.Factures.Gaz.index', compact('FactureGazs'))->with('status', "liste des factures de de gaz a été retouvé."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $fournisseurs = Supplier::query()->where('fournisseur_electrcite', true)->get();
        return response(view('pages.Factures.Gaz.create', compact('fournisseurs'))->with('status', "vous pouvez ajouter une nouvelle facture."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {


        // Chemin vers le fichier PDF

        // $file = $request->fichier;



        // $pdfParser = new Parser();
        // $pdf = $pdfParser->parseFile($file->path());
        // $content = json_encode(explode('\n', $pdf->getText()));

        // dd($content);



        $FactureGaz = GazBill::create([
            "nom_facture" => $request->nom_facture,
            "fournisseur" => $request->fournisseur,
            "fichier" =>    url('storage/' .  $request->fichier->store('facturegazs', 'public')),
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
        return response(view('pages.Factures.Gaz.show', compact('FactureGaz'))->with('status', "la facture de gaz a été ajouter avec succès."));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GazBill  $gazBill
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $FactureGaz = GazBill::findOrFail($id);
        return response(view('pages.Factures.Gaz.show', compact('FactureGaz'))->with('status', "visualiser les détails de cette facture."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GazBill  $gazBill
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $FactureGaz = GazBill::findOrFail($id);
        return response(view('pages.Factures.Gaz.edit', compact('FactureGaz'))->with('status', "la facture est prête pour les modifications."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GazBill  $gazBill
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $FactureGaz = GazBill::findOrFail($id);


        if ($request->hasFile('fichier')) {
            // Delete the old file if it exists
            if ($FactureGaz->fichier && Storage::exists($FactureGaz->fichier)) {
                Storage::delete($FactureGaz->fichier);
            }

            // Update the model with the new file path
            $FactureGaz->fichier = url('storage/'. $request->fichier->store('facturegazs', 'public'));
        }


        $FactureGaz->annee = $request->annee;
        $FactureGaz->consommation = $request->consommation;
        $FactureGaz->date_debut = $request->date_debut;
        $FactureGaz->date_fin = $request->date_fin;
        $FactureGaz->fournisseur = $request->fournisseur;
        $FactureGaz->gaz_contract_id = $request->gaz_contract_id;
        $FactureGaz->nom_facture = $request->nom_facture;
        $FactureGaz->numero_client = $request->numero_client;
        $FactureGaz->numero_compteur = $request->numero_compteur;
        $FactureGaz->numero_contrat = $request->numero_contrat;
        $FactureGaz->numero_etude = $request->numero_etude;
        $FactureGaz->numero_facture = $request->numero_facture;
        $FactureGaz->numero_site = $request->numero_site;
        $FactureGaz->type = $request->type;

        $FactureGaz->save();

        return response(view('pages.Factures.Gaz.show', compact('FactureGaz'))->with('status', "les modifications ont été executer avec succès."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GazBill  $gazBill
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $FactureGaz = GazBill::findOrFail($id);
        if ($FactureGaz->fichier) {
            Storage::delete($FactureGaz->fichier);
        }

        $FactureGaz->delete();

        return redirect()->route('billGazs')->with('status', "la facture a été supprimé avec succès.");
    }
}
