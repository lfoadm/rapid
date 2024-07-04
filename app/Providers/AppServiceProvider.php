<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FacadesGate::define('is-admin', function (User $user): bool {
            return $user->isAdm();
        });

        FacadesGate::define('owner', function (User $user, object $register): bool {
            return $user->id === $register->user_id;
        });
    }
}
