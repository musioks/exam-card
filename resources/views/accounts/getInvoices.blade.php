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
        background-color:#eeeeee;
        color: #000;
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
<div id="header">
    <h1>Invoices List</h1>
</div>
<table id="layout">
<thead>
<tr>
<th>#</th>
<th>Admission No</th>
<th>Full Name</th>
<th>Total Fees</th>
<th>Date Invoiced</th>
</tr>
</thead>
<tbody>
@foreach($invoices as $i=> $feeRecord)
<tr>
    <td>{{$i+1}}</td>
    <td>{{$feeRecord->adm_no}}</td>
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

