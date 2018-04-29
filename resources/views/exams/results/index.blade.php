@extends('layouts.master')
@section('content')
    <div class="hidden-print">
        <div class="callout callout-info" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-user"></i> Student Results:</h4>
            <button  class="btn btn-warning text-center pull-right" onclick="window.print()" style="margin-top:-30px;">
                <i class="fa fa-print"></i>Print Results</button>
        </div>
    </div>
@php
          function get_grade($value){
$query=collect(\DB::select("SELECT name,grade_point, comment FROM  grading_systems WHERE $value>= mark_from AND $value<= mark_upto"))->first();
          return $query;
          }
@endphp
          <section class="invoice">
          <div class="row invoice-info">
              <div class="col-sm-3 invoice-col">
          <img src="{{asset('logo.jpg')}}" height="120" width="190" style="margin-top: -20px;" >
                  </div>
              <div class="col-sm-6 invoice-col">
          <div class="text-center" style="margin-top: -20px;">
            <h3>KARUNG'A SECONDARY SCHOOL.</h3>
             <h4>P.O. BOX 533 - 90400,MWINGI</h4>
            <h4><i>Motto:In Knowledge Dwells Strength</i></h4>
          </div>
              </div>
                  <div class="col-sm-3 invoice-col">
                      <div class="pull-right" >
                    @if(collect($marks)->isEmpty())
                     <img src="{{asset('students/default.png')}}" height="120" width="150"  style="margin-top: -15px;"
                              >
             
                          @else
         <img src="{{asset('students/'.$marks->photo)}}" height="120" width="150"  style="margin-top: -15px;">
                          @endif
                          </div>
                  </div>
              </div><!--end row-->
          &nbsp; &nbsp;
                      <table class="table table-bordered table-condensed">
     <tr >
        <td class="text-center"><strong>NAME:</strong>
         {{$marks->fname}} {{$marks->lname}}
</td>
        <td class="text-center"><strong>ADM No:</strong>
         {{$marks->adm_no}}
</td>
        <td class="text-center">Class: Form
         <b class="darasa">
             {{$marks->form}}
             @php
             $level=$marks->form;
             @endphp

         </b>
</td>
        <td class="text-center"><strong>Term:</strong>
         {{$marks->term_id}}
         </td>
<td class="text-center"><strong>Exam:</strong>
         {{$marks->exam_name}}
</td>
    <td class="text-center"><strong>Year:</strong>
         {{$marks->year}}
</td>
        </tr>
        <tr >
        <td class="text-center"><strong>T.Marks:</strong>
       {{$marks->total}}

</td>
        <td class="text-center"><strong>M.Mark</strong>
        @php
        if(($marks->form)==1 ||($marks->form)==2){
         $mean=($marks->total)/11;
         $val=number_format((float)$mean,2,'.','');
           echo $val;
        }     
     elseif(($marks->form)==3 ||($marks->form)==4){
         $mean=($marks->total)/7;
           $val=number_format((float)$mean,2,'.','');
       echo $val;
     }
     else{
      echo "-";
     }
         @endphp
</td>
        <td class="text-center">T.Points:
                @php
                   if(($marks->English) >0){
               $eng=get_grade($marks->English)->grade_point;
                }
                  else{
                    $eng=0;
                  }
                @endphp

                @php
                    if(($marks->Kiswahili)>0){
             $kisw=get_grade($marks->Kiswahili)->grade_point;
                       }
                  else{
                    $kisw=0;
                  }

                @endphp
                @php
                    if(($marks->Mathematics)>0){
                    $mat=get_grade($marks->Mathematics)->grade_point;
               
                       }
                  else{
                    $mat=0;
                  }

                @endphp
                @php
                    if(($marks->Biology)>0){
                    $bio=get_grade($marks->Biology)->grade_point;
                       }
                  else{
                    $bio=0;
                  }

                @endphp
                @php
                    if(($marks->Physics)>0){
                    $phy=get_grade($marks->Physics)->grade_point;
                       }
                  else{
                    $phy=0;
                  }

                @endphp
                @php
                    if(($marks->Chemistry)>0){
                    $chem=get_grade($marks->Chemistry)->grade_point;
                       }
                  else{
                    $chem=0;
                  }

                @endphp
                @php
                    if(($marks->History)>0){
                    $hist=get_grade($marks->History)->grade_point;
                       }
                  else{
                    $hist=0;
                  }
                @endphp
                @php
                    if(($marks->Geography)>0){
                    $geog=get_grade($marks->Geography)->grade_point;
                       }
                  else{
                    $geog=0;
                  }
                @endphp
                @php
                    if(($marks->CRE)>0){
                    $cre=get_grade($marks->CRE)->grade_point;
                       }
                  else{
                    $cre=0;
                  }
                @endphp
                @php
                    if(($marks->Agriculture)>0){
                    $agri=get_grade($marks->Agriculture)->grade_point;
                }
                  else{
                    $agri=0;
                  }
                @endphp
                @php
                    if(($marks->Business)>0){
                    $bus=get_grade($marks->Business)->grade_point;
                       }
                  else{
                    $bus=0;
                  }
                if($level==1 || $level==2){
                $result=$eng+$kisw+$mat+$bio+$phy+$chem+$hist+$geog+$cre+$agri+$bus;
                }
              else{
                    $group1=$eng+$kisw+$mat;
                $group2=array($bio,$phy,$chem);
                rsort($group2);
                $pk2=array_slice($group2,0,2);
                $pktotal=array_sum($pk2);

                $group3=array($hist,$geog,$cre,$agri,$bus);
                rsort($group3);
                $pk3=array_slice($group3,0,2);
                $pkt=array_sum($pk3);
               $result=$group1+$pktotal+$pkt;
                }
                @endphp
                {{$result}}

</td>
     <td class="text-center">M.Points:
         @php
             if($level==1 ||$level==2){
             $avg=$result/11;
             $meanpt=number_format((float)$avg,1,'.','');
             }
             else{
             $avg=$result/7;
             $meanpt=number_format((float)$avg,1,'.','');
             }
         @endphp

         {{$meanpt}}
    
</td>
    <td class="text-center">M.Grade:
        @php
            if($meanpt>=0 && $meanpt<=1.4){
               echo "E";
           }
           elseif($meanpt>=1.5 && $meanpt<=2.4){
               echo "D-";
           }
           elseif($meanpt>=2.5 && $meanpt<=3.4){
               echo "D";
           }
           elseif($meanpt >=3.5 && $meanpt<=4.4){
              echo "D+";
           }
           elseif($meanpt>=4.5 && $meanpt<=5.4){
               echo "C-";
           }
           elseif($meanpt>=5.5 && $meanpt<=6.4){
              echo "C";
           }
           elseif($meanpt>=6.5 && $meanpt<=7.4){
              echo "C+";
           }
           elseif($meanpt>=7.5 && $meanpt<=8.4){
               echo "B-";
           }
          elseif($meanpt>=8.5 && $meanpt<=9.4){
               echo "B";
           }
           elseif($meanpt>=9.5 && $meanpt<=10.4){
              echo "B+";
           }
           elseif($meanpt>=10.5 && $meanpt<=11.4){
              echo "A-";
           }
           elseif($meanpt>=11.5 && $meanpt<=12){
              echo "A";
           }
              else{
             echo "-";
              }
        @endphp
</td>
    <td class="text-center"><strong>Position:</strong>
      {{ $positions->rank }} 
</td>
  
        </tr>
        </table>
          <table  class="table table-bordered">
              <thead>
              <tr>
                  <th>SUBJECT</th>
                  <th>MARKS</th>
                  <th>GRADE</th>
                  <th>POINTS</th>
                  <th>REMARKS</th>
                  <th>INITIALS</th>
              </tr>
              </thead>
              <tbody>
           <tr>
        <td>
          English
        </td>
         <td>
        @if(($marks->English)>0)
         {{$marks->English}}
         @else
         {{'-'}}
         @endif
        </td>
       
        <td>
    @if(($marks->English)>0)
 {{ get_grade($marks->English)->name}}  
       @else
    {{"-"}}
    @endif 
    </td>
    <td class="pt">
    @if(($marks->English)>0)
       {{ get_grade($marks->English)->grade_point}}
  @else
 
    {{"-"}}
    @endif 
        </td>
        <td>
    @if(($marks->English)>0)
      {{ get_grade($marks->English)->comment}}
  @else
     {{"-"}}
    @endif 
       </td>

       <td>
           @forelse ($initials as $initial)
               {{ $initial->init1 }}
           @empty
               <p>-</p>
           @endforelse
       </td>
                  </tr>
    <!--////////////START KISWAHILI-->
                   <tr>
        <td>
          Kiswahili
        </td>
         <td>
        @if(($marks->Kiswahili)>0)
         {{$marks->Kiswahili}}
         @else
         {{'-'}}
         @endif
        </td>
        <td>

    @if(($marks->Kiswahili)>0)
 {{ get_grade($marks->Kiswahili)->name}}
  @else
    {{ "-"}}
  @endif

        </td>
        <td class="pt">
    @if(($marks->Kiswahili)>0)
                {{ get_grade($marks->Kiswahili)->grade_point}}
  @else
    {{ "-"}}
  @endif
        </td>
        <td>
          @php
    if(($marks->Kiswahili)>0){
      $score=$marks->Kiswahili;
            if($score>=92 && $score<=100){
            echo "Hongera";
                }

                elseif($score>=76 && $score<=91){
                echo "Vizuri Sana";
                }
                elseif($score>=51 && $score<=75){
                echo "Vizuri";
                }
                elseif($score>=36 && $score<=50){
                echo "Umejaribu";
                }
                elseif($score>=25 && $score<=35){
                echo "Jitahidi";
                }
                elseif($score>=0 && $score<=24){
                echo "Usife Moyo";
                }
       }
  else{
    echo "-";
  }
       @endphp
       </td>
       <td>
           @forelse ($initials as $initial)
               {{ $initial->init2 }}
           @empty
               <p>-</p>
           @endforelse
       </td>
                  </tr>
                      <!--////////////START MATHS//////////////-->
                   <tr>
        <td>
          Mathematics
        </td>
         <td>
     @if(($marks->Mathematics)>0)
         {{$marks->Mathematics}}
         @else
         {{'-'}}
         @endif
        </td>
        <td>
    @if(($marks->Mathematics)>0){
     {{ get_grade($marks->Mathematics)->name}}  
@else 
   {{ "-" }}

       @endif
        </td>
        <td class="pt">
    @if(($marks->Mathematics)>0){
  {{ get_grade($marks->Mathematics)->grade_point}}  
     @else
    {{ "-"}}
 @endif
        </td>
        <td>
    @if(($marks->Mathematics)>0)
 {{ get_grade($marks->Mathematics)->comment}}  
   {{ "-" }}
   @endif
       </td>
       <td>
           @forelse ($initials as $initial)
               {{ $initial->init3 }}
           @empty
               <p>-</p>
           @endforelse
       </td>
        </tr>
                         <!--////////////START Biology//////////////-->
                   <tr>
        <td>
          Biology
        </td>
         <td>
        @if(($marks->Biology)>0)
         {{$marks->Biology}}
         @else
         {{'-'}}
         @endif
        </td>
        <td>
    @if(($marks->Biology)>0)
{{ get_grade($marks->Biology)->name}}  
  @else
    {{ "-"}}
   @endif
        </td>
        <td class="pt">
    @if(($marks->Biology)>0)
 {{ get_grade($marks->Biology)->grade_point}}  
 @else
    {{ "-"}}
@endif
        </td>
        <td>
    @if(($marks->Biology)>0)
 {{ get_grade($marks->Biology)->comment}}  
 @else
    {{ "-"}}
@endif
       </td>
       <td>
           @forelse ($initials as $initial)
               {{ $initial->init4 }}
           @empty
               <p>-</p>
           @endforelse
       </td>
        </tr>
          <!--////////////START Physics//////////////-->
                   <tr>
        <td>
          Physics
        </td>
         <td>
        @if(($marks->Physics)>0)
         {{$marks->Physics}}
         @else
         {{'-'}}
         @endif
        </td>
        <td>
    @if(($marks->Physics)>0)
 {{ get_grade($marks->Physics)->name}}  
 @else
    {{ "-"}}
@endif
        </td>
        <td class="pt">
      @if(($marks->Physics)>0)
 {{ get_grade($marks->Physics)->grade_point}}  
 @else
    {{ "-"}}
@endif
        </td>
        <td>
     @if(($marks->Physics)>0)
 {{ get_grade($marks->Physics)->comment}}  
 @else
    {{ "-"}}
@endif
       </td>
       <td>
           @forelse ($initials as $initial)
               {{ $initial->init5 }}
           @empty
               <p>-</p>
           @endforelse
       </td>
        </tr>
        <!-- ///////// End Physics////////////////-->
          <!--////////////START Chemistry//////////////-->
                   <tr>
        <td>
          Chemistry
        </td>
         <td>
        @if(($marks->Chemistry)>0)
         {{$marks->Chemistry}}
         @else
         {{'-'}}
         @endif
        </td>
        <td>
    @if(($marks->Chemistry)>0)
 {{ get_grade($marks->Chemistry)->name}}  
 @else
    {{ "-"}}
@endif
        </td>
        <td class="pt">
    @if(($marks->Chemistry)>0)
 {{ get_grade($marks->Chemistry)->grade_point}}  
 @else
    {{ "-"}}
@endif
        </td>
        <td>
    @if(($marks->Chemistry)>0)
 {{ get_grade($marks->Chemistry)->comment}}  
 @else
    {{ "-"}}
@endif
       </td>
       <td>
           @forelse ($initials as $initial)
               {{ $initial->init6 }}
           @empty
               <p>-</p>
           @endforelse
       </td>
        </tr>
         <!--////////////START History//////////////-->
                   <tr>
        <td>
          History
        </td>
         <td>
        @if(($marks->History)>0)
         {{$marks->History}}
         @else
         {{'-'}}
         @endif
        </td>
        <td>
    @if(($marks->History)>0)
 {{ get_grade($marks->History)->name}}  
 @else
    {{ "-"}}
@endif
        </td>
        <td class="pt">
    @if(($marks->History)>0)
 {{ get_grade($marks->History)->grade_point}}  
 @else
    {{ "-"}}
@endif
        </td>
        <td>
    @if(($marks->History)>0)
 {{ get_grade($marks->History)->comment}}  
 @else
    {{ "-"}}
@endif
       </td>
       <td>
           @forelse ($initials as $initial)
               {{ $initial->init7 }}
           @empty
               <p>-</p>
           @endforelse
       </td>
        </tr>
        <!--////////////START Geography//////////////-->
                   <tr>
        <td>
         Geography
        </td>
         <td>
        @if(($marks->Geography)>0)
         {{$marks->Geography}}
         @else
         {{'-'}}
         @endif
        </td>
        <td>
    @if(($marks->Geography)>0)
 {{ get_grade($marks->Geography)->name}}  
 @else
    {{ "-"}}
@endif
        </td>
        <td class="pt">
    @if(($marks->Geography)>0)
 {{ get_grade($marks->Geography)->grade_point}}  
 @else
    {{ "-"}}
@endif
        </td>
        <td>
    @if(($marks->Geography)>0)
 {{ get_grade($marks->Geography)->comment}}  
 @else
    {{ "-"}}
@endif
       </td>
       <td>
           @forelse ($initials as $initial)
               {{ $initial->init8 }}
           @empty
               <p>-</p>
           @endforelse
       </td>
        </tr>
         
          <!--////////////START CRE//////////////-->
                   <tr>
        <td>
         CRE
        </td>
         <td>
        @if(($marks->CRE)>0)
         {{$marks->CRE}}
         @else
         {{'-'}}
         @endif
        </td>
        <td>
    @if(($marks->CRE)>0)
 {{ get_grade($marks->CRE)->name}}  
 @else
    {{ "-"}}
@endif
        </td>
        <td class="pt">
    @if(($marks->CRE)>0)
 {{ get_grade($marks->CRE)->grade_point}}  
 @else
    {{ "-"}}
@endif
        </td>
        <td>
    @if(($marks->CRE)>0)
 {{ get_grade($marks->CRE)->comment}}  
 @else
    {{ "-"}}
@endif
       </td>
       <td>
           @forelse ($initials as $initial)
               {{ $initial->init9 }}
           @empty
               <p>-</p>
           @endforelse
       </td>
        </tr>
         <!--////////////START Agriculture//////////////-->
                   <tr>
        <td>
        Agriculture
        </td>
         <td>
        @if(($marks->Agriculture)>0)
         {{$marks->Agriculture}}
         @else
         {{'-'}}
         @endif
        </td>
        <td>
    @if(($marks->Agriculture)>0)
 {{ get_grade($marks->Agriculture)->name}}  
 @else
    {{ "-"}}
@endif
        </td>
        <td class="pt">
    @if(($marks->Agriculture)>0)
 {{ get_grade($marks->Agriculture)->grade_point}}  
 @else
    {{ "-"}}
@endif
        </td>
        <td>
    @if(($marks->Agriculture)>0)
 {{ get_grade($marks->Agriculture)->comment}}  
 @else
    {{ "-"}}
@endif
       </td>
       <td>
           @forelse ($initials as $initial)
               {{ $initial->init10 }}
           @empty
               <p>-</p>
           @endforelse
       </td>
        </tr>
         <!--////////////START Agriculture//////////////-->
                   <tr>
        <td>
        Business
        </td>
         <td>
        @if(($marks->Business)>0)
         {{$marks->Business}}
         @else
         {{'-'}}
         @endif
        </td>
        <td>
    @if(($marks->Business)>0)
 {{ get_grade($marks->Business)->name}}  
 @else
    {{ "-"}}
@endif
        </td>
        <td class="pt">
    @if(($marks->Business)>0)
 {{ get_grade($marks->Business)->grade_point}}  
 @else
    {{ "-"}}
@endif
        </td>
        <td>
    @if(($marks->Business)>0)
 {{ get_grade($marks->Business)->comment}}  
 @else
    {{ "-"}}
@endif
       </td>
       <td>
           @forelse ($initials as $initial)
               {{ $initial->init11 }}
           @empty
               <p>-</p>
           @endforelse
       </td>
        </tr>
              </tbody>
              <tfoot>
              <tr><th colspan="6"></th></tr>
            <tr><td colspan="1"><h4><strong>Class Teacher's Remarks:</strong></h4></td><td colspan="5"></td></tr>
              <tr><th colspan="6"></th></tr>
            <tr><td colspan="1"><h4><strong>Principal's Remarks:</strong></h4></td><td colspan="5"></td></tr>
            <tr><th colspan="6"></th></tr>

              </tfoot>

          </table>
<p class><strong>Fees Areas______________________________&nbsp; Next term fess Kshs. __________________________________
Sign___________________________</strong></p>

<p class="text-center"><strong>School Closed on ________________________________&nbsp; Next term begins on . ___________________</strong></p>

<p class="text-center"><strong>Parent Sign ________________________________&nbsp; Date . ___________________</strong></p>
</div>
       </section>


@stop
