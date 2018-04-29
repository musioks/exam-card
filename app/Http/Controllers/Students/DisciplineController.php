<?php

namespace App\Http\Controllers\Students;

use App\Students\Student;
use App\Students\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DisciplineController extends Controller
{
    public function index()
    {
    	$cases=DB::table('disciplines')
    						->join('students','disciplines.student_id','students.id')
    						->select('disciplines.*','students.fname','students.lname','students.adm_no')
    						->get();
    	return view('discipline.index')->with('cases', $cases);
    }
    public function create()
    {
    	$students=Student::all();
    	return view('discipline.create')->withStudents($students);
    }
    public function store(Request $request)
    {
    	$request->validate([
    		'student_id'=>'required',
    		'discipline_type'=>'required',
    		'date_committed'=>'required',
    		'description'=>'required',
    		'punishment'=>'required'
    	]);

    	Discipline::create(array_merge($request->all()));
            return redirect()->route('discipline.index')->with('success','Discipline record has been saved!');
    }
    public function edit($id)
    {
    	$students=Student::all();
    	$case=Discipline::find($id);
    	return view('discipline.edit')->withCase($case)->withStudents($students);
    }
    public function update(Request $request, $id)
    {
    		$request->validate([
    		'student_id'=>'required',
    		'discipline_type'=>'required',
    		'date_committed'=>'required',
    		'description'=>'required',
    		'punishment'=>'required'
    	]);
    		DB::table('disciplines')->where('id',$id)->update([
    								'student_id'=>$request->student_id,
    								'discipline_type'=>$request->discipline_type,
    								'date_committed'=>$request->date_committed,
    								'description'=>$request->description,
    								'punishment'=>$request->punishment
    		]);
    	 return redirect('/disciplines/index')->with('info','Case Record Updated!');
    }

    public function destroy($id)
    {
    	Discipline::find($id)->delete();
    return redirect()->back()->with('warning','Case Deleted success!');
    }

}
