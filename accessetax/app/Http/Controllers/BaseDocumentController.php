<?php

namespace App\Http\Controllers;

use App\Models\BaseDocument;
use Illuminate\Http\Request;

class BaseDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseDocuments = BaseDocument::all();
        return view('pages.Dossier.Base.index',compact('baseDocuments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaseDocument  $baseDocument
     * @return \Illuminate\Http\Response
     */
    public function show(BaseDocument $baseDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaseDocument  $baseDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(BaseDocument $baseDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaseDocument  $baseDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaseDocument $baseDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaseDocument  $baseDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaseDocument $baseDocument)
    {
        //
    }
}