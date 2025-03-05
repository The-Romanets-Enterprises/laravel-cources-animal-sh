<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\Role;

class GuestMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return match (Auth::user()->role) {
                Role::ADMIN => to_route('dashboard.admin.home'),
                Role::EMPLOYEE => to_route('dashboard.employee.home'),
                Role::USER => to_route('dashboard.user.home'),
                default => to_route('dashboard.index'),
            };
        }

        return $next($request);
    }
}
