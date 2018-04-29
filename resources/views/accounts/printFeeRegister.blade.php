<!DOCTYPE html>
<html>
<head>
    <title>Fee Register</title>
     <style>
     #textbox{
        margin-top: 100px;
        margin-bottom: 10px;
        text-align: center;
        height: 170px;
        border: 2px hidden red;
     }
     .alignleft {
         float: left;
         clear: left;

     }
     /* resets */
     *,
     *:before,
     *:after {
       box-sizing: border-box;
     }
     .clearfix:after {
       content: "";
       display: table;
       clear: both;
     }
     .alignright {
         float: right
        margin-right:100px;
        clear: right;
              }

        header{
           
        }
        .row1{
            display: grid;
        }
     .row1.grid1{
        width: 31.333%;
     }
    /* grid */
[class*="row-"] {
  margin-bottom: 20px;
}
[class*="row-"]:last-child {
  margin-bottom: 0;
}
[class*="col-"] {
}
 .col-1-4 {
    float: left;
    width: 25%;
  }
   .col-1-2 {
    float: left;
    width: 50%;
  }
 table {  
     color: #333; /* Lighten up font color */
     font-family: Helvetica, Arial, sans-serif; /* Nicer font */
     width: 100%; 
     border-collapse: 
     collapse; border-spacing: 0; 
 }

 td, th { border: 1px solid #CCC; height: 30px; } /* Make cells a bit taller */

 th {  
     background: #F3F3F3; 
     font-weight: bold; 
 }

 td {  
     background: #FAFAFA; 
     text-align: center; 
 }
       
 tr:nth-child(even) td { background: #F1F1F1; }          
 tr:nth-child(odd) td { background: #FEFEFE; }  

 tr td:hover { background: #666; color: #FFF; }  
    
    </style>
</head>
<body>
    <header>
          <div id="textbox">
        <span class="alignleft"><img src="{{ public_path('/images/logo.jpg') }}" ></span>
        <span class="alignright"><h3>KARUNG'A SECONDARY SCHOOL.</h3>
                                  <h4>P.O. BOX 533 - 90400,MWINGI</h4>
                                  <h4><i>Motto:In Knowledge Dwells Strength</i></h4>
                              </span>
                  </div>
  <article>
    @foreach ($records as $record)
    <div class="row-2 clearfix">
    <div class="col-1-2">
        
            {{-- expr --}}
    
        <h4><strong>STUDENT NAME:</strong>  {{$record->fname}}  {{$record->lname}}</h4>
    </div>
    <div class="col-1-2">
        <h4><strong>ADM NO:</strong>
                {{$record->adm_no}}
            </h4>
    </div>
    </div>
            @endforeach
   
      </article>
      <article>
        <div class="row-4 clearfix">
                <div class="col-1-4">
                @php
                $year=date('Y')-1;
                @endphp
                    <h4><strong>FEE BALANCE B/F AT: </strong>{{$year}}</h4>
                </div>
                <div class="col-1-4">
                    <h4><strong>KHS:</strong>
                        {{$balanceBF}}
                    </h4>
                </div>
                <div class="col-1-4">
                    <h4><strong>FEE FOR YEAR:</strong>
                    @php
                        echo date('Y');
                    @endphp
                    </h4>
                </div>
                <div class="col-1-4">
                    <h4><strong>KSHS:</strong>
                    {{$invoTotal}}
                    </h4>
                </div>
                
            </div>
          <div class="row-4 clearfix">
              <div class="col-1-4">
              @if (count($termFee1) >0)
              <h4><strong>TERM 1 KSHS: </strong>{{$termFee1}}</h4>
                  @else
                  <h4><strong>TERM 1: </strong><smaill>not invoiced</smaill></h4>
              @endif
                                          
              </div>
              <div class="col-1-4">
                  @if (count($termFee2) >0)
                  <h4><strong>TERM 2 KSHS: </strong>{{$termFee2}}</h4>
                      @else
                      <h4><strong>TERM 2: </strong><smaill>not invoiced</smaill></h4>
                  @endif
              
              </div>
              <div class="col-1-4">
              @if (count($termFee3) >0)
                  <h4><strong>TERM 3 KSHS: </strong>{{$termFee3}}</h4>
                      @else
                      <h4><strong>TERM 3:</strong><smaill>not invoiced</smaill></h4>
                  @endif
              </div>
              <div class="col-1-4">

                  <h4><strong>TOTAL KSHS: </strong>{{$termTotal}}</h4>
              </div>
          </div>
  </article>
    </header>
      

       <table id="layout">
                            <tr>
<th>DATE</th>
<th>TUI</th>
<th>BES</th>
<th>PE</th>
<th>RMI</th>
<th>EWC</th>
<th>LT&T</th>
<th>ACT</th>
<th>MED</th>
<th>Exams</th>
<th>PTA</th>
<th>Caution</th>
</tr> 
@foreach($records as $record)
<tr>
<td>
{{\Carbon\Carbon::parse($record->created_at)->format('Y-m-d')}}
</td>
<td>
@if($record->tuition>0)
{{$record->tuition}}
@else
{{"-"}}
@endif
</td>
<td>
@if($record->boarding>0)
{{$record->boarding}}
@else
{{"-"}}
@endif
</td>
<td>
@if($record->personal>0)
{{$record->personal}}
@else
{{"-"}}
@endif
</td>
<td>
@if($record->repairs>0)
{{$record->repairs}}
@else
{{"-"}}
@endif
</td>
<td>
@if($record->ewc>0)
{{$record->ewc}}
@else
{{"-"}}
@endif
</td>
<td>
@if($record->local>0)
{{$record->local}}
@else
{{"-"}}
@endif
</td>
<td>
@if($record->activity>0)
{{$record->activity}}
@else
{{"-"}}
@endif
</td>
<td>
@if($record->medical>0)
{{$record->medical}}
@else
{{"-"}}
@endif
</td>
<td>
@if($record->examination>0)
{{$record->examination}}
@else
{{"-"}}
@endif
</td>
<td>
@if($record->pta>0)
{{$record->pta}}
@else
{{"-"}}
@endif
</td>
<td>
@if($record->caution>0)
{{$record->caution}}
@else
{{"-"}}
@endif
</td>
</tr> 
@endforeach 
<tfoot>
<tr>
        <td><strong>Total: </strong>{{$termTotal}}</td>
</tr>
<tr>
    @php
   
        if ($amountBalance < 0){
                echo '<td><strong>Pre-Paid: </strong>'.                                                     $amountBalance                                            
                .
                '</td></tr>';
        }else{
            echo '<tr><td><strong>ARREARS: </strong>'.$amountBalance.'</td></tr>';
        }
    @endphp
</tr>
</tfoot>
</table>
</body>
</html>

