<!DOCTYPE html>
<?php
	include_once('config.php');
	include_once('dbutils.php');
	include_once('hashutil.php');
    include_once('top.php');
?>
<html lang="en">
<head>
  <title>Stop! Wage Theft</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
      <li><a href="faq_in.php"><span style="font-size:1.0em" class="glyphicon glyphicon-question-sign"></span><font face="Arial Black"> FAQ</a></li></font>
	  <li><a href="contactus_in.php"><span style="font-size:1.0em" class="glyphicon glyphicon-phone-alt"></span><font face="Arial Black"> Contact Us</a></li></font>
      <li class="active"><a href="Adminhome.php"><span style="font-size:1.0em" class="glyphicon glyphicon-user"></span><font face="Arial Black"> Admin Dashboard</a></li></font>
    </ul>
  </div>
</nav>

  
<div class="container">
<br>
  <center>
  <h3 align="left"><span style="font-size:1.0em" class="glyphicon glyphicon-alert"></span><font size="6" color="red" face="Impact"> Stop! Wage Theft </font><span style="font-size:1.0em" class="glyphicon glyphicon-alert"></span></h3>
<br>

  <p><font size="5">This is the Employer Dashboard (only viewable by Employer)</font></p>

  </center>
</div>

<div class="container">
<div class="col-xs-12">

<!----------------->
<!---List JOB--->
<!----------------->

	<h2><?php echo "Job"; ?></h2>

<!--Table about Job-->

<table class="table table-hover">

<tr style="background:#ECCEF5 !important">
	<td>Job</td>
	<td>Employer</td>
</tr>
<tbody>
	<?php
	// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up my query
	$query = "SELECT JOB_TITLE FROM job ORDER BY JOB_TITLE;";
	
	// run the query
	$result = queryDB($query, $db);
	
	while($row = nextTuple($result)) {
		echo "\n <tr>";
		echo "<td>" . $row['JOB_TITLE'] . "</td>";
		echo "</tr>";
	}
?>
</tbody>
</table>

<!----------------->
<!---List Hours--->
<!----------------->

	<h2><?php echo "Hours"; ?></h2>

	
	
<!--Table about Hours-->

<table class="table table-hover">

<tr style="background:#ECCEF5 !important">
	<td>Date</td>
	<td>Hours</td>
</tr>
<tbody>
	<?php
	// get a handle to the database
    $db = connectDB($DBHost, $DBUser, $DBPasswd, $DBName);
	
	 // prepare sql statement
    $query = "SELECT DAILY_HOURS, DAILY_HOURS_DATE FROM hours ORDER BY DAILY_HOURS_DATE;";
	
	// run the query
	$result = queryDB($query, $db);
	
	while($row = nextTuple($result)) {
		echo "\n <tr>";
		echo "<td>" . $row['DAILY_HOURS_DATE'] . "</td>";
		echo "<td>" . $row['DAILY_HOURS'] . "</td>";
		echo "</tr>";
	}
?>
</tbody>
</table>

<!----------------->
<!---List Paycheck--->
<!----------------->

	<h2><?php echo "Paycheck"; ?></h2>

<!-- Table about Paycheck -->

<table class="table table-hover">

<tr style="background:#ECCEF5 !important">
	<td>Start date</td>
	<td>End date</td>
	<td>Hours</td>
	<td>Net Pay</td>
</tr>
<tbody>
<?php
	// get a handle to the database
    $db = connectDB($DBHost, $DBUser, $DBPasswd, $DBName);
	
	 // prepare sql statement
    $query = "SELECT HOURLY_WAGE, HOURS_PAID_FOR, NET_PAY, START_DATE, END_DATE FROM paycheck ORDER BY START_DATE;";
	
	// run the query
	$result = queryDB($query, $db);
	
	while($row = nextTuple($result)) {
		echo "\n <tr>";
		echo "<td>" . $row['START_DATE'] . "</td>";
		echo "<td>" . $row['END_DATE'] . "</td>";
		echo "<td>" . $row['HOURS_PAID_FOR'] . "</td>";
		echo "<td>" . $row['NET_PAY'] . "</td>";
		echo "</tr>";
	}
?>
</tbody>
</table>
</div>
</div>
</body>
</html>
