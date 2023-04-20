<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Http\Request;

class StudyController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $etudes = Study::all();

        return response( view( 'pages.Etudes.index', compact( 'etudes' )  )->with( 'status', 'liste des etudes' ));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        return response( view( 'pages.Etudes.create'  )->with( 'status', 'vous pouvez commencer la création d\'un etude ' ));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
         return response( view( 'pages.Etudes.index' )->with( 'status', " l'etude a été créé avec succès." ));
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Study  $study
    * @return \Illuminate\Http\Response
    */

    public function show( Study $study ) {
        $etude = Study::findOrFail($study);

         return response( view( 'pages.Etudes.show', compact('etude') )->with( 'status', 'Voici les détails de l\'etude.' ));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Study  $study
    * @return \Illuminate\Http\Response
    */

    public function edit( Study $study ) {
        $etude = Study::findOrFail($study);

         return response( view( 'pages.Etudes.edit',compact('etude') )->with( 'status', 'Voici les détails de l\'etude.' ));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Study  $study
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, Study $study ) {

        $etude = Study::findOrFail($study);

        $etude->nom_client = $request->nom_client;
        $etude->nom_contact = $request->nom_contact;
        $etude->date_debut = $request->date_debut;
        $etude->date_fin = $request->date_fin;
        $etude->nom_etude = $request->nom_etude;
        $etude->nom_responsable = $request->nom_responsable;
        $etude->site_id = $request->site_id;

        $etude->save();

         return response( view( 'pages.Etudes.show', compact('etude'))->with( 'status', 'Voici les détails de l\'etude.' ));
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Study  $study
    * @return \Illuminate\Http\Response
    */

    public function destroy( Study $study ) {
         $etude = Study::findOrFail($study);

         return response( view( 'pages.Etudes.index') ->with( 'status', "l'etude a été supprimé avec succès." ));
    }
}