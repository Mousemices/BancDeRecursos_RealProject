<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    
    protected $policies = [
        'App\Batch' => 'App\Policies\BatchPolicy',
        'App\User' => 'App\Policies\UserPolicy',
    ];

    
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes(); 
        
    }
}
