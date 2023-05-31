<?php

namespace App\Http\Controllers;

use App\Models\ElecContract;
use Illuminate\Http\Request;

class ElecContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratElecs =  ElecContract::all();
        return response(view('pages.Contrats.Elec.index', compact('contratElecs')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return response(view('pages.Contrats.Elec.create')->with('status', ""));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contatElec = ElecContract::create($request->all());
        return response(view('pages.Contrats.Elec.show', compact('contatElec'))->with('status', "contrat éléctricité a été crée avec succès"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ElecContract  $elecContract
     * @return \Illuminate\Http\Response
     */
    public function show(ElecContract $elecContract)
    {
        $contatElec = ElecContract::findOrFail($elecContract);
        return response(view('pages.Contrats.Elec.show', compact('contatElec'))->with('status', "Détails de ce contrat d'éléctricité."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ElecContract  $elecContract
     * @return \Illuminate\Http\Response
     */
    public function edit(ElecContract $elecContract)
    {
        $contatElec = ElecContract::findOrFail($elecContract);
        return response(view('pages.Contrats.Elec.show', compact('contatElec'))->with('status', "contrat d'éléctricité est prêt à être modifié."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ElecContract  $elecContract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ElecContract $elecContract)
    {
        $contatElec = ElecContract::findOrFail($elecContract);

        $contatElec->date_debut = $request->date_debut;
        $contatElec->date_fin = $request->date_fin;
        $contatElec->date_signature = $request->date_signature;
        $contatElec->elec_meter_id = $request->elec_meter_id;
        $contatElec->fichier = $request->fichier->store('ContratGazs', 'public');
        $contatElec->fournisseur = $request->fournisseur;
        $contatElec->nom_contrat = $request->nom_contrat;

        $contatElec->save();
        return response(view('pages.Contrats.Elec.show', compact('contatElec'))->with('status', "contrat d'éléctricité  a été modifié avec succès."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ElecContract  $elecContract
     * @return \Illuminate\Http\Response
     */
    public function destroy(ElecContract $elecContract)
    {
        $contatElec = ElecContract::findOrFail($elecContract);
        return response(view('pages.Contrats.Elec.index')->with('status', "contrat d'éléctricité  a été supprimé avec succès."));
    }
}
