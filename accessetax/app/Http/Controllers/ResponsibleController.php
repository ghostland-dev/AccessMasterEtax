<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Responsible;
use Illuminate\Http\Request;

class ResponsibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $responsables = Responsible::all();

        return response(view('pages.Responsables.index', compact('responsables'))->with('status', 'voici la listes des dérigients des societés.'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $entreprises = Company::all();
        return response(view('pages.Responsables.create', compact('entreprises'))->with('status', 'vous pouvez ajouter un nouveau dirigeant ou responsable.'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {


        $responsable = Responsible::create($request->all());
        return response(view('pages.Responsables.show', compact('responsable'))->with('status', 'le dirigeant a été ajouté avec succès.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Responsible  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $responsable = Responsible::findOrFail($id);

        return response(view('pages.Responsables.show', compact('responsable',))->with('status', 'le dirigeant a été trouvé dans les enregistrements.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Responsible  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $entreprises = Company::all();
        $responsable = Responsible::findOrFail($id);
        return response(view('pages.Responsables.edit', compact('responsable', 'entreprises'))->with('status', 'le dirigeant est prêt à être modifier.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Responsible  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $responsable = Responsible::findOrFail($id);

        $responsable->civilite = $request->civilite;
        $responsable->nom_famille = $request->nom_famille;
        $responsable->prenom = $request->prenom;
        $responsable->email = $request->email;
        $responsable->mobile = $request->mobile;
        $responsable->fax = $request->fax;
        $responsable->fonction = $request->fonction;
        $responsable->adresse = $request->adresse;
        $responsable->pays = $request->pays;
        $responsable->code_postal = $request->code_postal;
        $responsable->company_id = $request->company_id;

        $responsable->save();

        return response(view('pages.Responsables.show', compact('responsable'))->with('status', 'le dirigeant a été modifié avec succès.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Responsible  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $responsable = Responsible::findOrFail($id);
        $responsable->delete();


        return redirect()->route("responsibles")->with('status', "le dirigeant a été supprimé avec succès.");
    }
}
