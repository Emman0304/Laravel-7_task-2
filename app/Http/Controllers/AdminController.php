<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Students;
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

        $student_id = Helper::IDGenerator(new Students(),'student_no',5,'2022A');

            $students = DB::table('students')->insert(
                [
                    'student_no' => $request->student_no=$student_id,
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
                    'fname' => $request->firstname,
                    'lname' => $request->lastname,
                    'mname' => $request->mname,
                    'username' => $request->student_no=$student_id,
                    'password' => Hash::make($request->lastname)
                    
                ]
            );
            return redirect()->route('admin.userAccs')->with('success','Student added succesfully');
    }
}
