<?php

namespace App\Http\Controllers\Mainwebsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = __('mainwebsite.titles.index');
        return view('mainwebsite.index', compact('title'));
    }

    public function ourspecialists()
    {
        $title = __('mainwebsite.titles.our-specialists');
        return view('mainwebsite.our-specialists', compact('title'));
    }

    public function contacts()
    {
        $title = __('mainwebsite.titles.contacts');
        return view('mainwebsite.contacts', compact('title'));
    }

    public function terms()
    {
        $title = __('mainwebsite.titles.terms');
        return view('mainwebsite.terms', compact('title'));
    }

    public function privacy_policy()
    {
        $title = __('mainwebsite.titles.privacy-policy');
        return view('mainwebsite.privacy-policy', compact('title'));
    }
}
