<?php

namespace App\Http\Controllers;

use App\AdminImages;
use App\Students;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $profile=DB::table('students')->where('student_no',Auth::user()->username )->first();
        
        return view('students.profile',compact('profile'));
    }
    public function editProfile()
    {
        $info=DB::table('students')->where('student_no',Auth::user()->username )->first();
        return view('students.editProfile',compact('info'));
    }
    public function saveEdit(Request $request,$id)
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
                $users = DB::table('users')->where('username',Auth::user()->username)->update($user);

            return redirect()->route('student.prof')->with('success','Student Updated Succesfully');
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
                $users = DB::table('users')->where('username',Auth::user()->username)->update($user);

            return redirect()->route('student.prof')->with('success','Student Updated Succesfully');
        }
    }
}
