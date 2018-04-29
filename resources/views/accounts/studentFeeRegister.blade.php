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
                    <h4 class="card-title text-white">Student Fee Register</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0 ">
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <hr>       
 <table class="table table-bordered">
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
               @foreach($fees as $fees)

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
                       Form {{$fees->form}}
                       </td>
                       <td>
                       Term {{$fees->term_id}}
                       </td>
                       <td>
                       Kshs. {{$fees->Total}}
                       </td>

                       <td>
                       {{ date('Y-m-d', strtotime($fees->created_at)) }}
                       </td>
                       <td>
                     <form action="{{url('/fees/allFeeRegister')}}" method="get">
                     <input type="hidden" name="adm" value="{{$fees->adm_no}}">
               <button type="submit" class="btn bg-navy"><i class="fa fa-fw fa-eye"></i>View Record</button>
                    </form>
                       </td>
                   </tr>
               @endforeach
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