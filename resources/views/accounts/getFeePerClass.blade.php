@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header bg-primary bg-accent-2">
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

                     {{-- <form action="{{ url('/fees/printFeePerClass') }}" method="post" style="float: right;" >
                        {{csrf_field()}}
                <input type="hidden" name="form_id" value="{{$c}}">
                <input type="hidden" name="term_id" value="{{$t}}">
                <input type="hidden" name="stream_id" value="{{$d}}">
                <input type="hidden" name="year" value="{{$y}}">
            <button class="btn btn-primary" type="submit">
            <i class="icon-print">
       
            </i>Print Fee Payment</button>
       
    </form> --}}

<div class="row" style="margin-top: 5px;">


</div>
       <table class="table  table-bordered table-condensed table-hover zero-configuration">
                         <thead>
      					        <tr>
      					            <th>#</th>
      					            <th>Admission No.</th>
      					            <th>Full Name</th>
									<th>Amount Billed</th>
									<th>Amount Paid</th>
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
      					                <td >{{$feeRecord->fname}} {{$feeRecord->lname}}</td>
      					                <td >Kshs. {{$feeRecord->invoicetotal}}</td>
      					                <td >Kshs. {{$feeRecord->invoicetotal-$feeRecord->balancetotal}}</td>
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





