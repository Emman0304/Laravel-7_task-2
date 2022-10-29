<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function adminDash()
    {
        return view('admin.dashboard');
    }
    public function adminStudentProf()
    {
        return view('admin.studentProf');
    }
    public function adminAnn()
    {
        return view('admin.announcement');
    }
    public function adminUserAccs()
    {
        return view('admin.userAccs');
    }

    public function store(Request $request)
    {
        $request->student_no=$request->student_no;
        $request->firsname=$request->fname;
        $request->lastname=$request->lname;
        $request->mname=$request->mname;
        $request->gender=$request->gender;
        $request->bday=$request->bday;
        $request->bplace=$request->bplace;
        $request->age=$request->age;
        $request->contact=$request->contact;
        $request->email=$request->email;
        $request->address=$request->address;

        $request->save();
    }
    
}
