<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PipelineMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // Check if the user is authenticated and has a role assigned
        if ($user && $user->role) {
            if ($user->role === 'visiteur') {
                // Get the "etape" value from the authenticated user table for visiteurs
                $etape = $user->etape;
                // Redirect the user to the corresponding step in the pipeline
                switch ($etape) {
                    case 1:
                        return redirect()->route('etape1');
                    case 2:
                        return redirect()->route('etape2');
                    case 3:
                        return redirect()->route('etape3');
                    case 4:
                        return redirect()->route('etape4');
                    case 5:
                        return redirect()->route('etape5');
                    case 6:
                        return redirect()->route('etape6');
                    case 7:
                        return redirect()->route('etape7');
                    case 8:
                        return redirect()->route('etape8');
                    case 9:
                        return redirect()->route('etape9');
                    case 10:
                        return redirect()->route('etape10');
                    case 11:
                        return redirect()->route('etape11');
                    case 12:
                        return redirect()->route('etape12');
                    default:
                        // Handle invalid or unsupported etape values
                        abort(400, 'vous avez fait une mauvaise naipulation en tant que visiteur');
                }
            } elseif ($user->role === 'client') {
                return redirect()->route('profile.customer');
            } elseif ($user->role === 'commercial') {
                return redirect()->route('profile.seller');
            } elseif ($user->role === 'administrateur') {
                return redirect()->route('profile.admin');
            } else {
                return redirect()->route('home');
            }
        }

        // If the user is not authenticated or has no role assigned, proceed to the next middleware or route
        return $next($request);
    }
}