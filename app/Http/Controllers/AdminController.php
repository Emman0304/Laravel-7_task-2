<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



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

    public function popo(Request $request){
        
		
               
                return view('admin.dashboard');
    }

    public function create(Request $request)
    {

        $request->validate([
            'student_no' => 'required|unique:students',
            'firstname' => 'required',
            'lastname' => 'required',
            'mname' => 'required',
            'email' => 'required|email|unique:students',
            'contact' => 'required|unique:students',
            'bday' => 'required',
            'bplace' => 'required',
            'age' => 'required',
            'gender' => 'required',
            
        ]);

            $students = DB::table('students')->insert(
                [
                    'student_no' => $request->student_no,
                    'fname' => $request->firstname,
                    'lname' => $request->lastname,
                    'mname' => $request->mname,
                    'email' => $request->email,
                    'age' => $request->age,
                    'contact' => $request->contact,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'bday' => $request->bday,
                    'bplace' => $request->bplace
                ]
            );
            $users = DB::table('users')->insert(
                [
                    'email' => $request->email,
                    'username' => $request->student_no,
                    'password' => Hash::make($request->lastname)
                    
                ]
            );
            return redirect()->route('admin.userAccs')->with('success','Student added succesfully');
    }
}
