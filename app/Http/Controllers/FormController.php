<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{

    public function dashboard(Request $request)
    {
        return view('surat.dashboard');
    }
    public function list(Request $request)
    {
        return view('surat.list');
    }

    public function add(Request $request)
    {
        return view('surat.add');
    }
}
