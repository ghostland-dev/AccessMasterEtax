<?php

namespace App\Http\Controllers;

use App\Models\ElecContract;
use Illuminate\Http\Request;

class ElecContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratElecs =  ElecContract::all();

        return response(view('pages.Contrats.Elec.index', compact('contratElecs')));
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
     * @param  \App\Models\ElecContract  $elecContract
     * @return \Illuminate\Http\Response
     */
    public function show(ElecContract $elecContract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ElecContract  $elecContract
     * @return \Illuminate\Http\Response
     */
    public function edit(ElecContract $elecContract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ElecContract  $elecContract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ElecContract $elecContract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ElecContract  $elecContract
     * @return \Illuminate\Http\Response
     */
    public function destroy(ElecContract $elecContract)
    {
        //
    }
}
