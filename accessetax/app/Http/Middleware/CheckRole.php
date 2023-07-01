<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        // Check if user is authenticated
        if (!$user) {
            return redirect()->route('login');
        }

        // Check if user has the required role
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // Redirect to unauthorized page or show an error message
        return redirect()->back()->with('error', "Désolé, l'accès est interdit, votre adresse IP a été entregistré pour des raisons de sécurité.🤔");
    }
}