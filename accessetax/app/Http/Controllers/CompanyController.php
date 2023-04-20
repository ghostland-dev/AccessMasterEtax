<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $entreprises = Company::all();

        return response( view( 'pages.Entreprises.index', compact( 'entreprises' ) ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {

        return response( view( 'pages.Entreprises.create' )  ->with( 'status', 'vous pouvez commencer à ajouter vos raisons sociales.' ));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {

        $societe = Company::create( $request->all() );
        return response( view( 'pages.Entreprises.index' ) ->with( 'status', 'la societé a été entregistré avec succès.') );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {

        $societe = Company::findOrFail( $id );
        return response( view( 'pages.Entreprises.show', compact( 'societe' )   )->with( 'status', 'la societé a été trouvé dans nos enregisrements' ));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {

        $societe = Company::findOrFail( $id );
        return response( view( 'pages.Entreprises.edit', compact( 'societe' )   )->with( 'status', 'la societé est prête à être modifié' ));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {

        $societe = Company::findOrFail( $id );

        $societe->denomenation = $request->denomenation;
        $societe->siren = $request->siren;
        $societe->siret = $request->siret;
        $societe->forme_juridique = $request->forme_juridique;
        $societe->forme_juridique_code = $request->forme_juridique_code;
        $societe->capital = $request->capital;
        $societe->effectif = $request->effectif;
        $societe->nb_dirigents = $request->nb_dirigents;
        $societe->categorie_juridique = $request->categorie_juridique;
        $societe->adresse = $request->adresse;
        $societe->date_immatriculation = $request->date_immatriculation;
        $societe->date_immatriculation_rcs = $request->date_immatriculation_rcs;
        $societe->user_id = $request->user_id;

        $societe->save();

        return response( view( 'pages.Entreprises.show', compact( 'societe' )  )->with( 'status', 'la societé a été modifié avec succès.' ));
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        $societe = Company::findOrFail( $id );
        $societe->delete();
        return response( view( 'pages.Entreprises.show', compact( 'societe' )   )->with( 'status', 'la societé a été supprimédd avec succès.' ));
    }
}
