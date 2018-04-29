<?php

namespace App\Http\Controllers\Exams;

use App\Exams\Result;
use App\Exams\Score;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function individual()
    {
         $subjects=DB::table('subjects')->get();
        $exams=\App\Exams\Exam::all();
        $students=DB::table('students')
                       ->join('streams','students.stream_id','streams.id')
                       ->join('forms','students.form_id','forms.id')
                       ->select('students.*','streams.stream_name as stream','forms.form')
                       ->where('students.academic_year',date('Y'))
                       ->get();
      return view('exams.submit.individual',['subjects'=>$subjects,'exams'=>$exams,'students'=>$students]);
    }

//-----------------------Submit Marks for individual students--------------------------------//
    public function student_marks(Request $request)
    {
        DB::transaction(function() use($request){
            $adm_no=$request->adm_no;
            $num=\App\Students\Student::where('adm_no',$adm_no)->first();
            $year=$request->year;
            $term_id=$request->term_id;
            $exam_id=$request->exam_id;
            $subject_id=$request->subject_id;
            $initials=$request->initials;
            $form_id=$num->form_id;
            $stream_id=$num->stream_id;
            $score=$request->score;
                Result::updateOrCreate([
                    'adm_no'=>$adm_no,
                    'year'=>$year,
                    'term_id'=>$term_id,
                    'exam_id'=>$exam_id,
                    'subject_id'=>$subject_id,
                    'form_id'=>$form_id,
                    'stream_id'=>$stream_id,
                    'initials'=>$initials],
                    ['score'=>$score]);


            $query=DB::select('select s.fname,s.lname,c.id,c.form,e.exam_name,r.adm_no,r.form_id,r.stream_id,r.exam_id,r.year,r.term_id,
  sum(case when `subject_id`=1 then score else 0 end)English,
  sum(case when `subject_id`=2 then score else 0 end)Kiswahili,
  sum(case when `subject_id`=3 then score else 0 end) Mathematics,
  sum(case when `subject_id`=4 then score else 0 end) Biology,
  sum(case when `subject_id`=5 then score else 0 end) Physics,
  sum(case when `subject_id`=6 then score else 0 end) Chemistry,
  sum(case when `subject_id`=7 then score else 0 end) History,
  sum(case when `subject_id`=8 then score else 0 end) Geography,
  sum(case when `subject_id`=9 then score else 0 end) CRE,
  sum(case when `subject_id`=10 then score else 0 end) Agriculture,
  sum(case when `subject_id`=11 then score else 0 end) Business
  from results r,students s,forms c,exams e where r.adm_no=:f and r.exam_id=:e and r.term_id=:t and r.year=:y and r.adm_no=s.adm_no and s.form_id=c.id and r.exam_id=e.id group by r.adm_no',
                ['f'=>$adm_no,'e'=>$exam_id,'t'=>$term_id,'y'=>$year]);
            $fetch=collect($query)->pluck('adm_no');
            foreach ($query as $student) {
                $adm=$student->adm_no;
              if ($student->form_id==1 || $student->form_id==2) {
                    # code...
                        $adm=$student->adm_no;
                $students[$adm]['total']=(collect([
                        'English' => $student->English,
                        'Kiswahili' => $student->Kiswahili,
                        'Mathematics' => $student->Mathematics,
                    ])->sum())+(collect([
                        'Biology' => $student->Biology,
                        'Physics' => $student->Physics,
                        'Chemistry' => $student->Chemistry
                    ])->sum())+(collect([
                        'History' => $student->History,
                        'Geography' => $student->Geography,
                        'CRE' => $student->CRE,
                        'Agriculture' => $student->Agriculture,
                        'Business' => $student->Business
                    ])->sum());
                }
                else{
                $students[$adm]['total']=(collect([
                        'English' => $student->English,
                        'Kiswahili' => $student->Kiswahili,
                        'Mathematics' => $student->Mathematics,
                    ])->sort()->take(3)->sum())+(collect([
                        'Biology' => $student->Biology,
                        'Physics' => $student->Physics,
                        'Chemistry' => $student->Chemistry
                    ])->sort()->take(-2)->sum())+(collect([
                        'History' => $student->History,
                        'Geography' => $student->Geography,
                        'CRE' => $student->CRE,
                        'Agriculture' => $student->Agriculture,
                        'Business' => $student->Business
                    ])->sort()->take(-2)->sum());
                }
            }
            $rows=collect($students)->pluck('total');
            $st=$fetch;
            $term=$request->term_id;
            $year=$request->year;
            $exam=$request->exam_id;
            $form=$num->form_id;
            $stream=$num->stream_id;
            $sum=$rows;
            $rows=count($st);
            for($j=0; $j<$rows; $j++){

                Score::updateOrCreate([
                    'adm_no'=>$st[$j],
                    'year'=>$year,
                    'term_id'=>$term,
                    'exam_id'=>$exam,
                    'form_id'=>$form,
                    'stream_id'=>$stream],
                    ['total'=>$sum[$j]
                    ]);
            }
        });
        return redirect()->back()->with('info','Marks have been submitted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exams\Result  $result
     * @return \Illuminate\Http\Response
     */

//-----------------------Submit Marks for class--------------------------------//
    public function view_class(){
      return view('exams.submit.get-class');
    }
        public function get_students(Request $request)
    {

      $form=Input::get('form_id');
      $stream=Input::get('stream_id');
      $year=Input::get('year');
      $subjects=\DB::table('subjects')->get();
        $exams=\App\Exams\Exam::all();
        $students=\DB::table('students')
                       ->join('streams','students.stream_id','streams.id')
                       ->join('forms','students.form_id','forms.id')
                       ->select('students.*','streams.stream_name as stream','forms.form')
                       ->where(['students.academic_year'=>$year,'students.form_id'=>$form,'students.stream_id'=>$stream])
                       ->get();
      return view('exams.submit.marksheet',[
        'subjects'=>$subjects,
        'exams'=>$exams,
        'students'=>$students,
        'form'=>$form,
        'stream'=>$stream,
      ]);
    }
    public function class_marks(Request $request)
    {
         DB::transaction(function() use($request){
          //dd($request->all());
            $adm_no=$request->adm_no;
            $year=$request->year;
            $term_id=$request->term_id;
            $exam_id=$request->exam_id;
            $subject_id=$request->subject_id;
            $form_id=$request->form_id;
            $stream_id=$request->stream_id;
            $initials=$request->initials;
            $score=$request->score;
            $total=count($adm_no);
            for($i=0; $i<$total; $i++){

                Result::updateOrCreate([
                    'adm_no'=>$adm_no[$i],
                    'year'=>$year,
                    'term_id'=>$term_id,
                    'exam_id'=>$exam_id,
                    'subject_id'=>$subject_id,
                    'form_id'=>$form_id,
                    'stream_id'=>$stream_id,
                    'initials'=>$initials
                  ],['score'=>$score[$i]]);

            }

            $query=DB::select('select s.fname,s.lname,c.id,c.form,e.exam_name,r.adm_no,r.form_id,r.stream_id,r.exam_id,r.year,r.term_id,
  sum(case when `subject_id`=1 then score else 0 end)English,
  sum(case when `subject_id`=2 then score else 0 end)Kiswahili,
  sum(case when `subject_id`=3 then score else 0 end) Mathematics,
  sum(case when `subject_id`=4 then score else 0 end) Biology,
  sum(case when `subject_id`=5 then score else 0 end) Physics,
  sum(case when `subject_id`=6 then score else 0 end) Chemistry,
  sum(case when `subject_id`=7 then score else 0 end) History,
  sum(case when `subject_id`=8 then score else 0 end) Geography,
  sum(case when `subject_id`=9 then score else 0 end) CRE,
  sum(case when `subject_id`=10 then score else 0 end) Agriculture,
  sum(case when `subject_id`=11 then score else 0 end) Business
  from results r,students s,forms c,exams e where s.form_id=:f and s.stream_id=:str and r.exam_id=:e and r.term_id=:t and r.year=:y and r.adm_no=s.adm_no and s.form_id=c.id and r.exam_id=e.id group by r.adm_no',
                ['f'=>$form_id,'str'=>$stream_id,'e'=>$exam_id,'t'=>$term_id,'y'=>$year]);
            $fetch=collect($query)->pluck('adm_no');
            foreach ($query as $student) {
                $adm=$student->adm_no;
                if ($student->form_id==1 || $student->form_id==2) {
                    # code...
                        $adm=$student->adm_no;
                $students[$adm]['total']=(collect([
                        'English' => $student->English,
                        'Kiswahili' => $student->Kiswahili,
                        'Mathematics' => $student->Mathematics,
                    ])->sum())+(collect([
                        'Biology' => $student->Biology,
                        'Physics' => $student->Physics,
                        'Chemistry' => $student->Chemistry
                    ])->sum())+(collect([
                        'History' => $student->History,
                        'Geography' => $student->Geography,
                        'CRE' => $student->CRE,
                        'Agriculture' => $student->Agriculture,
                        'Business' => $student->Business
                    ])->sum());
                }
                else{
                $students[$adm]['total']=(collect([
                        'English' => $student->English,
                        'Kiswahili' => $student->Kiswahili,
                        'Mathematics' => $student->Mathematics,
                    ])->sort()->take(3)->sum())+(collect([
                        'Biology' => $student->Biology,
                        'Physics' => $student->Physics,
                        'Chemistry' => $student->Chemistry
                    ])->sort()->take(-2)->sum())+(collect([
                        'History' => $student->History,
                        'Geography' => $student->Geography,
                        'CRE' => $student->CRE,
                        'Agriculture' => $student->Agriculture,
                        'Business' => $student->Business
                    ])->sort()->take(-2)->sum());
                }
            }
            $rows=collect($students)->pluck('total');
            $st=$fetch;
            $term=$request->term_id;
            $year=$request->year;
            $exam=$request->exam_id;
            $form=$request->form_id;
            $stream=$request->stream_id;
            $sum=$rows;
            $rows=count($st);
            for($j=0; $j<$rows; $j++){

                Score::updateOrCreate([
                    'adm_no'=>$st[$j],
                    'year'=>$year,
                    'term_id'=>$term,
                    'exam_id'=>$exam,
                    'form_id'=>$form,
                    'stream_id'=>$stream],
                    ['total'=>$sum[$j]
                    ]);
            }
        });
        return redirect('/exams/class')->with('info','Marks have been submitted!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exams\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exams\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exams\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
