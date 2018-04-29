@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body">
<section id="configuration">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header bg-teal bg-accent-2">
                    <h4 class="card-title text-white">Student Fee Register</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">

                     <form action="{{ url('/fees/printRegister') }}" method="post" style="float: right;" >
                        {{csrf_field()}}
                <input type="hidden" name="adm" value="{{$adm}}">
            <button class="btn btn-primary" type="submit">
            <i class="icon-print">
       
            </i>Print Fee Register</button>
       
    </form>

<div class="row" style="margin-top: 5px;">
<div class="col-sm-3 invoice-col">
<img src="{{ asset('/images/logo.jpg') }}" height="120" width="190" style="margin-top: 5px;"> 
</div>
<div class="col-sm-9 invoice-col">
<div class="text-center" style="margin-top: -20px;">
<h3>KARUNG'A SECONDARY SCHOOL.</h3>
<h4>P.O. BOX 533 - 90400,MWINGI</h4>
<h4><i>Motto:In Knowledge Dwells Strength</i></h4>
</div>
</div>
</div>
   <div class="row">
        <div class="col-md-3">
        @php
        $year=date('Y')-1;
        @endphp
            <h6><strong>FEE BALANCE B/F AT: </strong>{{$year}}</h6>
        </div>
        <div class="col-md-3">
            <h6><strong>KHS:</strong>
                {{$balanceBF}}
            </h6>
            
        </div>
        <div class="col-md-3">
            <h6><strong>FEE FOR YEAR:</strong>
            @php
                echo date('Y');
            @endphp
            </h6>
        </div>
        <div class="col-md-3">
            <h6><strong>KSHS:</strong>
            {{$invoTotal}}
            </h6>
        </div>
        
    </div>
    @foreach ($records as $record)
    <div class="row">
    <div class="col-md-6">
        
            {{-- expr --}}
   
        <h6><strong>STUDENT NAME:</strong>  {{$record->fname}}  {{$record->lname}}</h6>
    </div>
    <div class="col-md-6">
        <h6><strong>ADM NO:</strong>
                {{$record->adm_no}}
            </h6>
    </div>
    </div>
            @endforeach
    <div class="row">
        <div class="col-md-3">
        @if (count($termFee1) >0)
        <h6><strong>TERM 1 KSHS: </strong>{{$termFee1}}</h6>
            @else
            <h6><strong>TERM 1: </strong><smaill>not invoiced</smaill></h6>
        @endif
                                    
        </div>
        <div class="col-md-3">
            @if (count($termFee2) >0)
            <h6><strong>TERM 2 KSHS: </strong>{{$termFee2}}</h6>
                @else
                <h6><strong>TERM 2: </strong><smaill>not invoiced</smaill></h6>
            @endif
        
        </div>
        <div class="col-md-3">
        @if (count($termFee3) >0)
            <h6><strong>TERM 3 KSHS: </strong>{{$termFee3}}</h6>
                @else
                <h6><strong>TERM 3:</strong><smaill>not invoiced</smaill></h6>
            @endif
        </div>
        <div class="col-md-3">

            <h6><strong>TOTAL KSHS: </strong>{{$termTotal}}</h6>
        </div>
    </div>
    <div class="table-responsive">
       <table class="table  table-bordered table-hover table-condensed">
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
                echo '<td><strong>Pre-Paid: </strong>'.                                                    
                 $amountBalance                                            
                .
                '</td></tr>';
        }else{
            echo '<tr><td><strong>ARREARS: </strong>'.$amountBalance.'</td></tr>';
        }
    @endphp
</tr>
</tfoot>           
</table>
</div>
        </div>
        </div>
            </div>
        </div>
    </div>
</section>
</div>
<!--/ Zero configuration table -->
@stop
