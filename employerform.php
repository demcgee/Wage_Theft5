<?php
	include_once('config.php');
	include_once('dbutils.php');
	include_once('hashutil.php');
?>

<html lang="en">
<head>
  <title>Wage Theft</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="runnable.css" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <link rel="stylesheet" href="runnable.css" />
</head>

<body>
<nav class="navbar navbar-default">
  <div style = "background:#A9D0F5 !important" class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="Home.php"><font face="Arial Black">Stop! Wage Theft</a></font>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="Home.php"><span style="font-size:1.0em" class="glyphicon glyphicon-home"></span><font face="Arial Black"> Home</a></li></font>
      <li><a href="enterhours.php"><span style="font-size:1.0em" class="glyphicon glyphicon-time"></span><font face="Arial Black"> Enter Hours</a></li></font>
      <li><a href="enterpaycheck.php"><span style="font-size:1.0em" class="glyphicon glyphicon-barcode"></span><font face="Arial Black"> Enter Paycheck</a></li></font>
      <li><a href="Makeclaim.php"><span style="font-size:1.0em" class="glyphicon glyphicon-bullhorn"></span><font face="Arial Black"> Make Claim</a></li></font>
      <li><a href="faq.php"><span style="font-size:1.0em" class="glyphicon glyphicon-question-sign"></span><font face="Arial Black"> FAQ</a></li></font>
	  <li><a href="logout.php"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-log-out"></span> Logout</button></li></a>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Enter Employer Information</h3>
</div>

<div class="container">
<div class="col-xs-12">
<form action=""  method="post" enctype="multipart/form-data">
  
  <div class="form-group">
	<label for="name">Name</label>
	<input type="name" class="form-control" name="name"/>
  </div>
  
  <div class="form-group">
	<label for="address">Address</label>
	<input type="address" class="form-control" name="address"/>
</div>
  
  <div class="form-group">
	<label for="phone">E-mail</label>
	<input type="e-mail" class="form-control" name="e-mail"/>
</div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>

</body>
</html>