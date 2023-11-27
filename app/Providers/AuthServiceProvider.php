<?php

namespace App\Providers;
use App\Models\Tag;
use App\Models\User;

// use Illuminate\Support\Facades\Gate;
use App\Models\Variacion;
use App\Policies\TagPolicy;
use App\Policies\VariacionPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Tag::class => TagPolicy::class,
        Variacion::class => VariacionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {

        $this->registerPolicies();

        Gate::define('soft_delete', fn(User $user) => $user->email == 'nisha@lol.com');
        Gate::define('soft_db', fn(User $user) => $user->usertype);
        Gate::define('admin_delete', fn(User $user) => $user->email != 'nisha@lol.com');
        Gate::define('admin_only', fn(User $user) => $user->usertype);
        Gate::define('user_only', fn(User $user) => $user->usertype == false);

    }
}
