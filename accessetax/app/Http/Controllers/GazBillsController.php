<?php

namespace App\Http\Controllers;

use App\Models\GazBill;
use Illuminate\Http\Request;

class GazBillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $FacturesGaz = GazBill::all();
        return response(view('pages.Factures.Gaz.index', compact('FacturesGaz'))->with('status', "liste des facture de de gaz a été retouvé."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return response(view('pages.Factures.Gaz.create')->with('status', "."));
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
     * @param  \App\Models\GazBills  $gazBills
     * @return \Illuminate\Http\Response
     */

    public function show(GazBills $gazBills)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GazBills  $gazBills
     * @return \Illuminate\Http\Response
     */

    public function edit(GazBills $gazBills)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GazBills  $gazBills
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, GazBills $gazBills)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GazBills  $gazBills
     * @return \Illuminate\Http\Response
     */

    public function destroy(GazBills $gazBills)
    {
        //
    }
}
