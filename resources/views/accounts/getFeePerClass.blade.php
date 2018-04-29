@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header bg-teal bg-accent-2">
                    <h4 class="card-title text-white">Student Fee Per Class</h4>
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

                     <form action="{{ url('/fees/printFeePerClass') }}" method="post" style="float: right;" >
                        {{csrf_field()}}
                <input type="hidden" name="form_id" value="{{$c}}">
                <input type="hidden" name="term_id" value="{{$t}}">
                <input type="hidden" name="stream_id" value="{{$d}}">
                <input type="hidden" name="year" value="{{$y}}">
            <button class="btn btn-primary" type="submit">
            <i class="icon-print">
       
            </i>Print Fee Payment</button>
       
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
       <table class="table  table-bordered table-condensed table-hover zero-configuration">
                         <thead>
      					        <tr>
      					            <th>#</th>
      					            <th>Reg NO</th>
      					            <th>school type</th>
      					            <th>Full Name</th>
      					            <th>Total Fees</th>
      					            <th>Fees Balance</th>
      					            <th>Date Paid</th>
      					        </tr>
      					        </thead>
      					        <tbody>
      					        <?php $i=0;?>
      					        @foreach($feeRecords as $feeRecord)
      					            <?php $i++;?>
      					            <tr>
      					                <td>{{$i}}</td>
      					                <td>{{$feeRecord->adm_no}}</td>
      					                <td>
      					                	@php
      					                		$sch=$feeRecord->boarding;
      					                		if ($sch==0){
      					                			echo 'Bording';
      					                		}else{
      					                			echo 'Day';
      					                		}
      					                		
      					                		
      					                	@endphp
      					                </td>
      					                <td >{{$feeRecord->fname}} {{$feeRecord->lname}}</td>
      					                <td >Kshs. {{$feeRecord->invoicetotal}}</td>
      					                <td >Kshs. {{$feeRecord->balancetotal}}</td>
      					                <td>{{ date('Y-m-d', strtotime($feeRecord->created_at)) }}</td>
      					            </tr>
      					        @endforeach
      					</section>
      		    </tbody>
      		    <tfoot>
      		    </tfoot>
</table>
        </div>
        </div>
            </div>
        </div>
    </div>
</section>
</div>
<!--/ Zero configuration table -->
@stop





