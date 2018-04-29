@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header bg-teal bg-accent-4">
                    <h4 class="card-title text-white">Daily Fee Records</h4>
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
                        <hr>
       <table class="table  table-bordered table-condensed table-hover zero-configuration">
         <thead>
         <tr>
             <th>#</th>
             <th>Admission No.</th>
             <th>Full Name</th>
             <th>Class</th>
             <th>Term</th>
             <th>Amount Paid</th>
             <th>Date Paid</th>
             <th>Action</th>
             
         </tr>
         </thead>
         <tbody>
         @php 
         $i=0;
         @endphp
         @if (!$fees->isEmpty())
             @forelse($fees as $fees)
             @php 
             $i+=1;
             @endphp
                 <tr>
                     <td>{{$i}}</td>
                     <td>
                     {{$fees->adm_no}}
                     </td>
                     <td>
                     {{$fees->fname}} {{$fees->lname}}
                     </td>
                     <td>
                     Form {{$fees->form_id}}
                     </td>
                     <td>
                     Term {{$fees->term_id}}
                     </td>
                     <td>
                     Kshs. {{$fees->Total}}
                     </td>

                     <td>
                     {{ date('Y-m-d', strtotime($fees->paid)) }}
                     </td>
                     <td>
                   <form action="{{url('/fees/dailyReceipt')}}" method="get">
                   <input type="hidden" name="adm" value="{{$fees->adm_no}}">
             <button type="submit" class="btn bg-navy"><i class="fa fa-fw fa-eye"></i>View Receipt</button>
                  </form>
                     </td>
                 </tr>
                @empty 
                <p>NO DATA</p>
             @endforelse
        @else
            <tr>
                <td>NO DATA</td>
            </tr>
         @endif
        
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
@stop
