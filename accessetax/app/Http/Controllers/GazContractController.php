<?php

namespace App\Http\Controllers;

use App\Models\GazContract;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GazContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratGazs =  GazContract::orderBy('created_at', 'desc')->paginate(10);
        return response(view('pages.Contrats.Gaz.index', compact('contratGazs'))->with('status', "liste des contrat de gaz."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fournisseurs = Supplier::all();

        return response(view('pages.Contrats.Gaz.create', compact('fournisseurs'))->with('status', "vous pouvez ajouter un contrat de gaz."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contratGaz =  new GazContract;

        $contratGaz->date_debut = $request->date_debut;
        $contratGaz->date_fin = $request->date_fin;
        $contratGaz->date_signature = $request->date_signature;
        $contratGaz->fichier = url('storage/' . $request->fichier->store('contractgazs', 'public'));
        $contratGaz->fournisseur = $request->fournisseur;
        $contratGaz->gaz_meter_id = $request->gaz_meter_id;
        $contratGaz->nom_contrat = $request->nom_contrat;

        $contratGaz->save();
        return response(view('pages.Contrats.Gaz.show', compact('contratGaz'))->with('status', "le contrat de gaz a été créé avec succès."));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GazContract  $gazContract
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contratGaz =  GazContract::findOrFail($id);
        return response(view('pages.Contrats.Gaz.show', compact('contratGaz'))->with('status', "le contrat de gaz a été retoruvé."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GazContract  $gazContract
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fournisseurs = Supplier::all();
        $contratGaz =  GazContract::findOrFail($id);
        return response(view('pages.Contrats.Gaz.edit', compact('contratGaz', 'fournisseurs'))->with('status', "le contrat de gaz est prêt à être modifié."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GazContract  $gazContract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contratGaz =  GazContract::findOrFail($id);


        if ($request->hasFile('fichier')) {
            // Delete the old file if it exists
            if ($contratGaz->fichier && Storage::exists($contratGaz->fichier)) {
                Storage::delete($contratGaz->fichier);
            }

            // Update the model with the new file path
            $contratGaz->fichier = url('storage/' . $request->fichier->store('contractgazs', 'public'));
        }

        $contratGaz->date_debut = $request->date_debut;
        $contratGaz->date_fin = $request->date_fin;
        $contratGaz->date_signature = $request->date_signature;
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
    public function destroy($id)
    {
        $contatGaz = GazContract::findOrFail($id);

        if (GazContract::exists($contatGaz->fichier)) {
            Storage::delete($contatGaz->fichier);
        }
        $contatGaz->delete();

        return   redirect()->route('contractGazs')->with('status', "contrat de gaz a été supprimé avec succès.");
    }
}
