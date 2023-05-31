<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EligibilityCSPE;
use App\Models\CarbonLique;
use App\Models\CodeNaf;
use App\Models\Study;

class EligibilityCSPEController extends Controller
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





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $elegibiliteCSPEs = EligibilityCSPE::all();
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



        $EligibiliteCSPE = new EligibilityCSPE();

        $EligibiliteCSPE->codeNaf = $request->codeNaf;
        $EligibiliteCSPE->CAR = $request->CAR;
        $EligibiliteCSPE->valeurAjouter = $request->valeurAjouter;
        $EligibiliteCSPE->CodeNafmessage = $this->codeNafs($request->$codeNaf);
        $EligibiliteCSPE->MotnantCSPETauxReduit = $MotnantCSPETauxReduit;
        $EligibiliteCSPE->CSPEtauxPlein =  $CSPEtauxPlein;
        $EligibiliteCSPE->EligibiliteReduit =  $EligibiliteReduit;
        $EligibiliteCSPE->RatioElectroIntense =  $RatioElectroIntense;
        $EligibiliteCSPE->SoumisRisqueFuitCO2 =  $SoumisRisqueFuitCO2;
        $EligibiliteCSPE->NouveaTauxReduit =  $NouveaTauxReduit;
        $EligibiliteCSPE->RemboursementClient =  $RemboursementClient;
        $EligibiliteCSPE->chiffreAffaireBrut_AE =  $RemboursementClient * 0.20;
        $EligibiliteCSPE->chiffreAffaireNet_AE =    ($RemboursementClient * 0.20) * 0.20;
        $EligibiliteCSPE->study_id = $request->study_id;

        $EligibiliteCSPE->save();




        if ($CodeNace === true && $estElectroIntensif === true) {

            $CodeNafmessage = 'vous êtes peutêtre eligible à 90% ';
        } else if ($CodeNace === true && $estElectroIntensif === false) {
            $CodeNafmessage = 'vous êtes peutêtre eligible à 30% ';
        } else {
            $CodeNafmessage = 'vous êtes eligible à 0%';
        }

        return response(view("pages.EligibiliteCSPE.show", compact('EligibiliteCSPE'))->with('status', 'le test a été enregistré avec succès.'));
    }

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
        $EligibiliteCSPE->chiffreAffaireBrut_AE =  $RemboursementClient * 0.20;
        $EligibiliteCSPE->chiffreAffaireNet_AE =    ($RemboursementClient * 0.20) * 0.20;
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
