<?php

namespace App\Http\Controllers;

use App\User;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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

        //This is the code for validation of every request
        $validated = Validator::make($request->all(), [
            'student_no' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'mname' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'bday' => 'required',
            'bplace' => 'required',
            'age' => 'required',
            'gender' => 'required',
            
        ]);
        if ($validated->fails()) {
            return redirect()->route('admin.dash')->with('message','Invalid');
        }

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
            return redirect()->route('admin.dash')->with('message','success');
    }
}
