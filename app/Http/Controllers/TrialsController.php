<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrialsController extends Controller
{
    public function sidebar()
    {
        return view('trysidebar');
    }
}
