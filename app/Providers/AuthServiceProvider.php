<?php

namespace App\Providers;

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
        'App\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('add', function ($user) {
            return $user->role->can_add_post == 1;
        });

        Gate::define('edit', function ($user) {
            return $user->role->can_edit_post == 1;
        });

        Gate::define('delete', function ($user) {
            return $user->role->can_delete_post == 1;
        });

        Gate::define('promote', function ($user) {
            return $user->role->can_promote_users == 1;
        });
    }
}
