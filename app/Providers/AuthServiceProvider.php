<?php

namespace App\Providers;

use App\Chamado;
use App\Nivel;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Chamado' => 'App\Policies\ChamadoPolicy',
        'App\Usuario' => 'App\Policies\UsuarioPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
