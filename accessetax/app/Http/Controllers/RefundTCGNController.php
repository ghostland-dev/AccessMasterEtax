<?php

namespace App\Http\Controllers;

use App\Models\RefundTCGN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RefundTCGNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remboursementTCGNs = RefundTCGN::all();

        return response(view('pages.Remboursements.TICGN.index')->with('status', "voici la liste des remboursements TICGN pour ce client"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return response(view('pages.Remboursements.TICGN.create')->with('status', "vous pouvez commencer à ajouter un remboursement de type TICGN."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $remboursementTCGN = RefundTCGN::create($request->all());
        return response(view('pages.Remboursements.CSPE.show', compact('remboursementTCGN'))->with('status', "le tableau de remboursement a été ajouté avec succès"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefundTCGN  $refundTCGN
     * @return \Illuminate\Http\Response
     */
    public function show(RefundTCGN $refundTCGN)
    {
        $remboursementTCGN = RefundTCGN::findOrFail($refundTCGN);
        return response(view('pages.Remboursements.CSPE.show', compact('remboursementTCGN'))->with('status', "le tableau de remboursement a été ajouté avec succès"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RefundTCGN  $refundTCGN
     * @return \Illuminate\Http\Response
     */
    public function edit(RefundTCGN $refundTCGN)
    {
        $remboursementTCGN = RefundTCGN::findOrFail($refundTCGN);
        return response(view('pages.Remboursements.CSPE.edit', compact('remboursementTCGN'))->with('status', "vous pouvez commencer les modifications de ce tableau de remboursement"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RefundTCGN  $refundTCGN
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefundTCGN $refundTCGN)
    {
        $remboursementTCGN = RefundTCGN::findOrFail($refundTCGN);

        $remboursementTCGN->achat_autres_prod = $request->achat_autres_prod;
        $remboursementTCGN->achat_chatleur = $request->achat_chatleur;
        $remboursementTCGN->achat_prod_gaz = $request->achat_prod_gaz;
        $remboursementTCGN->achat_prod_petrol = $request->achat_prod_petrol;
        $remboursementTCGN->car_elec = $request->car_elec;
        $remboursementTCGN->car_gaz = $request->car_gaz;
        $remboursementTCGN->eligibilite = $request->eligibilite;
        $remboursementTCGN->valuer_ajoutee = $request->valuer_ajoutee;
        $remboursementTCGN->valeur_production = $request->valeur_production;
        $remboursementTCGN->study_id = $request->study_id;

        $remboursementTCGN->save;

        return response(view('pages.Remboursements.CSPE.show', compact('remboursementTCGN'))->with('status', "les modifications ont été prise en compte pour ce tableau"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefundTCGN  $refundTCGN
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefundTCGN $refundTCGN)
    {
        //
    }
}
