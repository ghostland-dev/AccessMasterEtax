<?php

namespace App\Http\Controllers;

use App\Models\CarbonLique;
use Illuminate\Http\Request;

class CarbonLiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuitesCarbons = CarbonLique::all();

        return response(view('pages.FuitesCarbons.index', compact('fuitesCarbons'))->with('status', "liste des fuites carbons."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('pages.FuitesCarbons.create')->with('status', "ajouter une valeur de fuites carbons."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarbonLiqueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fuiteCarbon = new CarbonLique();

        $fuiteCarbon->nom = $request->nom;
        $fuiteCarbon->code = $request->code;
        $fuiteCarbon->eligible = $request->eligible;

        $fuiteCarbon->save();


        return response(view('pages.FuitesCarbons.show', compact('fuiteCarbon'))->with('status', "les fuites carbons ont été ajouté avec succès."));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarbonLique  $carbonLique
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



        $fuiteCarbon =   CarbonLique::findOrFail($id);
        return response(view('pages.FuitesCarbons.show', compact('fuiteCarbon'))->with('status', "les fuites carbons ont été ajouté avec succès."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarbonLique  $carbonLique
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $fuiteCarbon =   CarbonLique::findOrFail($id);
        return response(view('pages.FuitesCarbons.edit', compact('fuiteCarbon'))->with('status', "Valeur est prêt à être modifié."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarbonLiqueRequest  $request
     * @param  \App\Models\CarbonLique  $carbonLique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $fuiteCarbon =  CarbonLique::findOrFail($id);

        $fuiteCarbon->nom = $request->nom;
        $fuiteCarbon->code = $request->code;
        $fuiteCarbon->eligible = $request->eligible;

        $fuiteCarbon->save();


        return response(view('pages.FuitesCarbons.show', compact('fuiteCarbon'))->with('status', "la fuite carbon a été modifié avec succès."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarbonLique  $carbonLique
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fuite = CarbonLique::findOrFail($id);
        $fuite->delete();
        return   redirect()->route('fuitcarbons')->with('status', "la fuite carbon a été supprimé avec succès.");
    }
}
