<?php

namespace app\Http\Responses;

use App\Filament\Resources\OrderResource;
use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class LoginResponse extends \Filament\Http\Responses\Auth\LoginResponse
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        $user_id=Filament::auth()->user();
        if($user_id->is_admin()==0){
            return redirect()->to('/');
        }
        else if($user_id->is_admin()==1) {
            return redirect()->to('/admin');
            // Here, you can define which resource and which page you want to redirect to
        }

            return redirect()->to('/');

    }
}