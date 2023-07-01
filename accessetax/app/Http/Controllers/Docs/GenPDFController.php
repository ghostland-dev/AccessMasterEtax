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

class GenPDFController extends Controller
{
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

        $url = 'https://api.pappers.fr/v2/recherche';
        $apiToken = '97a405f1664a83329a7d89ebf51dc227b90633c4ba4a2575';

        $response = Http::withoutVerifying()->get($url, [
            'precision' => 'standard',
            'bases' => 'entreprises,dirigeants,beneficiaires,publications,documents',
            'page' => 1,
            'par_page' => 2,
            'siren' => $siren,
            'api_token' => $apiToken
        ]);

        $compayData = $response->json();

        $user = Auth::user() ?? new User([
            'firstName' => 'Abbie',
            'lastName' => 'Konopelski'
        ]);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
    }
}