<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends Controller
{
    public function home()
    {
        $title = __('dashboard.titles.employee.home');
        return view('dashboard.employee.home', compact('title'));
    }
}
