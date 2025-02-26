<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home()
    {
        $title = __('dashboard.titles.admin.home');
        return view('dashboard.admin.home', compact('title'));
    }
}
