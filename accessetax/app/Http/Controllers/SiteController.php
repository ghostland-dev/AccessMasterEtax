<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $sites = Site::all();
        return  response( view( 'pages.Sites.index', compact( 'sites' )  )->with( 'status', 'liste des site disponibles.' ));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        return  response( view( 'pages.Sites.create', compact( 'sites' )   )->with( 'status', 'liste des site disponibles.' ));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $site = Site::create( $request->all() );
        return  response( view( 'pages.Sites.index', compact( 'sites' )  )->with( 'status', 'site a été ajouté avec succès.' ));
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Site  $site
    * @return \Illuminate\Http\Response
    */

    public function show( Site $site ) {
        $site = Site::findOrFail( $site );
        return  response( view( 'pages.Sites.show', compact( 'site' ) )->with( 'status', 'ce site a été retrouvé dans nos enregistrements.' ) );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Site  $site
    * @return \Illuminate\Http\Response
    */

    public function edit( Site $site ) {
        $site = Site::findOrFail( $site );
        return  response( view( 'pages.Sites.edit', compact( 'site' ) )->with( 'status', 'Vous pouvez commencer les modifications.' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Site  $site
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, Site $site ) {
        $site = Site::findOrFail( $site );

        $site->siret = $request->siret;
        $site->email = $request->email;
        $site->tel = $request->tel;
        $site->adresse = $request->adresse;
        $site->ville = $request->ville;
        $site->code_postal = $request->code_postal;
        $site->pays = $request->pays;
        $site->nom = $request->nom;
        $site->fax = $request->fax;
        $site->type = $request->type;
        $site->telephone = $request->telephone;
        $site->consommation_electrcite = $request->consommation_electrcite;
        $site->consommation_gaz = $request->consommation_gaz;
        $site->company_id = $request->company_id;

        $site->save();

        return  response( view( 'pages.Sites.show', compact( 'site' ) )->with( 'status', 'ce site a été retrouvé dans nos enregistrements.' ) );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Site  $site
    * @return \Illuminate\Http\Response
    */

    public function destroy( Site $site ) {
        $site = Site::findOrFail( $site );
        $site->delete();

        return  response( view( 'pages.Sites.index' )->with( 'status', 'le site a été supprimé avec succès.' ) );

    }
}