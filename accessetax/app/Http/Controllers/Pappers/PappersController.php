<?php

namespace App\Http\Controllers\Pappers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PappersController extends Controller
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
            return ['error' => 'Une erreur s\'est produite lors du traitement de la requête', 'status' => 500];
        }
    }

    public function getPappersData(Request $request)
    {
        $siren = $request->get('siren');

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
}
