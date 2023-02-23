<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        return view('auth.profils.administrateur');

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