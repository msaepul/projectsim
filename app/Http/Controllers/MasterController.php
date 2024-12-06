<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('master.dashboard');
    }
    public function data(Request $request)
    {
        return view('master.data');
    }
}
