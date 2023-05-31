<?php

namespace App\Http\Controllers;

use App\Models\CouncilOffice;
use Illuminate\Http\Request;

class CouncilOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Douanes = CouncilOffice::all();
        return response(view('pages.Douanes.index', compact('Douanes'))->with('status', "liste des bureaux douanaires."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('pages.Douanes.create')->with('status', "vous pouvez ajouter un nouveau bureau des douanes."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Douanes = CouncilOffice::create($request->all());
        return response(view('pages.Douanes.show', compact('Douanes'))->with('status', "un nouveau bureaux douanaire a été créé avec succès."));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $douane = CouncilOffice::findOrFail($id);
        return response(view('pages.Douanes.show', compact('douane'))->with('status', "Détails de bureau douanaire."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $douane = CouncilOffice::findOrFail($id);
        return response(view('pages.Douanes.edit', compact('douane'))->with('status', "vous pouvez commencer à modifier le bureau douanaire."));
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
        $douane = CouncilOffice::findOrFail($id);

        $douane->council_office_address = $request->council_office_address;
        $douane->council_office_name = $request->council_office_name;
        $douane->nic_code = $request->nic_code;

        $douane->save();

        return response(view('pages.Douanes.show', compact('douane'))->with('status', "le bureau douanaire a été modifié avec succès."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Douane = CouncilOffice::findOrFail($id);
        $Douane->delete();

        return redirect()->route('douanes')->with('status', "Bureau des douanes a été supprimé avec succès.");
    }
}
