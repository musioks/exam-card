<?php

namespace App\Http\Controllers\Exams;

use App\Exams\Score;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Repos\Rank;
use App\Repos\denseRank;
class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function student()
    {
       return view('exams.results.get_student');
    }
    public function student_results(Request $request){
        $a= $request->adm_no;
        $e= $request->exam_id;
        $t= $request->term_id;
        $y=$request->year;
        $p= 1;
        $m= 2;
        $n= 3;
        if($e=="combined"){
            # combined student result code
            /////////////////////////OPENER EXAM////////////////////////////////////////////////////////////
 $opener=collect(DB::select('select s.fname,s.lname,s.photo,c.id,c.form,st.stream_name,e.exam_name,sc.total,r.adm_no,r.initials,r.exam_id,r.year,r.term_id,
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
  from results r,students s,scores sc,forms c,streams st,exams e where r.adm_no=:a and r.exam_id=:e and r.term_id=:t and r.year=:y and r.adm_no=s.adm_no and s.form_id=c.id and s.stream_id=st.id and sc.adm_no=r.adm_no and sc.exam_id=r.exam_id and sc.term_id=r.term_id and sc.year=r.year and r.exam_id=e.id group by r.adm_no',
            ['a'=>$a,'e'=>$p,'t'=>$t,'y'=>$y]))->first();

 ////////////////////////////////END OPENER/////////////////////////////////////////////
 ////////////////////////////////////MIDTERM EXAM//////////////////////////////////////////
 $midterm=collect(DB::select('select s.fname,s.lname,s.photo,c.id,c.form,st.stream_name,e.exam_name,sc.total,r.adm_no,r.initials,r.exam_id,r.year,r.term_id,
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
  from results r,students s,scores sc,forms c,streams st,exams e where r.adm_no=:a and r.exam_id=:e and r.term_id=:t and r.year=:y and r.adm_no=s.adm_no and s.form_id=c.id and s.stream_id=st.id and sc.adm_no=r.adm_no and sc.exam_id=r.exam_id and sc.term_id=r.term_id and sc.year=r.year and r.exam_id=e.id group by r.adm_no',
            ['a'=>$a,'e'=>$m,'t'=>$t,'y'=>$y]))->first();

 //////////////////////END MIDTERM/////////////////////////////////////////////

  ////////////////////////////////////ENDTERM EXAM//////////////////////////////////////////
 $endterm=collect(DB::select('select s.fname,s.lname,s.photo,c.id,c.form,st.stream_name,e.exam_name,sc.total,r.adm_no,r.initials,r.exam_id,r.year,r.term_id,
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
  from results r,students s,scores sc,forms c,streams st,exams e where r.adm_no=:a and r.exam_id=:e and r.term_id=:t and r.year=:y and r.adm_no=s.adm_no and s.form_id=c.id and s.stream_id=st.id and sc.adm_no=r.adm_no and sc.exam_id=r.exam_id and sc.term_id=r.term_id and sc.year=r.year and r.exam_id=e.id group by r.adm_no',
            ['a'=>$a,'e'=>$n,'t'=>$t,'y'=>$y]))->first();

 //////////////////////END ENDTERM/////////////////////////////////////////////

        //////////////////////////////////Get total and  student  info//////////////////

        $marks=collect(DB::select('SELECT s.fname,s.photo,s.lname,s.adm_no,c.id,c.form,r.adm_no,r.form_id,r.stream_id,
r.initials,r.year,r.term_id,
  sum(case when `subject_id`=1 then round(score/3,1) else 0 end)English,
  sum(case when `subject_id`=2 then round(score/3,1) else 0 end) Kiswahili,
  sum(case when `subject_id`=3 then round(score/3,1) else 0 end) Mathematics,
  sum(case when `subject_id`=4 then round(score/3,1) else 0 end) Biology,
  sum(case when `subject_id`=5 then round(score/3,1) else 0 end) Physics,
  sum(case when `subject_id`=6 then round(score/3,1) else 0 end) Chemistry,
  sum(case when `subject_id`=7 then round(score/3,1) else 0 end) History,
  sum(case when `subject_id`=8 then round(score/3,1) else 0 end) Geography,
  sum(case when `subject_id`=9 then round(score/3,1) else 0 end) CRE,
  sum(case when `subject_id`=10 then round(score/3,1) else 0 end) Agriculture,
  sum(case when `subject_id`=11 then round(score/3,1) else 0 end) Business

  from results r JOIN students s ON r.adm_no=s.adm_no INNER JOIN forms c ON r.form_id=c.id
   WHERE
  r.adm_no=:f and r.term_id=:t  and r.year=:y 
    group by r.adm_no ',
            ['f'=>$a,'t'=>$t,'y'=>$y]))->first();
              ////////////////////-------------------- GET INITIALS-------------///////////////////
        $initials=DB::select("SELECT adm_no,exam_id,term_id,year,subject_id,initials,
  case when `subject_id`=1 then initials else '' end as init1,
  case when `subject_id`=2 then initials else ''  end as init2,
  case when `subject_id`=3 then initials else '' end  as init3,
  case when `subject_id`=4 then initials else '' end as init4,
  case when `subject_id`=5 then initials else '' end as init5,
  case when `subject_id`=6 then initials else '' end as init6,
  case when `subject_id`=7 then initials else '' end as init7,
  case when `subject_id`=8 then initials else '' end as init8,
  case when `subject_id`=9 then initials else '' end as init9,
  case when `subject_id`=10 then initials else '' end as init10,
  case when `subject_id`=11 then initials else '' end as init11
  FROM results
WHERE adm_no=:a AND exam_id=:e AND term_id=:t AND year=:y ",
            ["a"=>$a,"e"=>$p,"t"=>$t,"y"=>$y]);
        ///////////////////////END INITIALS/////////////////////

        //////////.....................RANK -----------------------///////////////////////
        if (collect($marks)->isEmpty()) {
  return redirect()->back()->with('error','Results for that student found!');
}
else{
           $positions=DB::select("select adm_no , sum(total) tmark from scores
          WHERE form_id=:f AND year=:y AND term_id=:t  GROUP BY adm_no
          ORDER BY tmark DESC ",
            ['f'=>$marks->form,'y'=>$y,'t'=>$t]
        );
        $positions=denseRank::students( collect($positions) )->where('adm_no',$a)->first();
      //  dd($positions);
      
         ///////////////////Combined Result///////////////////////
        return view ('exams.results.student-combined',
            [
                'marks'=>$marks,
                'initials'=>$initials,
                'opener'=>$opener,
                'midterm'=>$midterm,
                'endterm'=>$endterm,
                'positions'=>$positions,
            ]);

        }
    }
 # ***************** End student combined exam result******************
        else{
            # ***************** Individual exam result for the student******************
$marks=collect(DB::select('select s.fname,s.lname,s.photo,c.id,c.form,st.stream_name,e.exam_name,sc.total,r.adm_no,r.initials,r.exam_id,r.year,r.term_id,
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
  from results r,students s,scores sc,forms c,streams st,exams e where r.adm_no=:a and r.exam_id=:e and r.term_id=:t and r.year=:y and r.adm_no=s.adm_no and s.form_id=c.id and s.stream_id=st.id and sc.adm_no=r.adm_no and sc.exam_id=r.exam_id and sc.term_id=r.term_id and sc.year=r.year and r.exam_id=e.id group by r.adm_no',
    ['a'=>$a,'e'=>$e,'t'=>$t,'y'=>$y]))->first();
//dd($marks);
if (collect($marks)->isEmpty()) {
  return redirect()->back()->with('error','Results for that student not found!');
}
else{
      ////////////////////-------------------- GET INITIALS-------------///////////////////
        $initials=DB::select("SELECT adm_no,exam_id,term_id,year,subject_id,initials,
  case when `subject_id`=1 then initials else '' end as init1,
  case when `subject_id`=2 then initials else ''  end as init2,
  case when `subject_id`=3 then initials else '' end  as init3,
  case when `subject_id`=4 then initials else '' end as init4,
  case when `subject_id`=5 then initials else '' end as init5,
  case when `subject_id`=6 then initials else '' end as init6,
  case when `subject_id`=7 then initials else '' end as init7,
  case when `subject_id`=8 then initials else '' end as init8,
  case when `subject_id`=9 then initials else '' end as init9,
  case when `subject_id`=10 then initials else '' end as init10,
  case when `subject_id`=11 then initials else '' end as init11
  FROM results
WHERE adm_no=:a AND exam_id=:e AND term_id=:t AND year=:y ",
            ["a"=>$a,"e"=>$e,"t"=>$t,"y"=>$y]);
        ///////////////////////END INITIALS/////////////////////
     $positions=DB::select("select * from scores 
          WHERE form_id=:f AND year=:y AND term_id=:t AND exam_id=:e 
          ORDER BY total DESC ", 
          ['f'=>$marks->form,'y'=>$y,'t'=>$t,'e'=>$e]
        );
  $positions=  Rank::students( collect($positions) )->where('adm_no',$a)->first();
     return view ('exams.results.index',['marks'=>$marks,'positions'=>$positions,'initials'=>$initials]);
        }
    }
       
    }
        public function stream()
    {
        return view('exams.results.get_stream');
    }
        public function class()
    {
        return view('exams.results.get_class');
    }

}
