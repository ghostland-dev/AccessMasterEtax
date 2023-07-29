<?php

namespace App\Http\Controllers\Docs;

use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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


        $dateValue = date('Y-m-d');

        $response = $this->getPappersData($siren);



        $user = Auth::user();
        $dateValue = Date('Y-m-d ');

        $company = $response->original['resultats_siren'][0];
       $sites = $user->companies[0]->sites;

        $html = view($view, compact('user', 'company', 'dateValue', 'sites'))->render();

        // Create the PDF
        $pdf = new Dompdf($options);
        $pdf->loadHtml($html);

        // Include Bootstrap CSS and JS in the PDF
        $bootstrapCSS = '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcwr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
        $bootstrapJS = '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh2WBu4MK7qrT4sap4rF5s1Jq1RgkPGJ9U0dW" crossorigin="anonymous"></script>';
        $html = $bootstrapCSS . $html . $bootstrapJS;

        // Set PDF options and render
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        // Output the PDF
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

    public function courrierType(Request $request, $siren = '000 000 000')
    {
        $this->generatePDF('emailTemplates.CourrierType', '-courrier-type.pdf', 'isoFormat', $siren);
    }
}
