<?php

namespace App\Http\Controllers\Docs;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Exception;

class GenPDFController extends Controller
{

    private function makePappersRequest($url)
    {
        try {
            $response = Http::withoutVerifying()->get($url);

            if ($response->successful()) {
                return $response->json();
            } else {
                return ['error' => 'Échec de la récupération des données depuis l\'API Pappers', 'status' => $response->status()];
            }
        } catch (Exception $e) {
            return ['error' => "Une erreur s\'est produite lors du traitement de la requête: $e", 'status' => 500];
        }
    }

    public function getPappersData($siren)
    {


        $url = 'https://suggestions.pappers.fr/v2?q=' . $siren . '&longueur=10&cibles=siren';

        return response()->json($this->makePappersRequest($url));
    }

    public function checkSirenExistence(Request $request)
    {
        $siren = $request->get('siren');

        $url = 'https://suggestions.pappers.fr/v2?q=' . $siren . '&longueur=10&cibles=siren';

        $response = $this->makePappersRequest($url);

        if (!isset($response['error']) && isset($response['resultats_siren']) && count($response['resultats_siren']) > 0) {
            return response()->json(['exists' => true]);
        } else {
            return response()->json(['exists' => false]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function generatePDF($view, $filename, $dateVariable, $siren)
    {
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);

        $date = new Carbon;
        $date->setLocale(config('app.locale'));
        $dateValue = $date->$dateVariable();

        $response = $this->getPappersData($siren);
        $compayData = $response->json();

        dd($compayData);
        $user = Auth::user();
        $dateValue = Date('Y-m-d ');
        $company = $compayData ?? ['name' => 'ismail'];

        $pdf = new Dompdf($options);
        $pdf->loadHtml(view($view, compact('user', 'company', 'dateValue')));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        $pdf->stream(date('Y-m-d ') . $filename, ['Attachment' => false]);
    }

    public function generatePDFcontract(Request $request, $siren = '000 000 000')
    {
        $this->generatePDF('emailTemplates.contrat', '-contrat_prestation_Voltaria_numero.pdf', 'isoFormat', $siren);
    }

    public function generatePDFpouvoir(Request $request, $siren = '000 000 000')
    {
        $this->generatePDF('emailTemplates.pouvoir', '-pouvoir_Voltaria.pdf', 'isoFormat', $siren);
    }

    public function courrierType()
    {
        $this->generatePDF('emailTemplates.CourrierType', '-courrier-type.pdf', 'format', null);
    }
}
