<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityCode;

class ActivityCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $codeActivites = ActivityCode::orderBy('created_at', 'desc')->paginate(10);

        return response(view('pages.CodeActivites.index', compact('codeActivites'))->with('status', "liste des codes d'activités"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return response(view('pages.CodeActivites.create')->with('status', "vous pouvez ajouter un nouveau code d'activité."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        ActivityCode::create($request->all());


        return redirect(route("activityCodes"))->with('status', "code d'activité a été creé avec succès.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $codeActivite = ActivityCode::findOrFail($id);


        return response(view('pages.CodeActivites.show', compact('codeActivite'))->with('status', "code d'activité a été créé avec succès."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $codeActivite = ActivityCode::findOrFail($id);
        return response(view('pages.CodeActivites.edit', compact('codeActivite'))->with('status', "code d'activité est prêt à être modfié."));
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

        $codeActivite = ActivityCode::findOrFail($id);

        $codeActivite->code_nace = $request->code_nace;
        $codeActivite->code_naf = $request->code_naf;
        $codeActivite->libelle_nace = $request->libelle_nace;
        $codeActivite->libelle_naf = $request->libelle_naf;

        $codeActivite->save();

        return view('pages.CodeActivites.show', compact('codeActivite'))->with('status', "code d'activité est prêt à être modfié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $codeActivite = ActivityCode::findOrFail($id);
        $codeActivite->delete();
        return redirect()->route('activityCodes')->with('status', "code d'activité a été supprimé avec succès.");
    }
}
