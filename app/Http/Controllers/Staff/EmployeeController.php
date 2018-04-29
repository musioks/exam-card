<?php

namespace App\Http\Controllers\Staff;

use App\User;
use App\Staff\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
class EmployeeController extends Controller
{
    public function manageEmployee()
    {
        $staffs=Employee::all();
        return view('employee.index')
                ->with('staffs',$staffs);
    }
    public function create()
    {
        return view('employee.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nid'=>'required|min:8|unique:employees',
            'fname'=>'required|min:3',
            'lname'=>'required|min:3',
            'initials'=>'required',
            'gender'=>'required',
            'dob'=>'required',
            'empno'=>'required',
            'phone'=>'required|min:9',
            'email'=>'required|unique:users',
            'religion'=>'required'
        ]);
        $password=bcrypt($request->lname);
        $name=$request->fname.' '.$request->lname;
        $user=User::create(['name'=>$name,'initials'=>$request->initials, 'email'=>$request->email,'password'=>$password]);
        DB::transaction(function() use($request,$user){
           $staff=new Employee;
           $staff->nid=$request->nid;
           $staff->fname=$request->fname;
           $staff->lname=$request->lname;
           $staff->initials=$request->initials;
           $staff->gender=$request->gender;
           $staff->empno=$request->empno;
           $staff->dob=$request->dob;
           $staff->religion=$request->religion;
           $staff->phone=$request->phone;
           $staff->email=$request->email;
           $staff->user_id=$user->id;
          $staff->save();
           });
               return redirect()->route('manageEmployee')->with('success','Staff was created successfully!');       
    }
    public function edit($id)
    {
        $user=Employee::find($id);
        return view('employee.edit')->withUser($user);
    }

    public function update(Request $request, $id)
    {
        $users=DB::table('employees')->where('id',$id)->select('email','nid')->first();
        $oldEmail=$users->email;
        $oldID=$users->nid;
        if ($oldEmail == $request->email) {
                DB::table('users')->where('id',$request->user_id)
                      ->update([
                        'name'=>$request->fname.''.$request->laname
                    ]);
        }

    DB::table('employees')->where('id',$id)
                    ->update([
                        'fname'=>$request->fname,
                        'lname'=>$request->lname,
                        'initials'=>$request->initials,
                        'nid'=>$request->id_no,
                        'gender'=>$request->gender,
                        'dob'=>$request->dob,
                        'empno'=>$request->empno,
                        'phone'=>$request->phone,
                        'religion'=>$request->religion,
                        'email'=>$request->email

                    ]);
    return redirect()->route('manageEmployee')->with('success','Record updated!'); 
    }

    public function destroy($id)
    {
        $user_id=DB::table('employees')->where('id',$id)->first()->user_id;
        Employee::find($id)->delete();
        User::find($user_id)->delete();
        return redirect()->route('manageEmployee')->with('info','Staff has been deleted!');

    }
}

