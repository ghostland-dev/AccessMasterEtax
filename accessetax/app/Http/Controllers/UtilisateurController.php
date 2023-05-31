<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UtilisateurController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $visiteurs = User::where( 'role', 'visiteur' )->get();
        $clients = User::where( 'role', 'client' )->get();
        $commerciaux = User::where( 'role', 'commercial' )->get();
        $administrateurs = User::where( 'role', 'adminisrateur' )->get();
        $roles = [ 'visiteur', 'client', 'commercial', 'adminisrateur' ];

        // $response = Http::withoutVerifying()->get( 'https://api.pappers.fr/v2/recherche', [
        //     'precision' => 'standard',
        //     'bases' => 'entreprises,dirigeants,beneficiaires,publications,documents',
        //     'page' => 1,
        //     'par_page' => 2,
        //     'siren' => '000 000 000',
        //     'api_token' => env( 'PAPPERS_API_KEY' ),
        // ] );

        // if ( $response->ok() ) {
        //     $mainData = json_encode( $response->json() );
        // } else {
        //     $mainData = $response->status() ;
        // }

        return response( view( 'pages.utilisateurs.index', compact( 'administrateurs', 'clients', 'commerciaux', 'visiteurs', 'roles' ) )->with( 'status',
        'listes des utilisateurs dans la base de données' ) ) ;
        ;
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        return response( view( 'pages.utilisateurs.create' )->with( 'status',
        'C\'est partie vous pouvez commencer à à créer un nouveau utilisateur. ' ) );;
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        // Create a new user
        $Utilisateur = new User();

        // Assign the request data to the user object
        $Utilisateur->userName  = $request->userName;
        $Utilisateur->firstName = $request->firstName;
        $Utilisateur->lastName  = $request->lastName;
        $Utilisateur->tel       = $request->tel;
        $Utilisateur->fix       = $request->fix;
        $Utilisateur->job       = $request->job;
        $Utilisateur->role      = $request->role;
        $Utilisateur->siren     = $request->siren;
        if ( isset( $request->profile ) ) {
            $Utilisateur->profile   = url('storage/' . $request->profile->store( 'avatars', 'public' ));
        }
        $Utilisateur->email     = $request->email;
        $Utilisateur->password  = $request->password;
        // Save the user
        $Utilisateur->save();
        // Redirect to the users.index view and display message
        return response( redirect()->route( 'utilisateurs' )->with( 'status',
        'Utilisateur'. $Utilisateur->userName.' a été ajouté avec succès.' ) )
        ;
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        // Get the user
        $Utilisateur = User::findOrFail( $id );
        // Return the view and pass in the var we previously created
        return response( view( 'pages.utilisateurs.show', compact( 'Utilisateur' ) )->with( 'status',
        'Utilisateur '. $Utilisateur->userName.' a été trouvée ' ) );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        // Get the user

        $Utilisateur = User::findOrFail( $id );
        // Return the view and pass in the var we previously created
        return response( view( 'pages.utilisateurs.edit', compact( 'Utilisateur' ) )->with( 'status',
        'Vous pouvez commencer à modefier.' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        // Get the user
        $Utilisateur = User::findOrFail( $id );
        $Utilisateur->userName  = $request->userName;
        $Utilisateur->firstName = $request->firstName;
        $Utilisateur->lastName  = $request->lastName;
        $Utilisateur->tel       = $request->tel;
        $Utilisateur->fix       = $request->fix;
        $Utilisateur->job       = $request->job;
        $Utilisateur->role      = $request->role;
        $Utilisateur->siren     = $request->siren;
        if ( isset( $request->profile ) ) {
            $Utilisateur->profile   = url('storage/' . $request->profile->store( 'avatars', 'public' ));
        }
        $Utilisateur->email     = $request->email;
        $Utilisateur->password  = Hash::make( $request->password );

        // Save the user
        $Utilisateur->save();
        // Redirect to the users.index view and display message
        return response( redirect()->route( 'utilisateurs' )->with( 'status',
        'Utilisateur '. $Utilisateur->userName.' a été modifié avec succès.' ) );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {

        // Get the user
        $Utilisateur = User::findOrFail( $id );
        // Delete the user
        $Utilisateur->delete();
        // Redirect to the users.index view and display message
        return response( redirect()->route( 'utilisateurs' )->with( 'status',
        'l\'utilisateur   a été supprimé avec succès.' ) );

    }
}
