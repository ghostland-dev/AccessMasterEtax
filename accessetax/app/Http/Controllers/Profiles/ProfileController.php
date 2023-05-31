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
        // if(Auth::user()->role == 'visiteur'){
        // retdirect to admin page
        return view('auth.profils.visiteur');

        //    }elseif(Auth::user()->role == null){
        //         // retdirect to admin page
        //    return view('auth.profils.visiteur');

        //    }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        // if(Auth::user()->role == 'administrateur'){
        // retdirect to admin page
        $SommeCSPEnet = EligibilityCSPE::sum('chiffreAffaireNet_AE');
        $SommeCSPEbrut = EligibilityCSPE::sum('chiffreAffaireBrut_AE');
        $SommeTICGNnet = EligibilityTCGN::sum('chiffreAffaireNet_AE');
        $SommeTICGNbrut = EligibilityTCGN::sum('chiffreAffaireBrut_AE');

        $SommeCSPEnetlist = EligibilityCSPE::pluck('chiffreAffaireNet_AE')->toArray();
        $SommeCSPEbrutlist = EligibilityCSPE::pluck('chiffreAffaireBrut_AE')->toArray();
        $SommeTCGNnetlist = EligibilityTCGN::pluck('chiffreAffaireNet_AE')->toArray();
        $SommeTCGNbrutlist = EligibilityTCGN::pluck('chiffreAffaireBrut_AE')->toArray();

        $alertes = Alerte::all();
        return view('auth.profils.administrateur', compact('SommeTCGNnetlist', 'SommeTCGNbrutlist', 'SommeCSPEnetlist', 'SommeCSPEbrutlist', 'alertes', 'SommeCSPEbrut', 'SommeCSPEnet', 'SommeTICGNnet', 'SommeTICGNbrut'));

        // }else{
        //      // retdirect to admin page
        // return view('auth.profils.visiteur');

        // }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seller()
    {
        // if(Auth::user()->role == 'commercial'){
        // retdirect to admin page
        return view('auth.profils.commercial');

        //    }else{
        //         // retdirect to admin page
        //    return view('auth.profils.visiteur');

        //    }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer()
    {
        // if(Auth::user()->role == 'client'){
        // retdirect to admin page
        return view('auth.profils.client');

        //    }else{
        //         // retdirect to admin page
        //    return view('auth.profils.visiteur');

        //    }
    }
}
