<?php

namespace App\Http\Controllers\Docs;

use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use \Barryvdh\DomPDF\Facade\pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class GenPDFController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public  function   generatePDFcontract( Request $request, $siren = '000 000 000' ) {
        // Create a new Carbon instance

        // Set the locale to French

        // Create a new Carbon instance
        $date = new Carbon;
        $date->setLocale( config( 'app.locale' ) );

        $dateContrat = $date->isoFormat( 'D MMMM YYYY' );

        $url = 'https://api.pappers.fr/v2/recherche';
        $apiToken = '97a405f1664a83329a7d89ebf51dc227b90633c4ba4a2575';

        $response = Http::withoutVerifying()
        ->get( $url, [
            'precision' => 'standard',
            'bases' => 'entreprises,dirigeants,beneficiaires,publications,documents',
            'page' => 1,
            'par_page' => 2,
            'siren' => $siren,
            'api_token' => $apiToken
        ] );

        $resp = $response->json()  ;

        $user = Auth::user() ?? ( [ 'name' => 'ismail' ] ) ;
        $company =  $resp ??  [ 'name' => 'ismail' ] ;

        $pdf = new Dompdf();
        $pdf->loadHtml( view( 'emailTemplates.contrat', compact( 'user', 'company', 'dateContrat' ) ) );

        $pdf->setPaper( 'A4', 'portrait' );

        $pdf->render();
        $pdf->stream( date( 'Y-m-d ' ).'-contrat_prestation_Voltaria_numero.pdf', [ 'Attachment' => false ] );

        // $response = Response( $pdf->output() );
        // $response->header( 'Content-Type', 'application/pdf' );
        // $response->header( 'Content-Disposition', 'inline; filename= date( "Y-m-d ")."-contrat_prestation_Voltaria_numero.pdf"' );

        // return $response;

    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
    }
}