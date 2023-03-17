<?php

namespace App\Http\Controllers;

use App\Models\BaseFolder;
use Illuminate\Http\Request;

class BaseFolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DossierBases = BaseFolder::all();
        return view('pages.DossierBases.index', compact('DossierBases'));
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
     * @param  \App\Models\BaseFolder  $baseFolder
     * @return \Illuminate\Http\Response
     */
    public function show(BaseFolder $baseFolder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaseFolder  $baseFolder
     * @return \Illuminate\Http\Response
     */
    public function edit(BaseFolder $baseFolder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaseFolder  $baseFolder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaseFolder $baseFolder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaseFolder  $baseFolder
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaseFolder $baseFolder)
    {
        //
    }
}
