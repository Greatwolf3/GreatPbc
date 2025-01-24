<?php

namespace app\Providers;

use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse;
use Illuminate\Support\ServiceProvider;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use BezhanSalleh\FilamentLanguageSwitch\Enums\Placement;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */



    /**
     * Bootstrap any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            LoginResponse::class,
            \app\Http\Responses\LoginResponse::class

        );
        $this->app->singleton(
            LogoutResponse::class,
            \app\Http\Responses\LogoutResponse::class

        );

    }
    
    public function boot(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['it','en']) // also accepts a closure
            ->flags([
                'it' => asset('flags/24x24/it.png'),
                'en' => asset('flags/24x24/en.png'),
            ]);
        });
        
    }
}
