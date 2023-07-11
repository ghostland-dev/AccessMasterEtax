<?php

namespace App\Http\Controllers;

use App\Models\Alerte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'administrateur') {
            $clients = User::where('role', 'client')->get();
            $visiteurs = User::where('role', 'visiteur')->get();
        } else {

            $clients = User::where('owner_id', $user->id)->where('role', 'client')->get();
            $visiteurs = User::where('owner_id', $user->id)->where('role', 'visiteur')->get();
        }

        $roles = ['visiteur', 'client'];


        return view('pages.Clients.index', compact('clients', 'visiteurs', 'roles'))->with('status', 'Liste des clients.');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return response(view('pages.Clients.create')->with('status', 'Vous pouvez ajouter un nouveau client. '));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $client = new User();

        $client->userName =  $request->userName;
        $client->firstName = $request->firstName;
        $client->lastName   = $request->lastName;
        $client->tel  = $request->tel;
        $client->fix  = $request->fix;
        $client->job  = $request->job;
        $client->role  =  $request->role;
        $client->siren  = $request->siren;
        $client->profile  = $request->profile->store('avatars', 'public');
        $client->email  = $request->email;

        $client->save();
        return response(view('pages.Clients.index', compact('client'))->with('status', 'Vous pouvez ajouter un nouveau client. '));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $client = User::findOrFail($id);
        return response(view('pages.Clients.show', compact('client'))->with('status', 'nous avons trouvé le client  concerné. '));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $client = User::findOrFail($id);
        return response(view('pages.Clients.edit', compact('client'))->with('status', 'vous pouvez commencer à modifié. '));
    }
    public function upgrade($id)
    {
        $user  = Auth::user();
        $client = User::findOrFail($id);
        $client->role = 'client';
        $client->save();

        $message = new Alerte();
        $message->nom_alerte = "Qualification de prospect $client->userName ";
        $message->description_alerte = " le prospect porteur du numéro SIREN $client->userName a été qualifié par l'agent $user->nom $user->prenom. ";
        $message->type_alerte = "information";
        $message->statut_alerte = "nouveau";
        $message->study_id = 1;
        $message->save();


        return redirect()->route('clients')->with('status', 'le prospect a été qualifié avec succès. ');
    }
    public function downgrade($id)
    {
        $user  = Auth::user();
        $client = User::findOrFail($id);
        $client->role = 'visiteur';
        $client->save();

        $message = new Alerte();
        $message->nom_alerte = "Dsiqualification de prospect $client->userName ";
        $message->description_alerte = " le prospect porteur du numéro SIREN $client->userName a été disqualifié par l'agent $user->nom $user->prenom. ";
        $message->type_alerte = "important";
        $message->statut_alerte = "nouveau";
        $message->study_id = 1;
        $message->save();


        return redirect()->route('clients')->with('status', 'le prospect a été disqualifié avec succès. ');
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
        $client = User::findOrFail($id);

        $client->userName =  $request->userName;
        $client->firstName = $request->firstName;
        $client->lastName   = $request->lastName;
        $client->tel  = $request->tel;
        $client->fix  = $request->fix;
        $client->job  = $request->job;
        $client->role  =  $request->role;
        $client->siren  = $request->siren;
        $client->profile  = $request->profile->store('avatars', 'public');
        $client->email  = $request->email;

        $client->save();
        return response(view('pages.Clients.show', compact('client'))->with('status', 'le client a été modifié avec succès. '));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $client = User::findOrFail($id);
        $client->delete();
        return response(view('pages.Clients.index')->with('status', 'le client a été supprimé avec succès. '));
    }
}
