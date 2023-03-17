<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $Utilisateurs = User::all();
        return view('pages.utilisateurs.index', compact('Utilisateurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.utilisateurs.create');
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
        $Utilisateur->profile   = $request->profile;
        $Utilisateur->email     = $request->email;
        $Utilisateur->password  = $request->password;
        // Save the user
        $Utilisateur->save();
        // Redirect to the users.index view and display message
        return redirect()->route('utilisateurs.index')
            ->with('success',
             'Utilisateur'. $Utilisateur->userName.' a été ajouté avec succès.');
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
        return view('utilisateurs.show', compact('Utilisateur'));
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
        return view('utilisateurs.edit', compact('Utilisateur'));
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
        $Utilisateur->profile   = $request->profile->store('avatars', 'public');
        $Utilisateur->email     = $request->email;
        $Utilisateur->password  = Hash::make($request->password);

        // Save the user
        $Utilisateur->save();
        // Redirect to the users.index view and display message
        return redirect()->route('utilisateurs.index')
            ->with('success',
             'Utilisateur'. $Utilisateur->userName.' a été modifié avec succès.');
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
        return redirect()->route('utilisateurs.index')
            ->with('success',
             'Utilisateur'. $Utilisateur->userName.' a été supprimé avec succès.');
             
    }
}