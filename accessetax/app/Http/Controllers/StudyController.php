<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Study;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $etudes = Study::orderBy('created_at', 'desc')->paginate(10);

        return response(view('pages.Etudes.index', compact('etudes'))->with('status', 'liste des etudes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $sites = Site::all();
        return  view('pages.Etudes.create', compact('sites'))->with('status', 'vous pouvez commencer la création d\'un etude ');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $etude = new Study();

        $etude->nom_client = $request->nom_client;
        $etude->nom_contact = $request->nom_contact;
        $etude->date_debut = $request->date_debut;
        $etude->date_fin = $request->date_fin;
        $etude->nom_etude = $request->nom_etude;
        $etude->nom_responsable = $request->nom_responsable;
        $etude->site_id = $request->site_id;

        $etude->save();
        return  view('pages.Etudes.show', compact('etude'))->with('status', " l'etude a été créé avec succès.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $etude = Study::findOrFail($id);

        return response(view('pages.Etudes.show', compact('etude'))->with('status', 'Voici les détails de l\'etude.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $etude = Study::findOrFail($id);

        return response(view('pages.Etudes.edit', compact('etude'))->with('status', 'Voici les détails de l\'etude.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $etude = Study::findOrFail($id);

        $etude->nom_client = $request->nom_client;
        $etude->nom_contact = $request->nom_contact;
        $etude->date_debut = $request->date_debut;
        $etude->date_fin = $request->date_fin;
        $etude->nom_etude = $request->nom_etude;
        $etude->nom_responsable = $request->nom_responsable;
        $etude->site_id = $request->site_id;

        $etude->save();

        return response(view('pages.Etudes.show', compact('etude'))->with('status', 'Voici les détails de l\'etude.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $etude = Study::findOrFail($id);
        $etude->delete();

        return redirect()->route('studies')->with('status', "l'etude a été supprimé avec succès.");
    }
}
