<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use function Ramsey\Uuid\v1;

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

    public function create(Request $request){
        
				$student = new Students();
                $user = new User();

                $student->student_no = $request->student_no;
                $student->fname =$request->firstname;
                $student->lname =$request->lastname;
				$student->mname = $request->mname;
                $student->gender = $request->gender;
                $student->bday =$request->bday;
				$student->bplace = $request->bplace;
                $student->age = $request->age;
                $student->contact = $request->contact;
                $student->email =$request->email;
				$student->address =$request->address;

                $user->name=$request->firstname;
                $user->email=$request->email;
                $user->password=$request->student_no;
				
				$student->save();
                $user->save();
				    
                return view('admin.dashboard');
    }
    
}
