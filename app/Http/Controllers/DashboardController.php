<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Role;
use App\User;
class DashboardController extends Controller
{
   public function index(){
       $students=DB::table('students')->get()->count();
       $courses=DB::table('courses')->get()->count();
       $users=DB::table('users')->get()->count();
       $balances=DB::table('invoices')->where('balance','>',0)->get()->count();
   	return view('dashboard.index')->with([
           'students'=>$students,
           'courses'=>$courses,
           'users'=>$users,
           'balance'=>$balances,
           ]);
   }
    public function users(){
    $users=\App\User::all();
    $roles=Role::all();
   	return view('dashboard.users',['users'=>$users,'roles'=>$roles]);
   }
   public function adduser(Request $request){
    $this->validate($request,[
  'name'=>'required',
  'email'=>'required|unique:users|email',
  'password'=>'required',
     ]);
     $user=new User();
     $user->name=$request->name;
     $user->email=$request->email;
     $user->password=bcrypt($request->password);
     $user->save();
     return redirect()->back()->with('success','User succesfully created!');
    }
    public function editUser($id){
    $user=User::find($id);
     $roles=Role::all();
     $role_users = $user->roles()->pluck('id','id')->toArray();
     return view('dashboard.edituser',['user'=>$user,'roles'=>$roles,'role_users'=>$role_users]);
    }
    public function updateUser(Request $request, $id){
        $user=User::find($id);
        $user->update(array_merge($request->all()));
        $roles=$request->roles;
        //dd($request->all());
        DB::table('role_user')->where('user_id',$id)->delete();
        if($roles==""){
        return redirect()->back()->with('info','User details have been updated!');
        }
        else{
              foreach ($roles as $key=>$value){
            $user->attachRole($value);
    }
        return redirect()->back()->with('info','Role updated!');
        }
    }
    public function delete_user($id){
    	$user=User::find($id);
        DB::table('role_user')->where('user_id',$id)->delete();
        $user->delete();
        return redirect()->back()->with('info','User has been deleted!');
    	
    }
    public function profile(){
    	$user=Auth::user();
    	return view('dashboard.profile',['user'=>$user]);
    }
     public function updateProfile(Request $request){
    	
    }
}
