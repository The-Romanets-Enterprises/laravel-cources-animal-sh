<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        $title = __('dashboard.titles.user.home');
        return view('dashboard.index', compact('title'));
    }
}
