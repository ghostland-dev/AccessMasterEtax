<?php

namespace App\Http\Controllers;

use App\Models\CarbonLique;
use App\Http\Requests\StoreCarbonLiqueRequest;
use App\Http\Requests\UpdateCarbonLiqueRequest;

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

        return response( view('pages.FuitesCarbons.index', compact('fuitesCarbons'))->with('status',"liste des fuites carbons."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response( view('pages.FuitesCarbons.create')->with('status',"ajouter une valeur de fuites carbons."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarbonLiqueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarbonLiqueRequest $request)
    {
          $fuitesCarbon = new CarbonLique();
          
          $fuitesCarbon->nom = $request->nom;
          $fuitesCarbon->code = $request->code;
          $fuitesCarbon->eligible = $request->eligible;
 
          $fuitesCarbon->save();


        return response( view('pages.FuitesCarbons.show', compact('fuitesCarbon'))->with('status',"les fuites carbons ont été ajouté avec succès."));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarbonLique  $carbonLique
     * @return \Illuminate\Http\Response
     */
    public function show(CarbonLique $carbonLique)
    {
        $fuitesCarbon =   CarbonLique::findOrFail($carbonLique);
        return response( view('pages.FuitesCarbons.show', compact('fuitesCarbon'))->with('status',"les fuites carbons ont été ajouté avec succès."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarbonLique  $carbonLique
     * @return \Illuminate\Http\Response
     */
    public function edit(CarbonLique $carbonLique)
    {
        $fuitesCarbon =   CarbonLique::findOrFail($carbonLique);
        return response( view('pages.FuitesCarbons.edit', compact('fuitesCarbon'))->with('status',"Valeur est prêt à être modifié."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarbonLiqueRequest  $request
     * @param  \App\Models\CarbonLique  $carbonLique
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarbonLiqueRequest $request, CarbonLique $carbonLique)
    {
          $fuitesCarbon =  CarbonLique::findOrFail($carbonLique);
          
          $fuitesCarbon->nom = $request->nom;
          $fuitesCarbon->code = $request->code;
          $fuitesCarbon->eligible = $request->eligible;
 
          $fuitesCarbon->save();


        return response( view('pages.FuitesCarbons.show', compact('fuitesCarbon'))->with('status',"la fuite carbon a été modifié avec succès."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarbonLique  $carbonLique
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarbonLique $carbonLique)
    {
        return response( view('pages.FuitesCarbons.index')->with('status',"la fuite carbon a été supprimé avec succès."));
    }
}
