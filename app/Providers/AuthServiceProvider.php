<?php

namespace App\Providers;
use Laravel\Fortify\Fortify;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        
        Fortify::loginView(function () {
            return view('auth.login');
        });
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.password.request');
        });

        Fortify::resetPasswordView(function () {
            return view('auth.password.edit');
        }); 
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.password.request');
        });

        
        

    }
}
