<?php

namespace App\Http\Controllers\Students;

use App\Students\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $students=\DB::table('students')
                       ->join('streams','students.stream_id','streams.id')
                       ->join('forms','students.form_id','forms.id')
                       ->select('students.*','streams.stream_name as stream','forms.form')
                       ->get();
        return view('students.index',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $forms=\App\Settings\Form::all();
        $streams=\App\Settings\Stream::all();
      return view('students.add-student',['forms'=>$forms,'streams'=>$streams]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'adm_no'=>'required',
        'fname'=>'required',
        'lname'=>'required',
        'dob'=>'required',
        'doa'=>'required',
        'gender'=>'required',
        'religion'=>'required',
        'form_id'=>'required',
        'stream_id'=>'required',
        'kcpe_entry'=>'required',
        'parent_name'=>'required',
        'parent_contact'=>'required',
        'disability'=>'required',
        'special_condition'=>'required',
        'boarding'=>'required',
        'academic_year'=>'required',
        ]);
    $student = Student::create(array_merge($request->all()));
if ($request->hasFile('photo')) {
      $file=$request->file('photo');
        $fileName= time().'.'.$file->getClientOriginalExtension();
        $request->photo->move('images/students/',$fileName);
        $student->update(['photo' => $fileName]);
}
    return redirect('/students')->with('success','Student has been created!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Students\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Students\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $forms=\App\Settings\Form::all();
        $streams=\App\Settings\Stream::all();
        $student=\DB::table('students')
                       ->join('streams','students.stream_id','streams.id')
                       ->join('forms','students.form_id','forms.id')
                       ->select('students.*','streams.stream_name as stream','forms.form')
                       ->where('students.id',$id)
                       ->first();
        return view('students.edit-student',['student'=>$student,'forms'=>$forms,'streams'=>$streams]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Students\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $student=Student::find($id);
    $student->update(array_merge($request->all()));
if ($request->hasFile('photo')) {
      $file=$request->file('photo');
        $fileName= time().'.'.$file->getClientOriginalExtension();
        $request->photo->move('images/students/',$fileName);
        $student->update(['photo' => $fileName]);
}
    return redirect('/students')->with('info','Student info has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Students\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $student=Student::find($id);
       $student->delete();
        return redirect()->back()->with('info','Student has been deleted!');
    }
}
