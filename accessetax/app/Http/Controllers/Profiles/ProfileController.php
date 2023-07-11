<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Alerte;
use App\Models\EligibilityCSPE;
use App\Models\EligibilityTCGN;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function visitor()
    {
        // retdirect to admin page
        $user = Auth::user();
        return view('auth.profils.visiteur', compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        // retdirect to admin page
        $EligTICGN = EligibilityTCGN::all();
        $chiffreAffaireNet_AEArray = collect($EligTICGN)
            ->pluck('chiffreAffaireNet_AE')
            ->toArray();
        $chiffreAffaireNet_dates = collect($EligTICGN)
            ->pluck('created_at')
            ->toArray();

        $SommeCSPEnet = EligibilityCSPE::sum('chiffreAffaireNet_AE');
        $SommeCSPEbrut = EligibilityCSPE::sum('chiffreAffaireBrut_AE');
        $SommeTICGNnet = EligibilityTCGN::sum('chiffreAffaireNet_AE');
        $SommeTICGNbrut = EligibilityTCGN::sum('chiffreAffaireBrut_AE');

        $SommeCSPEnetlist = EligibilityCSPE::pluck('chiffreAffaireNet_AE')->toArray();
        $SommeCSPEbrutlist = EligibilityCSPE::pluck('chiffreAffaireBrut_AE')->toArray();
        $SommeTCGNnetlist = EligibilityTCGN::pluck('chiffreAffaireNet_AE')->toArray();
        $SommeTCGNbrutlist = EligibilityTCGN::pluck('chiffreAffaireBrut_AE')->toArray();

        $alertes = Alerte::all();
        return view('auth.profils.administrateur', compact('chiffreAffaireNet_AEArray', 'chiffreAffaireNet_dates', 'SommeTCGNnetlist', 'SommeTCGNbrutlist', 'SommeCSPEnetlist', 'SommeCSPEbrutlist', 'alertes', 'SommeCSPEbrut', 'SommeCSPEnet', 'SommeTICGNnet', 'SommeTICGNbrut'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seller()
    {

        $user = Auth::user();
        // retdirect to admin page
        return view('auth.profils.commercial', compact('user'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer()
    {

        $user = Auth::user();

        $testeTICGN = EligibilityTCGN::where('siren', '=', $user->siren)->sum('chiffreAffaireNet_AE');
        $testeCSPE = EligibilityCSPE::where('siren', '=', $user->siren)->sum('chiffreAffaireNet_AE');

        return view('auth.profils.client', compact('user'));
    }
}
