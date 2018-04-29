<!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title></title>
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
       <section>
    <div id="textbox">
  <span class="alignleft"><img src="{{ public_path('/images/logo.jpg') }}" ></span>
  <span class="alignright"><h1>KARUNG'A SECONDARY SCHOOL.</h1>
                            <h4>P.O. BOX 533 - 90400,MWINGI</h4>
                            <h4><i>Motto:In Knowledge Dwells Strength</i></h4>
                        </span>
            </div><!--end row-->
          <table  id="layout">    
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Class</th>
                        <th>Admission Number</th>
                        <th>Full Name</th>
                        <th>Initial Amount</th>
                        <th>Fees Balance</th>
                        <th>Date Created</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @forelse($invoices as $invoice)
                        @php $i++; @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>Form {{$invoice->form}}</td>
                        <td>{{$invoice->adm_no}}</td>
                        <td>{{$invoice->fname}} {{$invoice->lname}}</td>
                        <td>{{$invoice->amount}}</td>
                        <td>{{$invoice->balance}}</td>
                        <td>{{$invoice->created_at}}</td>
                    </tr>
                    @empty
                    <p>No data!</p>
                    @endforelse
         </tbody>
        <tfoot>
        </tfoot>
    </table>
</section>
