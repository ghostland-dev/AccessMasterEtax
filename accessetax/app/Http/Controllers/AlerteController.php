<?php

namespace App\Http\Controllers;

use App\Models\Alerte;
use Illuminate\Http\Request;

class AlerteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $alertes = Alerte::all();
        return response(view('pages.Alertes.index', compact('alertes'))->with('status', 'listes des alerte disponibles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return response(view('pages.Alertes.create')->with('status', 'Commencez à créer un alerte.'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $alerte = Alerte::create($request->all());

        return response(view('pages.Alertes.create', compact('alerte'))->with('status', 'vous pouvez commencer à créer votre alerte'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alerte  $alerte
     * @return \Illuminate\Http\Response
     */

    public function show(Alerte $alerte)
    {

        $alerte = Alerte::findOrFail($alerte);
        return response(view('pages.Alertes.show', compact('alerte'))->with('status', 'nous avons trouvé cet alerte dans nos enregistrements.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alerte  $alerte
     * @return \Illuminate\Http\Response
     */

    public function edit(Alerte $alerte)
    {
        $alerte = Alerte::findOrFail($alerte);
        return response(view('pages.Alertes.edit', compact('alerte'))->with('status', "l'alerte est prêt à être modifié."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alerte  $alerte
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Alerte $alerte)
    {
        $alerte = Alerte::findOrFail($alerte);

        $alerte->nom_alerte = $request->nom_alerte;
        $alerte->description_alerte = $request->description_alerte;
        $alerte->study_id = $request->study_id;
        $alerte->type_alerte = $request->type_alerte;

        $alerte->save();

        return response(view('pages.Alertes.edit', compact('alerte'))->with('status', "l'alerte est prêt à être modifié."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alerte  $alerte
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $notif = Alerte::findOrFail($id);

        $notif->delete();
        // Redirect to the users.index view and display message
        return  response(view('pages.Alertes.index')->with(
            'status',
            'Alerte a été supprimé avec succès.'
        ));
    }
}