<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EligibilityTCGN;
use App\Models\ActivityCode;
use App\Models\Study;

class EligibilityTICGNController extends Controller
{

    public function calculateRemunerationPercentage($volume)
    {
        $grilleRemuneration = [
            ["volume" => 150, "pourcentage" => 0.30],
            ["volume" => 200, "pourcentage" => 0.28],
            ["volume" => 250, "pourcentage" => 0.26],
            ["volume" => 300, "pourcentage" => 0.24],
            ["volume" => 350, "pourcentage" => 0.23],
            ["volume" => 400, "pourcentage" => 0.22],
            ["volume" => 450, "pourcentage" => 0.21],
            ["volume" => 500, "pourcentage" => 0.20],
            ["volume" => 600, "pourcentage" => 0.19],
            ["volume" => 700, "pourcentage" => 0.18],
            ["volume" => 800, "pourcentage" => 0.17],
            ["volume" => 900, "pourcentage" => 0.16],
            ["volume" => 1000, "pourcentage" => 0.15],
            ["volume" => 1100, "pourcentage" => 0.14],
            ["volume" => 1200, "pourcentage" => 0.13],
            ["volume" => 1300, "pourcentage" => 0.125],
            ["volume" => 1400, "pourcentage" => 0.12],
            ["volume" => 1500, "pourcentage" => 0.115],
            ["volume" => 1600, "pourcentage" => 0.11],
            ["volume" => 1700, "pourcentage" => 0.105],
            ["volume" => 1800, "pourcentage" => 0.10],
            ["volume" => 1900, "pourcentage" => 0.10],
            ["volume" => PHP_INT_MAX, "pourcentage" => 0.10], // Plus de 200
        ];

        // Parcourir la grille de rémunération pour trouver le bon palier
        foreach ($grilleRemuneration as $index => $palier) {
            if ($volume <= $palier['volume']) {
                // On a trouvé le palier correspondant au volume
                // Retourner le pourcentage de rémunération correspondant
                return $palier['pourcentage'];
            }
        }

        // Si aucun palier n'est trouvé, retourner un pourcentage par défaut
        return 10;
    }



    public function etapeval($sum1, $sum2, $cond01, $cond02)
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
        $EligibiliteTICGNs = EligibilityTCGN::orderBy('created_at', 'desc')->paginate(10);

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

        $etudes = Study::all();

        $tauxTVA = 0.20;
        for ($i = 0; $i  < count($request->NaceCode); $i++) {

            $codeNaces = ActivityCode::where('code_nace', '=', $request->NaceCode[$i])->first();
            $EligibiliteTICGN = new EligibilityTCGN();

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

            $valeurAjouterEuro =  $request->valeurAjouterEuro[$i];
            $consumAnGazKwh    =  $request->consumAnGazKwh[$i];
            $consumAnElecKwh   =  $request->consumAnElecKwh[$i];

            // dd($consumAnGazKwh, $consumAnElecKwh, $valeurAjouterEuro);

            $valeurProduction =  $request->valeurProduction[$i];
            $achatGaz         =  $request->achatGaz[$i];
            $achatPetroliers  =  $request->achatPetroliers[$i];
            $achatChaleur     =  $request->achatChaleur[$i];
            $autres           =  $request->autres[$i];
            $consumAnAutreKwh =  $request->consumAnAutreKwh[$i];

            $combustionProcessus       =  $request->combustionProcessus[$i];
            $pourcentageConsuPorcessus =  $request->pourcentageConsuPorcessus[$i];
            $NaceCode                  =  $request->NaceCode[$i];

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
            $fullvalidation = ($Validation01 == true && $Validation02 == true && $Validation03 == true) ? true : false;
            $esitmationEconomie = round($SommeTotalTaxTCGNPlein - $SommeTotalTaxTCGNReduit);

            $EligibiliteTICGN->valeurAjouterEuro = $request->valeurAjouterEuro[$i];
            $EligibiliteTICGN->consumAnGazKwh = $request->consumAnGazKwh[$i];
            $EligibiliteTICGN->consumAnElecKwh = $request->consumAnElecKwh[$i];
            $EligibiliteTICGN->valeurProduction = $request->valeurProduction[$i];
            $EligibiliteTICGN->achatGaz = $request->achatGaz[$i];
            $EligibiliteTICGN->achatPetroliers = $request->achatPetroliers[$i];
            $EligibiliteTICGN->achatChaleur = $request->achatChaleur[$i];
            $EligibiliteTICGN->autres = $request->autres[$i];
            $EligibiliteTICGN->consumAnAutreKwh = $request->consumAnAutreKwh[$i];
            $EligibiliteTICGN->pourcentageConsuPorcessus = $request->pourcentageConsuPorcessus[$i];
            $EligibiliteTICGN->NaceCode = $request->NaceCode[$i];
            $EligibiliteTICGN->combustionProcessus = $request->combustionProcessus[$i];

            $EligibiliteTICGN->Validation03 = $Validation03 ? 1 : 0;
            $EligibiliteTICGN->Validation02 = $Validation02 ? 1 : 0;
            $EligibiliteTICGN->Validation01 = $Validation01 ? 1 : 0;
            $EligibiliteTICGN->fullvalidation =  $fullvalidation;
            $EligibiliteTICGN->esitmationEconomie = round($esitmationEconomie, 3);
            $EligibiliteTICGN->SommeTotalTaxElecPlein = $SommeTotalTaxElecPlein;
            $EligibiliteTICGN->SommeTotalTaxGazPlein = $SommeTotalTaxGazPlein;
            $EligibiliteTICGN->SommeTotalTaxTCGNReduit = $SommeTotalTaxTCGNReduit;
            $EligibiliteTICGN->chiffreAffaireBrut_AE = round($esitmationEconomie * $this->calculateRemunerationPercentage($esitmationEconomie), 3);
            $EligibiliteTICGN->chiffreAffaireNet_AE = -round((($esitmationEconomie * $this->calculateRemunerationPercentage($esitmationEconomie)) * $tauxTVA) - $esitmationEconomie * $this->calculateRemunerationPercentage($esitmationEconomie), 3);


            $EligibiliteTICGN->study_id = $request->study_id[$i];

            $EligibiliteTICGN->save();
        }

        return redirect()->route("tcgnEligs", compact('etudes'))->with('status', "Les tests ont été enregistré avec succès.");
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
        $tauxTVA = 0.20;

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
        $EligibiliteTICGN->chiffreAffaireBrut_AE = round($esitmationEconomie * $this->calculateRemunerationPercentage($esitmationEconomie), 3);
        $EligibiliteTICGN->chiffreAffaireNet_AE = -round((($esitmationEconomie * $this->calculateRemunerationPercentage($esitmationEconomie)) * $tauxTVA) - $esitmationEconomie * $this->calculateRemunerationPercentage($esitmationEconomie), 3);



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
