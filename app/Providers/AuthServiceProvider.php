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
         'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::define('show-comment',function($user){
//            return $user->hasRole(Permission::whereName('show-comment')->first()->roles);
//        });

//        foreach($this->getPermissions() as $permission){
//            Gate::define($permission->name ,function($user) use ($permission){
//                return $user->hasRole($permission->roles);
//            });
//        }

        Gate::define('isAdmin',function ($user){
            return $user->level=='admin';
        });
        Gate::define('isAuthor',function ($user){
            return $user->level=='author';
        });
        Gate::define('isEditor',function ($user){
            return $user->level=='editor';
        });
    }

//    protected function getPermissions()
//    {
//        return Permission::with('roles')->get();
//    }
}
