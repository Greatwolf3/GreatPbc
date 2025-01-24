<?php

namespace app\Http\Responses;

use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as Responsable;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class LogoutResponse implements Responsable
{
    public function toResponse($request): RedirectResponse|Redirector
    {
      /*  if (Filament::getCurrentPanel()->getId() === 'admin') {
            return redirect()->to(Filament::getLoginUrl());
        }*/

        //return parent::toResponse($request);
        return redirect()->to('/');
    }
}