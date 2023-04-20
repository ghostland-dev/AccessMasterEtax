<?php

namespace App\Http\Controllers;

use App\Models\RefundCSPE;
use Illuminate\Http\Request;

class RefundCSPEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remboursementCSPEs = RefundCSPE::all();

        return response(view('pages.Remboursements.CSPE.index', compact('remboursementCSPEs'))->with("status", "Listes des tableau de remboursement CSPE."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('pages.Remboursements.CSPE.create')->with("status", "vous pouvez commence la modification de tableau"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $remboursementCSPE = RefundCSPE::create($request->all());

        return response(view('pages.Remboursements.CSPE.show', compact('remboursementCSPE'))->with("status", "le teableau de remboursement CSPE a été crée avec succès"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefundCSPE  $refundCSPE
     * @return \Illuminate\Http\Response
     */
    public function show(RefundCSPE $refundCSPE)
    {

        $remboursementCSPE = RefundCSPE::findOrFail($refundCSPE);
        return response(view('pages.Remboursements.CSPE.show', compact('remboursementCSPE'))->with("status", "le teableau de remboursement CSPE a été retrouvé."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RefundCSPE  $refundCSPE
     * @return \Illuminate\Http\Response
     */
    public function edit(RefundCSPE $refundCSPE)
    {
        $remboursementCSPE = RefundCSPE::findOrFail($refundCSPE);
        return response(view('pages.Remboursements.CSPE.edit', compact('remboursementCSPE'))->with("status", "vous pouvez commencer les modification sur ce teableau de remboursement CSPE ."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RefundCSPE  $refundCSPE
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefundCSPE $refundCSPE)
    {
        $remboursementCSPE = RefundCSPE::findOrFail($refundCSPE);

        $remboursementCSPE->siren = $request->siren;
        $remboursementCSPE->unite = $request->unite;
        $remboursementCSPE->veleur_ajoutee = $request->veleur_ajoutee;
        $remboursementCSPE->siren = $request->siren;
        $remboursementCSPE->annee = $request->annee;
        $remboursementCSPE->car = $request->car;
        $remboursementCSPE->code_naf = $request->code_naf;
        $remboursementCSPE->elegibilite_activite = $request->elegibilite_activite;
        $remboursementCSPE->eliegibilite_elec_intense = $request->eliegibilite_elec_intense;
        $remboursementCSPE->entreprise = $request->entreprise;
        $remboursementCSPE->study_id = $request->study_id;


        $remboursementCSPE->save();
        return response(view('pages.Remboursements.CSPE.show', compact('refundCSPE'))->with('status', "le tableau a été modifié avec succès"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefundCSPE  $refundCSPE
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefundCSPE $refundCSPE)
    {
        $remboursementCSPE = RefundCSPE::findOrFail($refundCSPE);
        $remboursementCSPE->delete();

        return response(view('pages.Remboursements.CSPE.index')->with('status', "ce tableau a été supprimé avec succès."));
    }
}
