<?php

namespace App\Http\Controllers\Pappers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PappersController extends Controller
{

    public function getPappersData(Request $request)
    {

        $siren = $request->get('siren');

        $url = 'https://api.pappers.fr/v2/recherche';
        $apiToken = '97a405f1664a83329a7d89ebf51dc227b90633c4ba4a2575';
        $response = Http::withoutVerifying()
            ->get($url, [
                'precision' => 'standard',
                'bases' => 'entreprises,dirigeants,beneficiaires,publications,documents',
                'page' => 1,
                'par_page' => 2,
                'siren' => $siren,
                'api_token' => $apiToken
            ]);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Failed to fetch data from Pappers API'], $response->status());
        }
    }
}
