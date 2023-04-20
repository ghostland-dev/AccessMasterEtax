<?php

namespace App\Http\Controllers\Docs;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dompdf\Dompdf;
use Dompdf\Options;
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
        $options = new Options();
        $options->set( 'isRemoteEnabled', true );
        $options->set( 'isHtml5ParserEnabled', true );
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

        $user = Auth::user() ?? new User( [
            'firstName'=> 'Abbie',
            'lastName'=> 'Konopelski'
        ] ) ;
        $company =  $resp ??  [ 'name' => 'ismail' ] ;

        $contrat = new Dompdf( $options );
        $contrat->loadHtml( view( 'emailTemplates.contrat', compact( 'user', 'company', 'dateContrat' ) ) );

        $contrat->setPaper( 'A4', 'portrait' );

        $contrat->render();
        $contrat->stream( date( 'Y-m-d ' ).'-contrat_prestation_Voltaria_numero.pdf', [ 'Attachment' => false ] );

    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function generatePDFpouvoir( Request $request, $siren = '000 000 000' ) {

        $options = new Options();
        $options->set( 'isRemoteEnabled', true );
        $options->set( 'isHtml5ParserEnabled', true );

        $date = new Carbon;
        $date->setLocale( config( 'app.locale' ) );

        $datePouvoir = $date->isoFormat( 'D MMMM YYYY' );

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

        $user = Auth::user() ?? new User( [
            'firstName'=> 'Abbie',
            'lastName'=> 'Konopelski'
        ] ) ;
        $company =  $resp ??  [ 'name' => 'ismail' ] ;

        $pouvoir = new Dompdf( $options );
        $pouvoir->loadHtml( view( 'emailTemplates.pouvoir', compact( 'user', 'company', 'datePouvoir' ) ) );

        $pouvoir->setPaper( 'A4', 'portrait' );

        $pouvoir->render();
        $pouvoir->stream( date( 'Y-m-d' ).'-pouvoir_Voltaria.pdf', [ 'Attachment' => false ] );

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function courrierType() {

        $CourierTyPE = new Dompdf();
        $CourierTyPE->loadHtml( view( 'emailTemplates.CourrierType', compact('') ) );

        $CourierTyPE->setPaper( 'A4', 'portrait' );

        $CourierTyPE->render();
        $CourierTyPE->stream( date( 'Y-m-d' ).'-courrier-type.pdf', [ 'Attachment' => false ] );

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
