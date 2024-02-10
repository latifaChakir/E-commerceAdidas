<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

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
    public function boot()
    {
        View::composer(['index', 'layout'], function ($view) {
            $userRole = session('user_role');

            $permissions = DB::table('permessions')
            ->join('role_permissions', 'permessions.id', '=', 'role_permissions.id_permissions')
            ->join('roles', 'role_permissions.id_role', '=', 'roles.id')
            ->where('roles.id', $userRole)
            ->pluck('permessions.permessions_name')
            ->toArray();

            $allowedPermissions = ['products', 'users', 'clients', 'categories', 'roles'];
            $hasPermission = [];

            foreach ($allowedPermissions as $permission) {
                $hasPermission[$permission] = in_array($permission, $permissions);
            }

            $view->with('hasPermission', $hasPermission);
        });
    }

}
