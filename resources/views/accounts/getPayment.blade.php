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
                         <form action="{{ url('/payments/printPayment') }}" method="get" >
                    <input type="hidden" name="id" value="{{$id}}">
                <button class="btn btn-primary" type="submit">
                <i class="icon-print">
           
                </i>Print Receipt</button>
           
        </form>
                        <hr>
     <section>

        <div>
            <table class="table">
            <tr>
                <td>
                    <div class="invoice-col">
                        <img src="{{ public_path('/images/logo.jpg') }}" height="100" width="120" style="margin-top: 10px;" >
                    </div>
                </td>
                <td>
                    <div class="invoice-col">
                        <div class="text-center" style="margin-top: -20px;">
                            <h3>KARUNG'A SECONDARY SCHOOL.</h3>
                            <h4>P.O. BOX 533 - 90400,MWINGI</h4>
                            <h4><i>Motto:In Knowledge Dwells Strength</i></h4>
                        </div>
                        
                    </div>
                
                    
                </td>
            </tr>
            <tr>
                <td>
                    @foreach($records as $record)
                    <h6>Payment Voucher No: .........</h6>
                    <h6><strong>Payee's Name and Address:</strong> {{$record->payee_name}}<br> {{$record->address}}</h6>
                </td>
            </tr>
        </table>
            
            
        
        </div><!--end row-->

        <table class="table  table-condensed" >
            <tr>
                <th>DATE</th>
                <th>PARTICULARS</th>
                <th>AMOUNT</th>
            </tr>
            <tr>
                <td>{{$record->created_at}}</td>
                <td>{{$record->particulars}}</td>
                <td>{{$record->amount}}</td>
            </tr>
        </table>
        @endforeach
        <table class="table">
            <tr>
                <td><h5>Payment Authorised by ........................................................</h5></td>
                <td><h5>Cash/Cheque No ............</h5></td>
            </tr>
            <tr>
                <td><h4>Date.....................</h4></td>
            </tr>
        </table>        
        @foreach($records as $record)
       <table class="table table-bordered table-condensed">
          <thead>
              <tr>
              <th>VOTEHEADS</th>
              <th>DESCRIPTION</th>
              </tr>
          </thead>
          <tbody>
          <tr>
            <td>{{$record->name}}</td>
            <td>{{$record->description}}</td>
          </tr>
          </tbody>
            @endforeach              
        </table>
    </section>
@stop
