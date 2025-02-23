<?php

namespace App\Http\Controllers\Mainwebsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = __('messages.mainwebsite.home');
        return view('mainwebsite.index', compact('title'));
    }

    public function about()
    {
        $title = __('messages.mainwebsite.about');
        return view('mainwebsite.about', compact('title'));
    }

    public function contact()
    {
        $title = __('messages.mainwebsite.contact');
        return view('mainwebsite.contact', compact('title'));
    }
}
