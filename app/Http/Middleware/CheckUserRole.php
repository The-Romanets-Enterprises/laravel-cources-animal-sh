<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\Role;

class CheckUserRole
{
    /**
     * Обрабатывает входящий запрос.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Разрешаем заходить на /panel/index всем ролям
        if ($request->routeIs('dashboard.user.home')) {
            return $next($request);
        }

        // Владелец может заходить в админ и сотрудник и обычный пользователь
        if ($user->isOwner() && $request->routeIs('dashboard.owner.*', 'dashboard.admin.*', 'dashboard.employee.*')) {
            return $next($request);
        }

        // Админ может заходить в админ и сотрудник
        if ($user->isAdmin() && $request->routeIs('dashboard.admin.*', 'dashboard.employee.*')) {
            return $next($request);
        }

        // Сотрудник может заходить в employee и user
        if ($user->isEmployee() && $request->routeIs('dashboard.employee.*', 'dashboard.user.*')) {
            return $next($request);
        }

        // Обычный пользователь может заходить только в user
        if ($user->isUser() && $request->routeIs('dashboard.user.*')) {
            return $next($request);
        }

        // Если пользователь пытается зайти в чужой раздел, редиректим его домой
        return match ($user->role) {
            Role::OWNER => redirect()->route('dashboard.owner.home'),
            Role::ADMIN => redirect()->route('dashboard.admin.home'),
            Role::EMPLOYEE => redirect()->route('dashboard.employee.home'),
            Role::USER => redirect()->route('dashboard.user.home'),
            default => abort(403),
        };
    }
}
