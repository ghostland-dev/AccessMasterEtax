<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EligibilityCSPE;
use App\Models\CarbonLique;
use App\Models\CodeNaf;
use App\Models\Study;

class EligibilityCSPEController extends Controller
{

    private function calculateRemunerationPercentage($volume)
    {
        if ($volume < 150) {
            return 0.30;
        } elseif ($volume >= 150 && $volume < 200) {
            return 0.28;
        } elseif ($volume >= 200 && $volume < 250) {
            return 0.26;
        } elseif ($volume >= 250 && $volume < 300) {
            return 0.24;
        } elseif ($volume >= 300 && $volume < 350) {
            return 0.23;
        } elseif ($volume >= 350 && $volume < 400) {
            return 0.22;
        } elseif ($volume >= 400 && $volume < 450) {
            return 0.21;
        } elseif ($volume >= 450 && $volume < 500) {
            return 0.20;
        } elseif ($volume >= 500 && $volume < 600) {
            return 0.19;
        } elseif ($volume >= 600 && $volume < 700) {
            return 0.18;
        } elseif ($volume >= 700 && $volume < 800) {
            return 0.17;
        } elseif ($volume >= 800 && $volume < 900) {
            return 0.16;
        } elseif ($volume >= 900 && $volume < 1000) {
            return 0.15;
        } elseif ($volume >= 1000 && $volume < 1100) {
            return 0.14;
        } elseif ($volume >= 1100 && $volume < 1200) {
            return 0.135;
        } elseif ($volume >= 1200 && $volume < 1300) {
            return 0.13;
        } elseif ($volume >= 1300 && $volume < 1400) {
            return 0.125;
        } elseif ($volume >= 1400 && $volume < 1500) {
            return 0.12;
        } elseif ($volume >= 1500 && $volume < 1600) {
            return 0.115;
        } elseif ($volume >= 1600 && $volume < 1700) {
            return 0.11;
        } elseif ($volume >= 1700 && $volume < 1800) {
            return 0.105;
        } elseif ($volume >= 1800 && $volume < 1900) {
            return 0.10;
        } elseif ($volume >= 1900 && $volume <= 2000) {
            return 0.10;
        } else {
            return 0.10;
        }
    }


    private  function testEligbilitys($electroInt)
    {
        if ($electroInt > 0.55) {
            return true;
        } else if ($electroInt < 0.45) {
            return true;
        } else {
            return false;
        }
    }

    private  function codeNafs($code)
    {
        $extCode = substr($code, 0, 2);
        if ($extCode < 40 && $extCode > 4) {
            return true;
        } else if ($extCode > 40 || $extCode < 4) {
            return false;
        }
    }

    private function tauxReduits($retio, $SoumisRisqueFuitCO2)
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $elegibiliteCSPEs = EligibilityCSPE::orderBy('created_at', 'desc')->paginate(10);
        return response(view('pages.EligibiliteCSPE.index', compact('elegibiliteCSPEs'))->with('status', "liste des testes de remboursement CSPE"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etudes = Study::all();
        return response(view('pages.EligibiliteCSPE.create', compact('etudes'))->with('status', "vous pouvez commencer à le teste d'éligibilité CSPE"), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tauxTVA = 0.20;

        for ($i = 0; $i  < count($request->codeNaf); $i++) {


            $codeNaf       = CodeNaf::where('code_naf', '=', $request->codeNaf[$i])->first();
            $valeurAjouter = $request->valeurAjouter[$i];
            $Car           = $request->CAR[$i];
            $Study           = $request->study_id[$i];

            // calculated data
            $CodeNace           =  ($codeNaf) ? true : false;
            $ElectroIntese      =   $Car * 0.0225   / $valeurAjouter   * 100;
            $estElectroIntensif = $this->testEligbilitys($ElectroIntese);

            /**
             * Results of calculated
             */
            $CSPEtauxPlein         = ($Car / 1000) * 22.5;
            $EligibiliteReduit     = $ElectroIntese / 100;
            $RatioElectroIntense   = $Car / $valeurAjouter;
            $SoumisRisqueFuitCO2   =  $CodeNace;
            $NouveaTauxReduit      = $this->tauxReduits($RatioElectroIntense, $SoumisRisqueFuitCO2);
            $RemboursementClient   = (22.5 - $NouveaTauxReduit) * ($Car / 1000);
            $MotnantCSPETauxReduit = $NouveaTauxReduit * ($Car / 1000);

            $EligibiliteCSPE = new EligibilityCSPE();

            $EligibiliteCSPE->codeNaf = $codeNaf;
            $EligibiliteCSPE->CAR = $Car;
            $EligibiliteCSPE->valeurAjouter = $valeurAjouter;
            $EligibiliteCSPE->CodeNafmessage = $this->codeNafs($request->$codeNaf);
            $EligibiliteCSPE->MotnantCSPETauxReduit = $MotnantCSPETauxReduit;
            $EligibiliteCSPE->CSPEtauxPlein =  $CSPEtauxPlein;
            $EligibiliteCSPE->EligibiliteReduit =  $EligibiliteReduit;
            $EligibiliteCSPE->RatioElectroIntense =  $RatioElectroIntense;
            $EligibiliteCSPE->SoumisRisqueFuitCO2 =  $SoumisRisqueFuitCO2;
            $EligibiliteCSPE->NouveaTauxReduit =  $NouveaTauxReduit;
            $EligibiliteCSPE->RemboursementClient =  $RemboursementClient;
            $EligibiliteCSPE->chiffreAffaireBrut_AE = round($RemboursementClient * $this->calculateRemunerationPercentage($RemboursementClient), 3);
            $EligibiliteCSPE->chiffreAffaireNet_AE = -round((($RemboursementClient * $this->calculateRemunerationPercentage($RemboursementClient)) * $tauxTVA) - $RemboursementClient * $this->calculateRemunerationPercentage($RemboursementClient), 3);
            $EligibiliteCSPE->study_id =  $Study;

            $EligibiliteCSPE->save();

            if ($CodeNace === true && $estElectroIntensif === true) {

                $CodeNafmessage = 'vous êtes peutêtre eligible à 90% ';
            } else if ($CodeNace === true && $estElectroIntensif === false) {
                $CodeNafmessage = 'vous êtes peutêtre eligible à 30% ';
            } else {
                $CodeNafmessage = 'vous êtes eligible à 0%';
            }


            // You can choose to do something with $eligibiliteCSPE if needed
        }

        return redirect()->route("cspeEligs", compact('CodeNafmessage'))->with('status', "Les tests ont été enregistré avec succès.");
    }


    // private function calculateEligibiliteCSPE($request)
    // {



    //     $codeNaf = CodeNaf::where('code_naf', '=', $request['codeNaf'])->first() ? true : false;
    //     $valeurAjouter = $request['valeurAjouter'];
    //     $car = $request['CAR'];

    //     $codeNace = ($codeNaf) ? true : false;
    //     $electroIntese = $car * 0.0225 / $valeurAjouter * 100;
    //     $isElectroIntensif = $this->testEligibilitys($electroIntese);

    //     $cspeTauxPlein = ($car / 1000) * 22.5;
    //     $eligibiliteReduit = $electroIntese / 100;
    //     $ratioElectroIntense = $car / $valeurAjouter;
    //     $soumisRisqueFuitCO2 = $codeNace;
    //     $nouveauTauxReduit = $this->tauxReduits($ratioElectroIntense, $soumisRisqueFuitCO2);
    //     $remboursementClient = (22.5 - $nouveauTauxReduit) * ($car / 1000);
    //     $montantCSPETauxReduit = $nouveauTauxReduit * ($car / 1000);

    //     $eligibiliteCSPEData = [
    //         'codeNaf' => $codeNaf,
    //         'CAR' => $car,
    //         'valeurAjouter' =>
    //         $valeurAjouter,
    //         'codeNafMessage' => $this->codeNafs($codeNaf),
    //         'montantCSPETauxReduit' => $montantCSPETauxReduit,
    //         'cspeTauxPlein' => $cspeTauxPlein,
    //         'eligibiliteReduit' => $eligibiliteReduit,
    //         'ratioElectroIntense' => $ratioElectroIntense,
    //         'soumisRisqueFuitCO2' => $soumisRisqueFuitCO2,
    //         'nouveauTauxReduit' => $nouveauTauxReduit,
    //         'remboursementClient' => $remboursementClient,
    //         'chiffreAffaireBrut_AE' => $remboursementClient * 0.20,
    //         'chiffreAffaireNet_AE' => ($remboursementClient * 0.20) * 0.20,
    //         'study_id' => $request['study_id'],
    //     ];

    //     $eligibiliteCSPE = new EligibilityCSPE();
    //     $eligibiliteCSPE->fill($eligibiliteCSPEData);
    //     $eligibiliteCSPE->save();

    //     if ($codeNace === true && $isElectroIntensif === true) {
    //         $codeNafMessage = 'Vous êtes peut-être éligible à 90%';
    //     } elseif ($codeNace === true && $isElectroIntensif === false) {
    //         $codeNafMessage = 'Vous êtes peut-être éligible à 30%';
    //     } else {
    //         $codeNafMessage = 'Vous êtes éligible à 0%';
    //     }

    //     $eligibiliteCSPE->codeNafMessage = $codeNafMessage;

    //     return $eligibiliteCSPE;
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $EligibiliteCSPE = EligibilityCSPE::findOrfail($id);

        return view('pages.EligibiliteCSPE.show', compact('EligibiliteCSPE'))->with('success', "le teste a été retourvé avec succès");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $EligibiliteCSPE = EligibilityCSPE::findOrfail($id);
        $etudes = Study::all();

        return view('pages.EligibiliteCSPE.edit', compact('EligibiliteCSPE', 'etudes'))->with('success', "le teste est prêt à être modifié");
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
        $EligibiliteCSPE = EligibilityCSPE::findOrfail($id);

        // Collected data
        $carbon = CarbonLique::all();

        $codeNaf       = CodeNaf::where('code_naf', '=', $request->codeNaf)->first();
        $valeurAjouter = $request->valeurAjouter;
        $Car           = $request->CAR;

        // calculated data
        $CodeNace           =  ($codeNaf) ? true : false;
        $ElectroIntese      =   $Car * 0.0225   / $valeurAjouter   * 100;
        $estElectroIntensif = $this->testEligbilitys($ElectroIntese);

        /**
         * Results of calculated
         */
        $CSPEtauxPlein         = ($Car / 1000) * 22.5;
        $EligibiliteReduit     = $ElectroIntese / 100;
        $RatioElectroIntense   = $Car / $valeurAjouter;
        $SoumisRisqueFuitCO2   =  $CodeNace;
        $NouveaTauxReduit      = $this->tauxReduits($RatioElectroIntense, $SoumisRisqueFuitCO2);
        $RemboursementClient   = (22.5 - $NouveaTauxReduit) * ($Car / 1000);
        $MotnantCSPETauxReduit = $NouveaTauxReduit * ($Car / 1000);

        //dd( $MotnantCSPETauxReduit, $CSPEtauxPlein, $EligibiliteReduit, $RatioElectroIntense, $SoumisRisqueFuitCO2, $NouveaTauxReduit, $RemboursementClient );

        $EligibiliteCSPE->codeNaf = $request->codeNaf;
        $EligibiliteCSPE->CAR = $request->CAR;
        $EligibiliteCSPE->valeurAjouter = $request->valeurAjouter;
        $EligibiliteCSPE->MotnantCSPETauxReduit = $MotnantCSPETauxReduit;
        $EligibiliteCSPE->CSPEtauxPlein =  $CSPEtauxPlein;
        $EligibiliteCSPE->EligibiliteReduit =  $EligibiliteReduit;
        $EligibiliteCSPE->RatioElectroIntense =  $RatioElectroIntense;
        $EligibiliteCSPE->SoumisRisqueFuitCO2 =  $SoumisRisqueFuitCO2;
        $EligibiliteCSPE->NouveaTauxReduit =  $NouveaTauxReduit;
        $EligibiliteCSPE->RemboursementClient =  $RemboursementClient;
        $EligibiliteCSPE->chiffreAffaireBrut_AE = round($RemboursementClient * $this->calculateRemunerationPercentage($RemboursementClient), 3);
        $EligibiliteCSPE->chiffreAffaireNet_AE = -round((($RemboursementClient * $this->calculateRemunerationPercentage($RemboursementClient)) * $tauxTVA) - $RemboursementClient * $this->calculateRemunerationPercentage($RemboursementClient), 3);
        $EligibiliteCSPE->study_id = $request->study_id;

        $EligibiliteCSPE->save();




        if ($CodeNace === true && $estElectroIntensif === true) {

            $CodeNafmessage = 'vous êtes peutêtre eligible à 90% ';
        } else if ($CodeNace === true && $estElectroIntensif === false) {
            $CodeNafmessage = 'vous êtes peutêtre eligible à 30% ';
        } else {
            $CodeNafmessage = 'vous êtes eligible à 0%';
        }

        return view('pages.EligibiliteCSPE.show', compact('EligibiliteCSPE'))->with('success', "le teste a été retourvé avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $EligibiliteCSPE = EligibilityCSPE::findOrfail($id);


        $EligibiliteCSPE->delete();


        return redirect()->route("cspeEligs")->with('status', "Teste CSPE a été supprimé avec succès.");
    }
}
