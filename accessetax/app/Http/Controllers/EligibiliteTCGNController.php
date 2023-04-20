<?php

namespace App\Http\Controllers;

use App\Models\EligibiliteTCGN;
use Illuminate\Http\Request;
use App\Models\ActivityCode;

class EligibiliteTCGNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $codeNaces = EligibiliteTCGN::all();

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function CheckTICGN(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EligibiliteTCGN  $eligibiliteTCGN
     * @return \Illuminate\Http\Response
     */

    public function show(EligibiliteTCGN $eligibiliteTCGN)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EligibiliteTCGN  $eligibiliteTCGN
     * @return \Illuminate\Http\Response
     */

    public function edit(EligibiliteTCGN $eligibiliteTCGN)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EligibiliteTCGN  $eligibiliteTCGN
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, EligibiliteTCGN $eligibiliteTCGN)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EligibiliteTCGN  $eligibiliteTCGN
     * @return \Illuminate\Http\Response
     */

    public function destroy(EligibiliteTCGN $eligibiliteTCGN)
    {
        //
    }
}
