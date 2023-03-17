<?php

namespace App\Http\Controllers;

use App\Models\GazContract;
use Illuminate\Http\Request;

class GazContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $contratGazs =  GazContract::all();

        return view('pages.Contrats.Gaz.index', compact('contratGazs'));
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
     * @param  \App\Models\GazContract  $gazContract
     * @return \Illuminate\Http\Response
     */
    public function show(GazContract $gazContract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GazContract  $gazContract
     * @return \Illuminate\Http\Response
     */
    public function edit(GazContract $gazContract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GazContract  $gazContract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GazContract $gazContract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GazContract  $gazContract
     * @return \Illuminate\Http\Response
     */
    public function destroy(GazContract $gazContract)
    {
        //
    }
}