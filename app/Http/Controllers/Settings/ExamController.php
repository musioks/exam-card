<?php

namespace App\Http\Controllers\Settings;

use App\Exams\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
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
    public function student_exams($id){
        $student=\DB::table('students')->where('id',$id)->first();
        $exams=\DB::table('exams')
                       ->join('subjects','exams.unit_id','subjects.id')
                       ->join('courses','subjects.course_id','courses.id')
                       ->select('exams.*','courses.course_name as course','subjects.subject_name as unit')
                       ->where('courses.id',$student->course_id)
                       ->get();
                       //dd($exams);
        return view('exams.student-exams',['exams'=>$exams]);
    }
         public function exam_cards()
    {
         $students=\DB::table('students')
                       ->join('courses','students.course_id','courses.id')
                       ->join('forms','students.form_id','forms.id')
                       ->select('students.*','courses.course_name as course','forms.form')
                       ->get();
        return view('exams.exam-cards',['students'=>$students]);
    }
          public function print_card(Request $request, $id)
    {
        $balance=\DB::table('invoices')->where('adm_no',$request->adm_no)->first();
        if($balance->balance >0){
            return redirect()->back()->with('warning','Cannot generate exam card!, The student has a fee balance!');
        }
        else{
        $student=\DB::table('students')
                       ->join('courses','students.course_id','courses.id')
                       ->join('forms','students.form_id','forms.id')
                       ->select('students.*','courses.course_name as course','forms.form')
                       ->where('students.id',$id)
                       ->first();
     $pdf=PDF::loadView('exams.print-card',
              [
                'student'  =>  $student,
                'balance'  =>  $balance,
              ]
            )
     ->setPaper('a7', 'landscape');
  return $pdf->stream('Exam Card.pdf');
}
        
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
