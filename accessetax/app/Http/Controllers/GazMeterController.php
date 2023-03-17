<?php

namespace App\Http\Controllers;

use App\Models\GazMeter;
use Illuminate\Http\Request;

class GazMeterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $compteursGazs = GazMeter::all();

        return view('pages.Compteurs.Gaz.index', compact('compteursGazs'));
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
     * @param  \App\Models\GazMeter  $gazMeter
     * @return \Illuminate\Http\Response
     */
    public function show(GazMeter $gazMeter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GazMeter  $gazMeter
     * @return \Illuminate\Http\Response
     */
    public function edit(GazMeter $gazMeter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GazMeter  $gazMeter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GazMeter $gazMeter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GazMeter  $gazMeter
     * @return \Illuminate\Http\Response
     */
    public function destroy(GazMeter $gazMeter)
    {
        //
    }
}