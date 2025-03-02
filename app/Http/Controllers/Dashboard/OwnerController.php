<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function home()
    {
        $title = __('dashboard.titles.owner.home');
        return view('dashboard.owner.home', compact('title'));
    }
}
