<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EligibilityTCGN;
use App\Models\ActivityCode;
use App\Models\Study;

class EligibilityTICGNController extends Controller
{

    function etapeval($sum1, $sum2, $cond01, $cond02)
    {
        if ($sum1 > $cond01 || $sum2 > $cond02) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $EligibiliteTICGNs = EligibilityTCGN::all();

        return view('pages.EligibiliteTICGN.index', compact('EligibiliteTICGNs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etudes = Study::all();
        return view('pages.EligibiliteTICGN.create', compact('etudes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //  dd($request->all());

        $codeNaces = ActivityCode::where('code_nace', '=', $request->NaceCode)->first();
        $EligibiliteTICGN = new EligibilityTCGN();
        $etudes = Study::all();

        if ($codeNaces === null) {
            $codeNaces = false;
        } else {
            $codeNaces = true;
        }

        $data = [
            'TCGNtaxu2015' => [
                'TICGN_plain' => 2.64,
                'TICGN_reduit' => 1.27,
                'CSPE' => 19.15
            ],
            'TCGNtaxu2016' => [
                'TICGN_plain' => 4.34,
                'TICGN_reduit' => 1.6,
                'CSPE' => 22.5
            ],
            'TCGNtaxu2017' => [
                'TICGN_plain' => 5.88,
                'TICGN_reduit' => 1.6,
                'CSPE' => 22.5
            ]
        ];

        $Gain = [
            'An2015' => $data['TCGNtaxu2015']['TICGN_plain'] - $data['TCGNtaxu2015']['TICGN_reduit'],
            'An2016' => $data['TCGNtaxu2016']['TICGN_plain'] - $data['TCGNtaxu2016']['TICGN_reduit'],
            'An2017' => $data['TCGNtaxu2017']['TICGN_plain'] - $data['TCGNtaxu2017']['TICGN_reduit']
        ];

        $valeurAjouterEuro =  $request->valeurAjouterEuro;
        $consumAnGazKwh    =  $request->consumAnGazKwh;
        $consumAnElecKwh   =  $request->consumAnElecKwh;

        $valeurProduction =  $request->valeurProduction;
        $achatGaz         =  $request->achatGaz;
        $achatPetroliers  =  $request->achatPetroliers;
        $achatChaleur     =  $request->achatChaleur;
        $autres           =  $request->autres;
        $consumAnAutreKwh =  $request->consumAnAutreKwh;

        $combustionProcessus       =  $request->combustionProcessus;
        $pourcentageConsuPorcessus =  $request->pourcentageConsuPorcessus;
        $NaceCode                  =  $request->NaceCode;

        $SommeTotalTaxElecPlein = ($data['TCGNtaxu2016']['TICGN_plain'] * $consumAnElecKwh) / 1000;
        $SommeTotalTaxGazPlein = ($data['TCGNtaxu2016']['CSPE'] * $consumAnGazKwh) / 1000;

        $SommeTotalTaxTCGNPlein  = ($consumAnGazKwh * $data['TCGNtaxu2017']['TICGN_plain']) / 1000;
        $SommeTotalTaxTCGNReduit = (($pourcentageConsuPorcessus / 100) * $consumAnGazKwh * $data['TCGNtaxu2017']['TICGN_reduit']) / 1000 + (((100 - $pourcentageConsuPorcessus) / 100) * $consumAnGazKwh * $data['TCGNtaxu2017']['TICGN_plain']) / 1000;


        $sum1   = $SommeTotalTaxElecPlein + $SommeTotalTaxGazPlein;
        $cond01 = 0.005 * $valeurAjouterEuro;
        $sum2   = $achatGaz + $achatChaleur + $achatPetroliers;
        $cond02 = 0.03 * $valeurProduction;
        $Validation01 = $codeNaces;
        $Validation02 = $combustionProcessus;
        $Validation03 = $this->etapeval($sum1, $sum2, $cond01, $cond02);
        $fullvalidation = $Validation01 && $Validation02 && $Validation03 ? true : false;
        $esitmationEconomie = round($SommeTotalTaxTCGNPlein - $SommeTotalTaxTCGNReduit);

        $EligibiliteTICGN->valeurAjouterEuro = $request->valeurAjouterEuro;
        $EligibiliteTICGN->consumAnGazKwh = $request->consumAnGazKwh;
        $EligibiliteTICGN->consumAnElecKwh = $request->consumAnElecKwh;
        $EligibiliteTICGN->valeurProduction = $request->valeurProduction;
        $EligibiliteTICGN->achatGaz = $request->achatGaz;
        $EligibiliteTICGN->achatPetroliers = $request->achatPetroliers;
        $EligibiliteTICGN->achatChaleur = $request->achatChaleur;
        $EligibiliteTICGN->autres = $request->autres;
        $EligibiliteTICGN->consumAnAutreKwh = $request->consumAnAutreKwh;
        $EligibiliteTICGN->pourcentageConsuPorcessus = $request->pourcentageConsuPorcessus;
        $EligibiliteTICGN->NaceCode = $request->NaceCode;

        $EligibiliteTICGN->combustionProcessus = $request->combustionProcessus;
        $EligibiliteTICGN->Validation03 = $Validation03 ? 1 : 0;
        $EligibiliteTICGN->Validation02 = $Validation02 ? 1 : 0;
        $EligibiliteTICGN->Validation01 = $Validation01 ? 1 : 0;
        $EligibiliteTICGN->fullvalidation =  $fullvalidation;
        $EligibiliteTICGN->esitmationEconomie = round($esitmationEconomie, 3);
        $EligibiliteTICGN->SommeTotalTaxElecPlein = $SommeTotalTaxElecPlein;
        $EligibiliteTICGN->SommeTotalTaxGazPlein = $SommeTotalTaxGazPlein;
        $EligibiliteTICGN->SommeTotalTaxTCGNReduit = $SommeTotalTaxTCGNReduit;
        $EligibiliteTICGN->chiffreAffaireBrut_AE = round($esitmationEconomie * 0.2, 3);
        $EligibiliteTICGN->chiffreAffaireNet_AE = round(($esitmationEconomie * 0.2) * 0.2, 3);


        $EligibiliteTICGN->study_id = $request->study_id;

        $EligibiliteTICGN->save();



        return view('pages.EligibiliteTICGN.show', compact('EligibiliteTICGN', 'etudes'))->with('status', "le teste a été créé avec succès.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $EligibiliteTICGN = EligibilityTCGN::findOrFail($id);

        return view('pages.EligibiliteTICGN.show', compact('EligibiliteTICGN'))->with('status', "le teste a été retrouvé avec succès.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $EligibiliteTICGN = EligibilityTCGN::findOrFail($id);
        $etudes = Study::all();


        return view('pages.EligibiliteTICGN.edit', compact('EligibiliteTICGN', 'etudes'))->with('status', "le teste a été prêt a être modifié.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $codeNaces = ActivityCode::where('code_nace', '=', $request->NaceCode)->first();
        $EligibiliteTICGN = EligibilityTCGN::findOrFail($id);
        $etudes = Study::all();

        if ($codeNaces === null) {
            $codeNaces = false;
        } else {
            $codeNaces = true;
        }

        $data = [
            'TCGNtaxu2015' => [
                'TICGN_plain' => 2.64,
                'TICGN_reduit' => 1.27,
                'CSPE' => 19.15
            ],
            'TCGNtaxu2016' => [
                'TICGN_plain' => 4.34,
                'TICGN_reduit' => 1.6,
                'CSPE' => 22.5
            ],
            'TCGNtaxu2017' => [
                'TICGN_plain' => 5.88,
                'TICGN_reduit' => 1.6,
                'CSPE' => 22.5
            ]
        ];

        $Gain = [
            'An2015' => $data['TCGNtaxu2015']['TICGN_plain'] - $data['TCGNtaxu2015']['TICGN_reduit'],
            'An2016' => $data['TCGNtaxu2016']['TICGN_plain'] - $data['TCGNtaxu2016']['TICGN_reduit'],
            'An2017' => $data['TCGNtaxu2017']['TICGN_plain'] - $data['TCGNtaxu2017']['TICGN_reduit']
        ];

        $valeurAjouterEuro =  $request->valeurAjouterEuro;
        $consumAnGazKwh    =  $request->consumAnGazKwh;
        $consumAnElecKwh   =  $request->consumAnElecKwh;

        $valeurProduction =  $request->valeurProduction;
        $achatGaz         =  $request->achatGaz;
        $achatPetroliers  =  $request->achatPetroliers;
        $achatChaleur     =  $request->achatChaleur;
        $autres           =  $request->autres;
        $consumAnAutreKwh =  $request->consumAnAutreKwh;

        $combustionProcessus       =  $request->combustionProcessus;
        $pourcentageConsuPorcessus =  $request->pourcentageConsuPorcessus;
        $NaceCode                  =  $request->NaceCode;

        $SommeTotalTaxElecPlein = ($data['TCGNtaxu2016']['TICGN_plain'] * $consumAnElecKwh) / 1000;
        $SommeTotalTaxGazPlein = ($data['TCGNtaxu2016']['CSPE'] * $consumAnGazKwh) / 1000;

        $SommeTotalTaxTCGNPlein  = ($consumAnGazKwh * $data['TCGNtaxu2017']['TICGN_plain']) / 1000;
        $SommeTotalTaxTCGNReduit = (($pourcentageConsuPorcessus / 100) * $consumAnGazKwh * $data['TCGNtaxu2017']['TICGN_reduit']) / 1000 + (((100 - $pourcentageConsuPorcessus) / 100) * $consumAnGazKwh * $data['TCGNtaxu2017']['TICGN_plain']) / 1000;


        $sum1   = $SommeTotalTaxElecPlein + $SommeTotalTaxGazPlein;
        $cond01 = 0.005 * $valeurAjouterEuro;
        $sum2   = $achatGaz + $achatChaleur + $achatPetroliers;
        $cond02 = 0.03 * $valeurProduction;
        $Validation01 = $codeNaces;
        $Validation02 = $combustionProcessus;
        $Validation03 = $this->etapeval($sum1, $sum2, $cond01, $cond02);
        $fullvalidation = $Validation01 && $Validation02 && $Validation03 ? true : false;
        $esitmationEconomie = round($SommeTotalTaxTCGNPlein - $SommeTotalTaxTCGNReduit);

        $EligibiliteTICGN->valeurAjouterEuro = $request->valeurAjouterEuro;
        $EligibiliteTICGN->consumAnGazKwh = $request->consumAnGazKwh;
        $EligibiliteTICGN->consumAnElecKwh = $request->consumAnElecKwh;
        $EligibiliteTICGN->valeurProduction = $request->valeurProduction;
        $EligibiliteTICGN->achatGaz = $request->achatGaz;
        $EligibiliteTICGN->achatPetroliers = $request->achatPetroliers;
        $EligibiliteTICGN->achatChaleur = $request->achatChaleur;
        $EligibiliteTICGN->autres = $request->autres;
        $EligibiliteTICGN->consumAnAutreKwh = $request->consumAnAutreKwh;
        $EligibiliteTICGN->pourcentageConsuPorcessus = $request->pourcentageConsuPorcessus;
        $EligibiliteTICGN->NaceCode = $request->NaceCode;

        $EligibiliteTICGN->combustionProcessus = $request->combustionProcessus;
        $EligibiliteTICGN->Validation03 = $Validation03 ? 1 : 0;
        $EligibiliteTICGN->Validation02 = $Validation02 ? 1 : 0;
        $EligibiliteTICGN->Validation01 = $Validation01 ? 1 : 0;
        $EligibiliteTICGN->fullvalidation =  $fullvalidation;
        $EligibiliteTICGN->esitmationEconomie = round($esitmationEconomie, 3);
        $EligibiliteTICGN->SommeTotalTaxElecPlein = $SommeTotalTaxElecPlein;
        $EligibiliteTICGN->SommeTotalTaxGazPlein = $SommeTotalTaxGazPlein;
        $EligibiliteTICGN->SommeTotalTaxTCGNReduit = $SommeTotalTaxTCGNReduit;
        $EligibiliteTICGN->chiffreAffaireBrut_AE = round($esitmationEconomie * 0.2, 3);
        $EligibiliteTICGN->chiffreAffaireNet_AE = round(($esitmationEconomie * 0.2) * 0.2, 3);


        $EligibiliteTICGN->study_id = $request->study_id;

        $EligibiliteTICGN->save();



        return view('pages.EligibiliteTICGN.show', compact('EligibiliteTICGN', 'etudes'))->with('status', "le teste a été modifié avec succès.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $EligibiliteTICGN = EligibilityTCGN::findOrFail($id);

        $EligibiliteTICGN->delete();

        return redirect()->route("tcgnEligs")->with('status', "Teste TICGN a été supprimé avec succès.");
    }
}
