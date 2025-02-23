<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends Controller
{
    public function home()
    {
        $title = __('messages.dashboard.employee_home');
        return view('dashboard.employee.home', compact('title'));
    }
}
