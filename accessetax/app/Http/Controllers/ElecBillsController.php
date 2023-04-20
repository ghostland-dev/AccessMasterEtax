<?php

namespace App\Http\Controllers;

use App\Models\ElecBill;
use Illuminate\Http\Request;

class ElecBillsController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $FacturesElec = ElecBill::all();

        return view( 'pages.Factures.Elec.index', compact('FacturesElec') );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\ElecBills  $elecBills
    * @return \Illuminate\Http\Response
    */

    public function show( ElecBills $elecBills ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\ElecBills  $elecBills
    * @return \Illuminate\Http\Response
    */

    public function edit( ElecBills $elecBills ) {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\ElecBills  $elecBills
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, ElecBills $elecBills ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\ElecBills  $elecBills
    * @return \Illuminate\Http\Response
    */

    public function destroy( ElecBills $elecBills ) {
        //
    }
}