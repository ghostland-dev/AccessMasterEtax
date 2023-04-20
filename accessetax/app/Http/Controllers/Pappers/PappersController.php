<?php

namespace App\Http\Controllers\Pappers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PappersController extends Controller {

    public function getPappersData( Request $request, $siren = '851987198' ) {

        // $visiter = new User();

        // $visiter->siren = $siren;
        // $visiter->userName = str($siren);
        // $visiter->userName = "njoly";
        // $visiter->firstName = "Suzan";
        // $visiter->lastName = "Fernand";
        // $visiter->tel = "04 96 72 19 ";
        // $visiter->fix = "+33 9 39 84 01 ";
        // $visiter->job = "Conseiller funérai";
        // $visiter->role = "clie";
        // $visiter->siren = "219188";
        // $visiter->password = "password";
        // $visiter->profile = "https://via.placeholder.com/640x480.png/00cc22?text=mini";
        // $visiter->email = "$siren@example.com"; 
        // //

        // $visiter->save();

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

        if ( $response->successful() ) {
            return response()->json( $response->json() );
        } else {
            return response()->json( [ 'error' => 'Failed to fetch data from Pappers API' ], $response->status() );
        }
    }
}