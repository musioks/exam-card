<!DOCTYPE html>
<html>
<head>
    <title>Fees per class</title>
     <style>
     #textbox{
        margin-top: 100px;
        margin-bottom: 10px;
        text-align: center;
        height: 170px;
        border: 2px hidden red;
     }
     .alignleft {
         float: left;
         clear: left;

     }
     /* resets */
     *,
     *:before,
     *:after {
       box-sizing: border-box;
     }
     .clearfix:after {
       content: "";
       display: table;
       clear: both;
     }
     .alignright {
         float: right
        margin-right:100px;
        clear: right;
              }

        header{
           
        }
        .row1{
            display: grid;
        }
     .row1.grid1{
        width: 31.333%;
     }
    /* grid */
[class*="row-"] {
  margin-bottom: 20px;
}
[class*="row-"]:last-child {
  margin-bottom: 0;
}
[class*="col-"] {
}
 .col-1-4 {
    float: left;
    width: 25%;
  }
   .col-1-2 {
    float: left;
    width: 50%;
  }
 table {  
     color: #333; /* Lighten up font color */
     font-family: Helvetica, Arial, sans-serif; /* Nicer font */
     width: 100%; 
     border-collapse: 
     collapse; border-spacing: 0; 
 }

 td, th { border: 1px solid #CCC; height: 30px; } /* Make cells a bit taller */

 th {  
     background: #F3F3F3; 
     font-weight: bold; 
 }

 td {  
     background: #FAFAFA; 
     text-align: center; 
 }
       
 tr:nth-child(even) td { background: #F1F1F1; }          
 tr:nth-child(odd) td { background: #FEFEFE; }  

 tr td:hover { background: #666; color: #FFF; }  
    
    </style>
</head>
<body>
    <header>
          <div id="textbox">
        <span class="alignleft"><img src="{{ public_path('/images/logo.jpg') }}" ></span>
        <span class="alignright"><h3>KARUNG'A SECONDARY SCHOOL.</h3>
                                  <h4>P.O. BOX 533 - 90400,MWINGI</h4>
                                  <h4><i>Motto:In Knowledge Dwells Strength</i></h4>
                              </span>
                  </div>
    </header>
      

       <table id="layout">
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
</body>
</html>

