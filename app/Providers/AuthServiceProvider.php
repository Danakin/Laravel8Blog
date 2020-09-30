<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('store-posts', function ($user) {
            return $user->role == 'author' || $user->role == 'admin';
        });
        Gate::define('edit-post', function ($user, $post) {
            return $user->role == 'admin' || $post->user_id == $user->id;
        });
        Gate::define('delete-post', function ($user, $post) {
            return $user->role == 'admin' || $post->user_id == $user->id;
        });
    }
}
