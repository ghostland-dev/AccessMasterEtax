<?php

namespace App\Http\Controllers;

use App\Models\MeterPremeter;
use Illuminate\Http\Request;

class MeterPremeterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Piremetrecompteurs = MeterPremeter::all();
        return response(view('pages.Perimetres.index', compact('Piremetrecompteurs'))->with('status', "liste des perimetres."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('pages.Perimetres.create')->with('status', "vous pouvez commencer la création  d'un piremetre."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Piremetrecompteur = MeterPremeter::create($request->all());
        return response(view('pages.Perimetres.show', compact('Piremetrecompteur'))->with('status', "le piremetre a été crée avec succès."));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeterPremeter  $meterPremeter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Piremetrecompteur = MeterPremeter::findOrFail($id);
        return response(view('pages.Perimetres.show', compact('Piremetrecompteur'))->with('status', "le piremetre a été retrouvé dans nos enregistrements."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MeterPremeter  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Piremetrecompteur = MeterPremeter::findOrFail($id);
        return response(view('pages.Perimetres.edit', compact('Piremetrecompteur'))->with('status', "le piremetre est prêt à être modifié."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MeterPremeter  $meterPremeter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Piremetrecompteur = MeterPremeter::findOrFail($id);

        $Piremetrecompteur->compteur_c4  = $request->compteur_c4;
        $Piremetrecompteur->compteur_c5  = $request->compteur_c5;
        $Piremetrecompteur->compteur_hta = $request->compteur_hta;
        $Piremetrecompteur->compteur_t2  = $request->compteur_t2;
        $Piremetrecompteur->compteur_t3  = $request->compteur_t3;
        $Piremetrecompteur->compteur_t4  = $request->compteur_t4;
        $Piremetrecompteur->company_id   = $request->company_id;

        $Piremetrecompteur->save();
        return response(view('pages.Perimetres.show', compact('Piremetrecompteur'))->with('status', "le piremetre a été modifié avec succès."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeterPremeter  $meterPremeter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Piremetrecompteur = MeterPremeter::findOrFail($id);
        $Piremetrecompteur->delete();


        return redirect()->route("premMeters")->with('status', "le piremetre a été supprimé avec succès..");
    }
}
