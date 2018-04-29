<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
     public function changePassword()
   {
    return view('profile.changePassword');
   }
    public function postChangePassword(Request $request, $id)
   {
    $request->validate([
        'password'=>'required|confirmed'
    ]);
    $password=bcrypt($request->password);
    DB::table('users')->where('id',$id)->update(['password'=>$password]);
    return redirect()->back()->with('info','Password has been updated!');
   }

   public function editprofile($id)
   {
   	$user=Auth::user();
   	return view('profile.editprofile')->withUser($user);
   }
   public function posteditprofile(Request $request, $id)
   {
   	$email=Auth::user()->email;
   	$newMail=$request->email;
   	if ($email == $newMail) {
   			$request->validate([
   		'name'=>'required',
   	]);
   	}else{
   		$request->validate([
   		'name'=>'required',
   		'email'=>'required|email|unique:users'
   	]);
   	}
   	DB::table('users')->where('id',$id)->update(['name'=>$request->name,'email'=>$request->email]);
   	 return redirect()->back()->with('success','Your profile has been updated successfully!');
   	}
   }

