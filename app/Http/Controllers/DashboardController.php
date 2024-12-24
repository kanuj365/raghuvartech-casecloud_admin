<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // dd('Dashboard controller index method');
        return view('dashboard');
    }
}

