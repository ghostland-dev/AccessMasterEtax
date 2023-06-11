<?php

namespace App\Http\Controllers;

use App\Models\ElecContract;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ElecContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratElecs =  ElecContract::orderBy('created_at', 'desc')->paginate(10);
        return response(view('pages.Contrats.Elec.index', compact('contratElecs')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fournisseurs = Supplier::all();

        return response(view('pages.Contrats.Elec.create', compact('fournisseurs'))->with('status', ""));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contratElec =  new ElecContract;

        $contratElec->date_debut = $request->date_debut;
        $contratElec->date_fin = $request->date_fin;
        $contratElec->date_signature = $request->date_signature;
        $contratElec->fichier = url('storage/' . $request->fichier->store('contractelecs', 'public'));
        $contratElec->fournisseur = $request->fournisseur;
        $contratElec->elec_meter_id = $request->elec_meter_id;
        $contratElec->nom_contrat = $request->nom_contrat;

        $contratElec->save();

        return response(view('pages.Contrats.Elec.show', compact('contratElec'))->with('status', "contrat éléctricité a été crée avec succès"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ElecContract  $elecContract
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contratElec = ElecContract::findOrFail($id);
        return response(view('pages.Contrats.Elec.show', compact('contratElec'))->with('status', "Détails de ce contrat d'éléctricité."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ElecContract  $elecContract
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fournisseurs = Supplier::all();
        $contatElec = ElecContract::findOrFail($id);
        return response(view('pages.Contrats.Elec.edit', compact('contatElec', 'fournisseurs'))->with('status', "contrat d'éléctricité est prêt à être modifié."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ElecContract  $elecContract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contatElec = ElecContract::findOrFail($id);

        if ($request->hasFile('fichier')) {
            // Delete the old file if it exists
            if ($contatElec->fichier && Storage::exists($contatElec->fichier)) {
                Storage::delete($contatElec->fichier);
            }

            // Update the model with the new file path
            $contatElec->fichier = url('storage/' . $request->fichier->store('contractelecs', 'public'));
        }

        $contatElec->date_debut = $request->date_debut;
        $contatElec->date_fin = $request->date_fin;
        $contatElec->date_signature = $request->date_signature;
        $contatElec->elec_meter_id = $request->elec_meter_id;
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
    public function destroy($id)
    {

        $contatElec = ElecContract::findOrFail($id);

        if (ElecContract::exists($contatElec->fichier)) {
            Storage::delete($contatElec->fichier);
        }
        $contatElec->delete();

        return   redirect()->route('contractElecs')->with('status', "contrat d'éléctricité a été supprimé avec succès.");
    }
}
