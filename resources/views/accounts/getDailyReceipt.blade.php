@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header bg-light-blue bg-lighten-1">
                    <h4 class="card-title text-white">Fee Payment Receipt</h4>
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
                         <form action="{{ url('/fees/printdailyReceipt') }}" method="get" >
                    <input type="hidden" name="adm" value="{{$adm_no}}">
                <button class="btn btn-primary" type="submit">
                <i class="icon-print">
           
                </i>Print Receipt</button>
           
        </form>
                        <hr>
       <table class="table  table-bordered table-condensed table-hover zero-configuration">
<thead>
<tr>
<th>#</th>
<th>Reg NO</th>
<th>Sch Type</th>
<th>Full Name</th>
<th>Class</th>
<th>Fees Paid</th>
<th>Date Paid</th>
</tr>
</thead>
<tbody>
<?php $i=0;?>
@foreach($fees as $feeRecord)
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
    <td >Form: {{$feeRecord->form_id}}</td>
    <td >Kshs: @php
    $total=$feeRecord->Total;
        if ($total == ''){
            echo '0';
        }else{
            echo $total;
        }
    @endphp</td>
    <td>{{ date('Y-m-d', strtotime($feeRecord->paid)) }}</td>
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
