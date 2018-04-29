<!DOCTYPE html>
<html>
<head>
    <title>All Invoices</title>
     <style>
    #header{
      border: solid 1px black;
      margin-bottom:3px;
      
    }
    #header h1{
      text-align:center;
    }
    #layout {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #layout td, #layout th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #layout tr:nth-child(even){background-color: #f2f2f2;}

    #layout tr:hover {background-color: #ddd;}

    #layout th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color:#263238;
        color: white;
    }
    .alignleft {
        float: left;
    }
    .alignright {
        float: right;
    }
    </style>
</head>
<body>
      <div id="textbox">
    <span class="alignleft"><img src="{{ public_path('/images/logo.jpg') }}" ></span>
    <span class="alignright"><h1>KARUNG'A SECONDARY SCHOOL.</h1>
                              <h4>P.O. BOX 533 - 90400,MWINGI</h4>
                              <h4><i>Motto:In Knowledge Dwells Strength</i></h4>
                          </span>
              </div>
<table id="layout">
<thead>
<tr>
<th>#</th>
<th>Reg NO</th>
<th>Sch Type</th>
<th>Full Name</th>
<th>Total Fees</th>
<th>Date Invoiced</th>
</tr>
</thead>
<tbody>
<?php $i=0;?>
@foreach($invoices as $feeRecord)
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
    <td >Kshs. {{$feeRecord->amount}}</td>
    <td>{{ date('Y-m-d', strtotime($feeRecord->created_at)) }}</td>
</tr>
@endforeach
</section>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</body>
</html>

