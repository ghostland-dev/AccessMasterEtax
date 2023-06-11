<?php

namespace App\Http\Controllers;

use App\Models\ReducedTaxBoard;
use Illuminate\Http\Request;

class ReducedTaxBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TauxReduits = ReducedTaxBoard::orderBy('created_at', 'desc')->paginate(10);

        return response(view('pages.TauxReduits.index', compact('TauxReduits'))->with('status', "tableau des taux réduits a été retrouvé."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('pages.TauxReduits.create')->with('status', "vous pouvez à présent, ajouter une nouvelle valeur."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ReducedTaxBoard::create($request->all());
        return redirect()->route("taxReds")->with('status', "les valeurs a été supprimé avec succès..");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReducedTaxBoard  $reducedTaxBoard
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $TauxReduit = ReducedTaxBoard::findOrFail($id);
        return response(view('pages.TauxReduits.show', compact('TauxReduit'))->with('status', "vous pouvez désormais visialiser les détails de ce tableau."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReducedTaxBoard  $reducedTaxBoard
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $TauxReduit = ReducedTaxBoard::findOrFail($id);
        return response(view('pages.TauxReduits.edit', compact('TauxReduit'))->with('status', "vous pouvez commencer l'edition de ce tableau."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReducedTaxBoard  $reducedTaxBoard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $TauxReduit = ReducedTaxBoard::findOrFail($id);

        $TauxReduit->consommation_mkw = $request->consommation_mkw;
        $TauxReduit->remuneration = $request->remuneration;
        $TauxReduit->titre = $request->titre;

        $TauxReduit->save();
        return response(view('pages.TauxReduits.show', compact('TauxReduit'))->with('status', "ce tableau a été modifié avec succès."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReducedTaxBoard  $reducedTaxBoard
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $TauxReduit = ReducedTaxBoard::findOrFail($id);

        $TauxReduit->delete();

        return redirect()->route("taxReds")->with('status', "les valeurs a été supprimé avec succès..");
    }
}
