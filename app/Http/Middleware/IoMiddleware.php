<?php

namespace App\Http\Middleware;

use App\Services\MenuService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = auth()->user()->akses;
        if ($request->method() === 'GET') {
            $menuService = new MenuService();
            $menus = $menuService->list_menu($role);
            view()->share(['menus' => $menus]);
            $current_route = $request->route()->getName();
            $current_route_params = $request->query();
            view()->share($menuService::current_menu($menus, $current_route, $role, $current_route_params));

//            if (($role === 'Kecamatan' || $role === 'Desa') && $current_route === 'operator.siswa.index') {
//                $flag_status = intval($current_route_params['flag_status'] ?? '0');
//                if ($role === 'Kecamatan' && $flag_status > 1) abort(401);
//                if ($role === 'Desa' && $flag_status > 0) abort(401);
//            }
        }

        return $next($request);
    }
}
