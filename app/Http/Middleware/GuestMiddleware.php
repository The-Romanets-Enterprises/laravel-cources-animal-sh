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
                Role::ADMIN => redirect()->route('dashboard.admin.home'),
                Role::EMPLOYEE => redirect()->route('dashboard.employee.home'),
                Role::USER => redirect()->route('dashboard.user.home'),
                default => redirect()->route('dashboard.index'),
            };
        }

        return $next($request);
    }
}
