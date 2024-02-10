<?php

namespace App\Http\Middleware;

use App\Models\Permessions;
use App\Models\Role;
use App\Models\Role_permission;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        // Routes publiques qui ne nécessitent pas de vérification de permission
        $publicRoutes = [
            'login',
            'logout',
            'loginpost',
            'registerpost',
            'register',
            'password-reset',
            'allproducts',
            'password-reset/{token}',
            'new-password'
        ];

        $uri = $request->route()->uri;
        $role_id = session('user_role');

        if (in_array($uri, $publicRoutes)) {
            return $next($request);
        }
        if (!$role_id) {
            return abort(401);
        }

        $role = Role::find($role_id);
        $permissions = $role->permissions()->pluck('permessions_name')->toArray();
        if (!in_array($uri, $permissions)) {
            return abort(403, 'You dont have the access!!.');
        }
         
        return $next($request);
    }


}
