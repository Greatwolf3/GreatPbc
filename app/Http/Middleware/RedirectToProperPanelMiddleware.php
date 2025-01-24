<?php

namespace app\Http\Middleware;

use Closure;
use Filament\Pages\Dashboard;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectToProperPanelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_admin) {
            return redirect()->to(Dashboard::getUrl(panel: 'user'));
        }
        return redirect()->to('/blogs');
    }
}
