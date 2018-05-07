<!DOCTYPE html>
<html>
<head>
    <title>All Invoices</title>
     <style>
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
    .header{
        margin-bottom: 80px;
    }
    .column {
float: left;
padding: 5px;
height: 5px; /* Should be removed. Only for demonstration */
}

.left {
width: 100%;
text-align: center;
}

.right {
width: 100%;
text-align: center;
margin-top: 80px;
}
/* Clear floats after the columns */
.header:after {
content: "";
display: table;
clear: both;
}

    </style>
</head>
<body>
<div class="header">
<div class="column left">
<img src="{{ public_path('/images/jkuat.jpg')}}"></div>
<div class="column right"><h1>Invoices List</h1>
</div>
</div>
<table id="layout">
<thead>
<tr>
<th>#</th>
<th>Admission No</th>
<th>Full Name</th>
<th>Amount Invoiced</th>
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

