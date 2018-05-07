<!DOCTYPE html>
<html>
<head>
<title>Exam Card</title>
<style>
/* Create 2 unequal columns that floats next to each other */
}
.column {
float: left;
padding: 5px;
height: 5px; /* Should be removed. Only for demonstration */
}

.left {
width: 20%;
text-align: left;
margin-left: -40px;
margin-top:-40px;
}

.right {
  margin-top:-20px;
width: 80%;
text-align: right;
}
.bottom{
  width: 100%;
  margin-top: 145px;
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
<img src="{{ public_path('/images/logo.png') ?? ''}}" width="100" height="90"></div>
<div class="column right"><h4>NAME: {{strtoupper($student->fname) ?? ''}} {{strtoupper($student->lname) ?? ''}}</h4>
<h4> Course: {{$student->course ?? ''}},{{$setting->location ?? ''}}</h4>
<h4><i>Academic Year:{{$student->academic_year ?? ''}}</i></h4>
<h4><i>Session:Yr{{$balance->form_id ?? ''}}  Sem {{$balance->term_id ?? ''}}</i></h4>
</div>
<div class="column bottom">
<p>Registrar's Signature __________________</p>
</div>
</div>
</body>
</html>

