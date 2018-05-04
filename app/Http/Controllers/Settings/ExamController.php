<?php

namespace App\Http\Controllers\Settings;

use App\Exams\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams=\DB::table('exams')
        ->join('subjects','exams.unit_id','subjects.id')
        ->select('exams.*','subjects.subject_name as unit')
        ->get();
        return view('settings.exams',['exams'=>$exams]);
    }
     public function students()
    {
         $students=\DB::table('students')
                       ->join('courses','students.course_id','courses.id')
                       ->join('forms','students.form_id','forms.id')
                       ->select('students.*','courses.course_name as course','forms.form')
                       ->get();
        return view('exams.students',['students'=>$students]);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
       'unit_id'=>'required', 
       'name'=>'required', 
       'exam_date'=>'required', 
        ]);
        Exam::create(array_merge($request->all()));
        return redirect()->back()->with('success','Exam has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exams\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exams\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exams\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $exam=Exam::find($request->id);
       $exam->update(array_merge($request->all()));
       return redirect()->back()->with('info','Exam type has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exams\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $exam=Exam::find($id);
       $exam->delete();
        return redirect()->back()->with('warning','Exam has been deleted!');
    }
}
