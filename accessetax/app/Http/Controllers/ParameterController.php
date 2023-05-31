<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;


class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paramatres = Parameter::all();

        return response(view('pages.Configurations.Parametres.index', compact('paramatres'))->with('status', "liste des parametres de l'application."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('pages.Configurations.Parametres.create')->with('status', "vous pouvez créer désormais un nouvea paramtres."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parametre = Parameter::create($request->all());
        return response(view('pages.Configurations.Parametres.show', compact('parametre'))->with('status', "votre pramatre a été crée avec succès."));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parametre = Parameter::findOrFail($id);
        return response(view('pages.Configurations.Parametres.show', compact('parametre'))->with('status', "votre pramatre a été retrouvé."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parametre = Parameter::findOrFail($id);
        return response(view('pages.Configurations.Parametres.edit', compact('parametre'))->with('status', "le pramatre est prêt à être modifié."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parametre = Parameter::findOrFail($id);

        $parametre->cspe = $request->cspe;
        $parametre->tcgn = $request->tcgn;

        $parametre->save();
        return response(view('pages.Configurations.Parametres.show', compact('parametre'))->with('status', "le pramatre a été modifié avec succès."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parametre = Parameter::findOrFail($id);
        $parametre->delete();

        return response(view('pages.Configurations.Parametres.index')->with('status', "le pramatre a été supprimé avec succès."));
    }
}
