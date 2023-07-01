<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $visiteurs = User::where('role', 'visiteur')->orderBy('created_at', 'desc')->get();
        $clients = User::where('role', 'client')->orderBy('created_at', 'desc')->get();
        $commerciaux = User::where('role', 'commercial')->orderBy('created_at', 'desc')->get();
        $administrateurs = User::where('role', 'administrateur')->orderBy('created_at', 'desc')->get();
        $roles = ['visiteur', 'client', 'commercial', 'administrateur'];


        return response(view('pages.utilisateurs.index', compact('administrateurs', 'clients', 'commerciaux', 'visiteurs', 'roles'))->with(
            'status',
            'listes des utilisateurs dans la base de données'
        ));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function list()
    {
        $id = Auth::user()->id;
        $visiteurs = User::where('role', 'visiteur')->andWhere('owner_id', $id)->orderBy('created_at', 'desc')->get();
        $clients = User::where('role', 'client')->andWhere('owner_id', $id)->orderBy('created_at', 'desc')->get();
        $roles = ['visiteur', 'client'];


        return view('pages.utilisateurs.index', compact('clients',   'visiteurs', 'roles'))->with(
            'status',
            'listes des utilisateurs dans la base de données'
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return response(view('pages.utilisateurs.create')->with(
            'status',
            'C\'est partie vous pouvez commencer à à créer un nouveau utilisateur. '
        ));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
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
        if (isset($request->profile)) {
            $Utilisateur->profile   = url('storage/' . $request->profile->store('avatars', 'public'));
        }
        $Utilisateur->email     = $request->email;
        $Utilisateur->password  = $request->password;
        $Utilisateur->owner_id  = Auth::user()->id;
        // Save the user
        $Utilisateur->save();
        // Redirect to the users.index view and display message
        return response(redirect()->route('utilisateurs')->with(
            'status',
            'Utilisateur' . $Utilisateur->userName . ' a été ajouté avec succès.'
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        // Get the user
        $Utilisateur = User::findOrFail($id);
        // Return the view and pass in the var we previously created
        return response(view('pages.utilisateurs.show', compact('Utilisateur'))->with(
            'status',
            'Utilisateur ' . $Utilisateur->userName . ' a été trouvée '
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        // Get the user

        $Utilisateur = User::findOrFail($id);
        // Return the view and pass in the var we previously created
        return response(view('pages.utilisateurs.edit', compact('Utilisateur'))->with(
            'status',
            'Vous pouvez commencer à modefier.'
        ));
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
        // Get the user
        $Utilisateur = User::findOrFail($id);
        $Utilisateur->userName  = $request->userName;
        $Utilisateur->firstName = $request->firstName;
        $Utilisateur->lastName  = $request->lastName;
        $Utilisateur->tel       = $request->tel;
        $Utilisateur->fix       = $request->fix;
        $Utilisateur->job       = $request->job;
        $Utilisateur->role      = $request->role;
        $Utilisateur->siren     = $request->siren;
        if (isset($request->profile)) {
            $Utilisateur->profile   = url('storage/' . $request->profile->store('avatars', 'public'));
        }
        $Utilisateur->email     = $request->email;
        $Utilisateur->password  = Hash::make($request->password);
        $Utilisateur->owner_id  = Auth::user()->id;

        // Save the user
        $Utilisateur->save();
        // Redirect to the users.index view and display message
        return response(redirect()->route('utilisateurs')->with(
            'status',
            'Utilisateur ' . $Utilisateur->userName . ' a été modifié avec succès.'
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        // Get the user
        $Utilisateur = User::findOrFail($id);
        // Delete the user
        $Utilisateur->delete();
        // Redirect to the users.index view and display message
        return response(redirect()->route('utilisateurs')->with(
            'status',
            'l\'utilisateur   a été supprimé avec succès.'
        ));
    }
}