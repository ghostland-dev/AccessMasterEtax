<?php

namespace App\Http\Controllers\Pipeline;

use App\Models\CodeNaf;
use App\Models\Supplier;
use App\Models\CarbonLique;
use App\Models\ActivityCode;
use Illuminate\Http\Request;
use App\Models\EligibilityCSPE;
use App\Http\Controllers\Controller;

class StepsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function SimulateurTICGN()
    {
        $codeNaces = ActivityCode::all();
        return view('pipeline.test_TICGN', compact('codeNaces'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function CheckTICGN(Request $request)
    {

        $codeNaces = ActivityCode::where('code_nace', '=', $request->NaceCode)->first();
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

        function etapeval($sum1, $sum2, $cond01, $cond02)
        {
            if ($sum1 > $cond01 || $sum2 > $cond02) {
                return true;
            } else {
                return false;
            }
        }

        $sum1   = $SommeTotalTaxElecPlein + $SommeTotalTaxGazPlein;
        $cond01 = 0.005 * $valeurAjouterEuro;
        $sum2   = $achatGaz + $achatChaleur + $achatPetroliers;
        $cond02 = 0.03 * $valeurProduction;
        $Validation01 = $codeNaces;
        $Validation02 = $combustionProcessus;
        $Validation03 = etapeval($sum1, $sum2, $cond01, $cond02);
        $fullvalidation = $Validation01 && $Validation02 && $Validation03 ? true : false;
        $esitmationEconomie = round($SommeTotalTaxTCGNPlein - $SommeTotalTaxTCGNReduit);






        return view('pipeline.test_TICGN', compact('esitmationEconomie', 'SommeTotalTaxElecPlein', 'SommeTotalTaxGazPlein', 'SommeTotalTaxTCGNReduit', 'fullvalidation', 'Validation03', 'Validation02', 'Validation01', 'fullvalidation'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function SimulateurCSPE()
    {

        return view('pipeline.test_CSPE');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function CheckCSPE(Request $request)
    {

        function testEligbilitys($electroInt)
        {
            if ($electroInt > 0.55) {
                return true;
            } else if ($electroInt < 0.45) {
                return true;
            } else {
                return false;
            }
        }

        function codeNafs($code)
        {
            $extCode = substr($code, 0, 2);
            if ($extCode < 40) {
                return true;
            } else if ($extCode > 40) {
                return false;
            }
        }

        function tauxReduits($retio, $SoumisRisqueFuitCO2)
        {
            switch ($SoumisRisqueFuitCO2) {
                case true:
                    if ($retio > 3) {
                        return 0;
                    } else if ($retio > 1.5 && $retio < 3) {
                        return 0;
                    } else if ($retio < 1.5) {
                        return 5.5;
                    }
                    break;
                case false:
                    if ($retio > 3) {
                        return 0;
                    } else if ($retio > 1.5 && $retio < 3) {
                        return 0;
                    } else if ($retio < 1.5) {
                        return 7.5;
                    } else if ($retio > 6) {
                        return 0;
                    }
                    break;
                default:
                    return 'une erreure est servenu';
            }
        }

        // Collected data
        $carbon = CarbonLique::all();

        $codeNaf       = CodeNaf::where('code_naf', '=', $request->codeNaf)->first();
        $valeurAjouter = $request->valeurAjouter;
        $Car           = $request->CAR;

        // calculated data
        $CodeNace           =  ($codeNaf) ? true : false;
        $ElectroIntese      =   $Car * 0.0225   / $valeurAjouter   * 100;
        $estElectroIntensif = testEligbilitys($ElectroIntese);

        /**
         * Results of calculated
         */
        $CSPEtauxPlein         = ($Car / 1000) * 22.5;
        $EligibiliteReduit     = $ElectroIntese / 100;
        $RatioElectroIntense   = $Car / $valeurAjouter;
        $SoumisRisqueFuitCO2   =  $CodeNace;
        $NouveaTauxReduit      = tauxReduits($RatioElectroIntense, $SoumisRisqueFuitCO2);
        $RemboursementClient   = (22.5 - $NouveaTauxReduit) * ($Car / 1000);
        $MotnantCSPETauxReduit = $NouveaTauxReduit * ($Car / 1000);

        //dd( $MotnantCSPETauxReduit, $CSPEtauxPlein, $EligibiliteReduit, $RatioElectroIntense, $SoumisRisqueFuitCO2, $NouveaTauxReduit, $RemboursementClient );



        $EligibiliteCSPE = new EligibilityCSPE();

        $EligibiliteCSPE->CodeNafmessage = codeNafs($request->$codeNaf);
        $EligibiliteCSPE->MotnantCSPETauxReduit = $MotnantCSPETauxReduit;
        $EligibiliteCSPE->CSPEtauxPlein =  $CSPEtauxPlein;
        $EligibiliteCSPE->EligibiliteReduit =  $EligibiliteReduit;
        $EligibiliteCSPE->RatioElectroIntense =  $RatioElectroIntense;
        $EligibiliteCSPE->SoumisRisqueFuitCO2 =  $SoumisRisqueFuitCO2;
        $EligibiliteCSPE->NouveaTauxReduit =  $NouveaTauxReduit;
        $EligibiliteCSPE->RemboursementClient =  $RemboursementClient;
        $EligibiliteCSPE->chiffreAffaireBrut_AE =  $RemboursementClient * 0.20;
        $EligibiliteCSPE->chiffreAffaireNet_AE =    ($RemboursementClient * 0.20) * 0.20;
        $EligibiliteCSPE->study_id = 1;

        $EligibiliteCSPE->save();




        if ($CodeNace === true && $estElectroIntensif === true) {

            $CodeNafmessage = 'vous êtes peutêtre eligible à 90% ';
        } else if ($CodeNace === true && $estElectroIntensif === false) {
            $CodeNafmessage = 'vous êtes peutêtre eligible à 30% ';
        } else {
            $CodeNafmessage = 'vous êtes eligible à 0%';
        }

        return view('pipeline.test_CSPE', compact('CodeNafmessage', 'MotnantCSPETauxReduit', 'CSPEtauxPlein', 'EligibiliteReduit', 'RatioElectroIntense', 'SoumisRisqueFuitCO2', 'NouveaTauxReduit', 'RemboursementClient'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function eligibilityTest()
    {
        return view('pipeline.02-eligibilityTest');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function bienvenue()
    {
        return view('pipeline.01-bienvenue');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function eligibilityClient()
    {
        return view('pipeline.02-eligibilityTest');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function contractSend()
    {
        return view('pipeline.04-contractSend');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function contractAccepted()
    {
        return view('pipeline.05-contractAccepted');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function folderIncompleted()
    {
        return view('pipeline.incomplet-folderIncompleted');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function folderBuilding()
    {
        $fournisseurs = Supplier::all();
        return view('pipeline.07-folderBuilding', compact('fournisseurs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function folderSentCouncil()
    {
        return view('pipeline.08-folderSentCouncil');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function CouncilConfirmation()
    {
        return view('pipeline.06-confirmationReception');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function CustomerRefund()
    {
        return view('pipeline.09-CustomerRefund');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ServiceInvoice()
    {
        return view('pipeline.10-serviceInvoice');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function folderStatus()
    {
        return view('pipeline.status-folderStatus');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function reducedTaxReqSupp()
    {
        return view('pipeline.11-reducedTaxReqSupp');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function resultsCSPETICGN(Request $request)
    {
        function etape01($sum1, $sum2, $cond01, $cond02)
        {
            if ($sum1 > $cond01 || $sum2 > $cond02) {
                return true;
            } else {
                return false;
            }
        }


        function testEligbility($electroInt)
        {
            if ($electroInt > 0.55) {
                return true;
            } else if ($electroInt < 0.45) {
                return true;
            } else {
                return false;
            }
        }

        function codeNaf($code)
        {
            $extCode = substr($code, 0, 2);
            if ($extCode < 40) {
                return true;
            } else if ($extCode > 40) {
                return false;
            }
        }

        function tauxReduit($retio, $SoumisRisqueFuitCO2)
        {
            switch ($SoumisRisqueFuitCO2) {
                case true:
                    if ($retio > 3) {
                        return 0;
                    } else if ($retio > 1.5 && $retio < 3) {
                        return 0;
                    } else if ($retio < 1.5) {
                        return 5.5;
                    }
                    break;
                case false:
                    if ($retio > 3) {
                        return 0;
                    } else if ($retio > 1.5 && $retio < 3) {
                        return 0;
                    } else if ($retio < 1.5) {
                        return 7.5;
                    } else if ($retio > 6) {
                        return 0;
                    }
                    break;
                default:
                    return 'une erreure est servenu';
            }
        }
        $valeurAjouterEuro =  $request->GAZvaleurAjouterEuro;
        $consumAnGazKwh    =  $request->GAZconsumAnGazKwh;
        $consumAnElecKwh   =  $request->GAZconsumAnElecKwh;

        $valeurProduction =  $request->GAZvaleurProduction;
        $achatGaz         =  $request->GAZachatGaz;
        $achatPetroliers  =  $request->GAZachatPetroliers;
        $achatChaleur     =  $request->GAZachatChaleur;
        $autres           =  $request->GAZautres;
        $consumAnAutreKwh =  $request->GAZconsumAnAutreKwh;

        $combustionProcessus       =  $request->GAZcombustionProcessus;
        $pourcentageConsuPorcessus =  $request->GAZpourcentageConsuPorcessus;
        $NaceCode                  =  $request->GAZNaceCode;


        // Collected data
        $carbon = CarbonLique::all();
        $codeNaf       = CodeNaf::where('code_naf', '=', $request->ELECcodeNaf)->first();
        $valeurAjouter = $request->ELECvaleurAjouter;
        $Car           = $request->ELECCAR;
        // calculated data
        $CodeNace           =  ($codeNaf) ? true : false;
        $ElectroIntese      =   $Car * 0.0225   / $valeurAjouter   * 100;
        $estElectroIntensif = testEligbility($ElectroIntese);
        /**
         * Results of calculated
         */
        $CSPEtauxPlein         = ($Car / 1000) * 22.5;
        $EligibiliteReduit     = $ElectroIntese / 100;
        $RatioElectroIntense   = $Car / $valeurAjouter;
        $SoumisRisqueFuitCO2   =  $CodeNace;
        $NouveaTauxReduit      = tauxReduit($RatioElectroIntense, $SoumisRisqueFuitCO2);
        $RemboursementClient   = (22.5 - $NouveaTauxReduit) * ($Car / 1000);
        $MotnantCSPETauxReduit = $NouveaTauxReduit * ($Car / 1000);

        if ($CodeNace === true && $estElectroIntensif === true) {

            $CodeNafmessage = 'vous êtes peutêtre eligible à 90% ';
        } else if ($CodeNace === true && $estElectroIntensif === false) {
            $CodeNafmessage = 'vous êtes peutêtre eligible à 30% ';
        } else {
            $CodeNafmessage = 'vous êtes eligible à 0%';
        }


        $codeNaces = ActivityCode::where('code_nace', '=', $request->GAZNaceCode)->first();
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



        $SommeTotalTaxElecPlein = ($data['TCGNtaxu2016']['TICGN_plain'] * $consumAnElecKwh) / 1000;
        $SommeTotalTaxGazPlein = ($data['TCGNtaxu2016']['CSPE'] * $consumAnGazKwh) / 1000;

        $SommeTotalTaxTCGNPlein  = ($consumAnGazKwh * $data['TCGNtaxu2017']['TICGN_plain']) / 1000;
        $SommeTotalTaxTCGNReduit = (($pourcentageConsuPorcessus / 100) * $consumAnGazKwh * $data['TCGNtaxu2017']['TICGN_reduit']) / 1000 + (((100 - $pourcentageConsuPorcessus) / 100) * $consumAnGazKwh * $data['TCGNtaxu2017']['TICGN_plain']) / 1000;


        $sum1   = $SommeTotalTaxElecPlein + $SommeTotalTaxGazPlein;
        $cond01 = 0.005 * floatval($valeurAjouterEuro);
        $sum2   = $achatGaz + $achatChaleur + $achatPetroliers;
        $cond02 = 0.03 * $valeurProduction;
        $Validation01 = $codeNaces;
        $Validation02 = $combustionProcessus;
        $Validation03 = etape01($sum1, $sum2, $cond01, $cond02);
        $fullvalidation = $Validation01 && $Validation02 && $Validation03 ? true : false;
        $esitmationEconomie = round($SommeTotalTaxTCGNPlein - $SommeTotalTaxTCGNReduit);


        // esitmationEconomie, $SommeTotalTaxElecPlein, $SommeTotalTaxGazPlein, $SommeTotalTaxTCGNReduit, $fullvalidation, $Validation03, $Validation02, $Validation01, $fullvalidation, $CodeNafmessage, $ MotnantCSPETauxReduit, $CSPEtauxPlein, $EligibiliteReduit, $RatioElectroIntense, $SoumisRisqueFuitCO2, $NouveaTauxReduit, $RemboursementClient


        return view('pipeline.03-ResultsCSPETICGN', compact('esitmationEconomie', 'SommeTotalTaxElecPlein', 'SommeTotalTaxGazPlein', 'SommeTotalTaxTCGNReduit', 'fullvalidation', 'Validation03', 'Validation02', 'Validation01', 'fullvalidation', 'CodeNafmessage', 'MotnantCSPETauxReduit', 'CSPEtauxPlein', 'EligibiliteReduit', 'RatioElectroIntense', 'SoumisRisqueFuitCO2', 'NouveaTauxReduit', 'RemboursementClient'));
    }



    public function recapDetails()
    {

        return  response(view('pipeline.timelineRecap'));
    }
}
