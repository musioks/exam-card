<!DOCTYPE html>
<html>
<head>
    <title>Fees Payment Receipt</title>
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
     <div id="textbox">
        <span class="alignleft"><img src="{{ public_path('/images/logo.jpg') }}" ></span>
        <span class="alignright"><h3>KARUNG'A SECONDARY SCHOOL.</h3>
                                  <h4>P.O. BOX 533 - 90400,MWINGI</h4>
                                  <h4><i>Motto:In Knowledge Dwells Strength</i></h4>
                              </span>
                  </div>
<table>
    		<tr>
    			<td>
    				@foreach($records as $record)
    				<h6>Payment Voucher No: .........</h6>
    				<h6><strong>Payee's Name and Address:</strong> {{$record->payee_name}}<br> {{$record->address}}</h6>
    			</td>
    		</tr>
    	</table>

    	<table class="table  table-condensed" >
    		<tr>
    			<th>DATE</th>
    			<th>PARTICULARS</th>
    			<th>AMOUNT</th>
    		</tr>
    		<tr>
    			<td>{{ date('Y-m-d', strtotime($record->created_at))}}</td>
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
</body>
</html>