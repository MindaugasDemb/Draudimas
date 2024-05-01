<?php

namespace App\Providers;

use App\Models\Owner;
use App\Models\Car;
use App\Policies\CarPolicy;
use App\Policies\OwnerPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
    Car::class=>CarPolicy::class,
    Owner::class=>OwnerPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        Gate::define('edit_car', function (User $user)
        {
            return ($user->type!=0);
        });

        Gate::define('delete_car', function (User $user)
        {
            return ($user->type!=0);
        });
    }
}
