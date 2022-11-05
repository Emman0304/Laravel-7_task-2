<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Helpers\Helper;
use App\Helpers\HelperUser;
use App\Imports\StudentImport;
use App\Imports\UserImport;
use App\Students;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{

    public function adminDash()
    {
        return view('admin.dashboard');
    }
    public function adminStudentProf()
    {
        $students = Students::latest()->paginate(5);
  
        return view('admin.studentProf',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function adminAnn()
    {
        return view('admin.announcement');
    }
    public function adminUserAccs()
    {
        return view('admin.userAccs');
    }

    public function layoutView()
    {
        return view('admin.layouts');
    }

    public function image()
    {
        return view('image');
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
            'address' => 'required',
            'image' => 'required'
            
        ]);

        if ($request->hasFile('image')) {
            $destination_path = 'public/image/students';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);

            $input['image'] = $image_name;
        }

        $student_id = Helper::IDGenerator(new Students(),'student_no',5,'2022A');

            Students::create(
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
                    'bplace' => $request->bplace,
                    'image' => $request->image=$image_name
                ]
            );

            User::create(
                [
                    'name' => $request->fname,
                    'email' => $request->email,
                    'username' => $request->student_no=$student_id,
                    'password' => Hash::make($request->lastname)
                    
                ]
            );

            return redirect()->route('admin.userAccs')->with('success','Student added succesfully');
    }
    public function export() 
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }
    public function importStudent(Request $request)  
        {
            // Excel::import(new UsersImport, $request->file);
            $file=$request->file('file')->store('import');

            $import=new StudentImport;
            $import->import($file);

            // $importUser=new UserImport;
            // $importUser->import($file);
            // dd($import->failures());

            if ($import->failures()->isNotEmpty()) {
                return redirect()->route('admin.studentProf')->withFailures($import->failures());
            }

            // if ($importUser->failures()->isNotEmpty()) {
            //     return redirect()->route('admin.studentProf')->withFailures($importUser->failures());
            // }

            return redirect()->route('admin.studentProf')->with('success','Excel imported successfully');
        
        }


}
