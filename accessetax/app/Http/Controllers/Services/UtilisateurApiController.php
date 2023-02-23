<?php

namespace App\Http\Controllers\Services;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UtilisateurApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the users
        $Utilisateurs = User::all();
        // Return a collection of $Utilisateurs with pagination
        return response()->json($Utilisateurs);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
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
        // Store the newly created user
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
        // Return a successful response
        return response()->json(['success' => 'Utilisateur'. $Utilisateur->userName.' a été ajouté avec succès.'], 200);
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
        // Return a single user as a resource
        return response()->json($Utilisateur);
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
        // Update the user in storage
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
        // Return a successful response
        return response()->json(['success' => 'Utilisateur'. $Utilisateur->userName.' a été modifié avec succès.'], 200);
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
        // Return a successful response
        return response()->json(['success' => 'Utilisateur'. $Utilisateur->userName.' a été supprimé avec succès.'], 200);
    }
}
