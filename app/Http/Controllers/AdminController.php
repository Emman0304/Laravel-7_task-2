<?php

namespace App\Http\Controllers;

use App\Announcements;
use App\Exports\StudentExport;
use App\Helpers\Helper;
use App\Imports\StudentImport;
use App\Students;
use App\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $students = Students::orderBy('student_no','desc')->paginate(5);
  
        return view('admin.studentProf',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function adminAnn()
    {
        
        $announcements = Announcements::latest()->paginate(5);
        
        return view('admin.announcement',compact('announcements'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function adminUserAccs()
    {
        return view('admin.userAccs');
    }

    public function layoutView()
    {
        return view('admin.layouts');
    }
    public function adminCreateAnn()
    {
        return view('admin.createAnn');
    }
    Public function editAnn($id){
        $ann=DB::table('announcements')->where('id',$id)->first();
        return view('admin.editAnn',compact('ann'));
    }
    public function tablePDF()
    {
        $students = DB::table('students')->get();

        return view('admin.tablePDF',compact('students'));
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
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            
        ]);

        if ($request->hasFile('image')) {
            $destination_path = 'public/image/students';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);

            $input['image'] = $image_name;
            
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
                    'image' => $request->image=$image_name,
                    
                ]
            );

            User::create(
                [
                    'name' => $request->fname,
                    'email' => $request->email,
                    'username' => $request->student_no=$student_id,
                    'password' => Hash::make($request->lastname),
                    'role' => $request->role=1
            
                    
                ]
            );

            return redirect()->route('admin.userAccs')->with('success','Student added succesfully');

        }else{

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
                    'bplace' => $request->bplace
                ]
            );

            User::create(
                [
                    'name' => $request->fname,
                    'email' => $request->email,
                    'username' => $request->student_no=$student_id,
                    'password' => Hash::make($request->lastname),
                    'role' => $request->role=1
                    
                ]
            );

            return redirect()->route('admin.userAccs')->with('success','Student added succesfully');
        }

        
    }
    public function export() 
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }
    public function importStudent(Request $request)  
        {

             $file=$request->file('excel');

            if ($request->hasFile('excel')) {
               $file->store('import');

                $import=new StudentImport;
                $import->import($file);

                if ($import->failures()->isNotEmpty()) {
                    return redirect()->route('admin.studentProf')->withFailures($import->failures());
                }

                return redirect()->route('admin.studentProf')->with('success','Excel imported successfully');
                
            }else{
                return redirect()->route('admin.studentProf')->with('error','Nothing Selected');
            }
        
        
        }
    public function destroy($id)
    {
        $data = DB::table('announcements')->where('id',$id)->first(); 
        $dataDel = DB::table('announcements')->where('id',$id)->delete(); 

        return redirect()->route('admin.ann')
                        ->with('success','Student info deleted successfully');
    }
    public function createAnn(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
            // 'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $image = array();
        if ($files = $request->file('image')) {
            foreach($files as $file){
                $image_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'public/admin_ann/post_images/';
                $image_url = $upload_path.$image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        }

        if ($request->hasFile('image')) {
            Announcements::create([
                'images' => implode('|',$image),
                'title' => $request->title,
                'content' => $request->content
            ]);
            return redirect()->route('admin.ann')->with('success','New Announcement Created');
        }else {
            Announcements::create([
                
                'title' => $request->title,
                'content' => $request->content
            ]);
            return redirect()->route('admin.ann')->with('success','New Announcement Created');
        }
        

    }

    public function saveEdit(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required|unique:announcements,content,'.$id
            // 'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $image = array();
        if ($files = $request->file('image')) {
            foreach($files as $file){
                $image_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'public/admin_ann/post_images/';
                $image_url = $upload_path.$image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
                
            }
        }
        
        if ($request->hasFile('image')) {
            $data=array();
                    $data["images"]=implode('|',$image);
                    $data["title"]=$request->title;
                    $data["content"]=$request->content;
        
            $anns = DB::table('announcements')->where('id',$id)->update($data);

            return redirect()->route('admin.ann')->with('success','Updated Successfuly');
        }else {
            $data=array();
                    $data["title"]=$request->title;
                    $data["content"]=$request->content;
        
            $anns = DB::table('announcements')->where('id',$id)->update($data);

            return redirect()->route('admin.ann')->with('success','Updated Successfuly');
        }
        
        
    }
    
    public function chartsView(){

        // GENDER CHART
        $data = DB::table('students')
        ->select(
            DB::raw('gender as gender'),
            DB::raw('count(*) as number'))
        ->groupBy('gender')
        ->get();

        $array[] = ['Gender', 'Number']; 

        foreach($data as $key => $value){
            $array[++$key] = [$value->gender, $value->number];
        }

        // APPLICATION CHART
        $studentApplications = DB::table('students')
        ->select(
            DB::raw("day(created_at) as day"),
            DB::raw("count(*) as number"))
            
        ->groupBy(DB::raw("day(created_at)"),'role')
        ->get();

        $result[] = ['Application', 'Number'];

        foreach ($studentApplications as $key => $value) {
        $result[++$key] = [$value->day, $value->number];
        }

        return view('admin.dashboard')->with('gender', json_encode($array))->with('application',json_encode($result));
    }
    public function generatePDF()
    {
            $students = Students::all();
            $pdf = PDF::loadView('admin.tablePDF',compact('students'));

            return $pdf->download('students.pdf');
    }
    public function destroyStudent($student_id)
    {
        // $data = DB::table('students')->where('id',$id)->first(); 
        // $dataDel = DB::table('students')->where('id',$id)->delete(); 

        $student = DB::table('students')->where('id',$student_id)->first();
        $studentEmail = DB::table('students')->where('id',$student_id)->value('email');

        $user = DB::table('users')->where('email',$studentEmail)->first();
        $userEmail=DB::table('users')->where('email',$studentEmail)->value('id');

        $studentDel=DB::table('students')->where('id',$student_id)->delete();
        $userDel = DB::table('users')->where('id',$userEmail)->delete();

        return redirect()->route('admin.studentProf')
                        ->with('success','Student info deleted successfully');
    }
    public function editProfile($id)
    {
        $info=DB::table('students')->where('id',$id )->first();
        return view('admin.editProfile',compact('info'));
    }

    public function saveStudentEdit(Request $request,$id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'mname' => 'required',
            'email' => 'required|email|unique:students,email,'.$id,
            'contact' => 'required|unique:students,contact,'.$id,
            'bday' => 'required',
            'bplace' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            
        ]);
        if ($request->hasFile('image')) {
            $destination_path = 'public/image/students';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);

            $input['image'] = $image_name;
            
            $data=array();
                $data["image"]=$request->image=$image_name;
                $data["fname"]=$request->firstname;
                $data["lname"]=$request->lastname;
                $data["mname"]=$request->mname;
                $data["age"]=$request->age;
                $data["gender"]=$request->gender;
                $data["bday"]=$request->bday;
                $data["bplace"]=$request->bplace;
                $data["contact"]=$request->contact;
                $data["email"]=$request->email;
                $data["address"]=$request->address;

            $user=array();
                $user["password"]= Hash::make($request->lastname);
                $user["email"]=$request->email;

                $studs = DB::table('students')->where('id',$id)->update($data);
                $users = DB::table('users')->where('id',$id)->update($user);

            return redirect()->route('admin.studentProf')->with('success','Student Updated Succesfully');
        }else{
            
            $data=array();
                
                $data["fname"]=$request->firstname;
                $data["lname"]=$request->lastname;
                $data["mname"]=$request->mname;
                $data["age"]=$request->age;
                $data["gender"]=$request->gender;
                $data["bday"]=$request->bday;
                $data["bplace"]=$request->bplace;
                $data["contact"]=$request->contact;
                $data["email"]=$request->email;
                $data["address"]=$request->address;

            $user=array();
                $user["password"]= Hash::make($request->lastname);
                $user["email"]=$request->email;
                
                $studs = DB::table('students')->where('id',$id)->update($data);
                $users = DB::table('users')->where('id',$id)->update($user);

            return redirect()->route('admin.studentProf')->with('success','Student Updated Succesfully');
        }
    }
    public function createAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email'    => 'required|email|unique:users',
            'password' => 'required',
            'confirmPassword' => 'required|same:password'
        ]);

            User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
            'role' => $request->role=0
            ]);

            return redirect()->route('admin.userAccs')->with('success','Admin account added successfuly');
        

        
    }

}
