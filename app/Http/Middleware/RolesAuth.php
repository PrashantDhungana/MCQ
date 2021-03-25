<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;
    
class RolesAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $role = Role::findOrFail(auth()->user()->role_id);
        $permissions = $role->permissions;
        $actionName = class_basename($request->route()->getActionname());
        // check if requested action is in permissions list
        foreach ($permissions as $permission)
        {
            // dd($permission->controller);
            // dump($permission->method);
            // dd($actionName);

            $_namespaces_chunks = explode('\\', $permission->controller);
            $controller = end($_namespaces_chunks);

            if ($actionName == $controller . '@' . $permission->method)
            {
            // authorized request
            return $next($request);
            }
        }
        // none authorized request
        return abort(403, 'Unauthorized Action');
        // if($role->id)
        // {

        // }
        $permissions = $role->permissions;
        return $next($request);
    }
}
