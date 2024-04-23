<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\House;
use App\Models\Parcelle;
use App\Policies\HousePolicy;
use App\Policies\ParcellePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        House::class => HousePolicy::class,
        Parcelle::class => ParcellePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
