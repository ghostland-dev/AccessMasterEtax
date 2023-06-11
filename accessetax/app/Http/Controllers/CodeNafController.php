<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CodeNaf;

class CodeNafController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codenafs = CodeNaf::orderBy('created_at', 'desc')->paginate(10);

        return response(view('pages.CodeNafs.index', compact('codenafs')));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liste()
    {
        $codenafs = CodeNaf::all();

        return response(view("pages.CodeNafs.index", compact('codenafs'))->with('status', "liste des codes NAFs."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view("pages.CodeNafs.create")->with('status', "liste des codes NAFs."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $codenaf = new CodeNaf();
        $codenaf->code_naf =  $request->code_naf;
        $codenaf->libelle_naf =   $request->libelle_naf;
        $codenaf->eligible =   $request->eligible;
        $codenaf->save();
        return response(view("pages.CodeNafs.show", compact('codenaf'))->with('status', "liste des codes NAFs."));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $codenaf = CodeNaf::findOrFail($id);
        return response(view("pages.CodeNafs.show", compact('codenaf'))->with('status', "liste des codes NAFs."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $codenaf = CodeNaf::findOrFail($id);
        return response(view("pages.CodeNafs.edit", compact('codenaf'))->with('status', "Codes NAF est prêt à être modifié."));
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
        $codenaf = new CodeNaf();
        $codenaf->code_naf =  $request->code_naf;
        $codenaf->libelle_naf =   $request->libelle_naf;
        $codenaf->eligible =   $request->eligible;
        $codenaf->save();
        return response(view("pages.CodeNafs.show", compact('codenaf'))->with('status', "liste des codes NAFs."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $codenaf = CodeNaf::findOrFail($id);
        $codenaf->delete();
        return redirect()->route('codesNafs')->with('status', "code NAF a été supprimé avec succès.");    }
}
