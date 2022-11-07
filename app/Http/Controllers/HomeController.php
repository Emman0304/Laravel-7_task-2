<?php

namespace App\Http\Controllers;

use App\AdminImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function studentDash()
    {
        $images = DB::table('admin_images')->get();

        return view('students.dashboard',compact('images'));
        
        
    }
    public function studentProf()
    {
        return view('students.profile');
    }
}
