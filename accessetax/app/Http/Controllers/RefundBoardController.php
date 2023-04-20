<?php

namespace App\Http\Controllers;

use App\Models\RefundBoard;
use Illuminate\Http\Request;

class RefundBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tableauRemboursements = RefundBoard::all();

        response(view('pages.Remboursements.tableau.index', compact('tableauRemboursements'))->with('status', "liste des tableaux de remboursement a été retoruvé."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        response(view('pages.Remboursements.tableau.create')->with('status', "vous pouvez commencer à créer un nouveau tableau."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tableauRemboursement = RefundBoard::create($request->all());
        response(view('pages.Remboursements.tableau.show', compact('tableauRemboursement'))->with('status', "le tableau a été créé avec succès."));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefundBoard  $refundBoard
     * @return \Illuminate\Http\Response
     */
    public function show(RefundBoard $refundBoard)
    {
        $tableauRemboursement = RefundBoard::findOrFail($refundBoard);
        response(view('pages.Remboursements.tableau.show', compact('tableauRemboursement'))->with('status', "Voici les détails de ce tableau."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RefundBoard  $refundBoard
     * @return \Illuminate\Http\Response
     */
    public function edit(RefundBoard $refundBoard)
    {
        $tableauRemboursement = RefundBoard::findOrFail($refundBoard);
        response(view('pages.Remboursements.tableau.edit', compact('tableauRemboursement'))->with('status', "vous pouvez commencer la modification de ce tableau."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RefundBoard  $refundBoard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefundBoard $refundBoard)
    {
        $tableauRemboursement = RefundBoard::findOrFail($refundBoard);

        $tableauRemboursement->consommation_mkw =  $request->consommation_mkw;
        $tableauRemboursement->remuneration =  $request->remuneration;

        $tableauRemboursement->save();
        response(view('pages.Remboursements.tableau.show', compact('tableauRemboursement'))->with('status', "le tableau a été modifié avec succès."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefundBoard  $refundBoard
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefundBoard $refundBoard)
    {
        $tableauRemboursement = RefundBoard::findOrFail($refundBoard);

        $tableauRemboursement->delete();
        response(view('pages.Remboursements.tableau.index')->with('status', "le tableau a été supprimé avec succès."));
    }
}
