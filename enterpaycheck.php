<!DOCTYPE html>

<?php
	include_once('top.php');
	include_once("config.php");
	include_once("dbutils.php");
?>

<?php
	// Generating pull down menu for employers
	
	// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up my query
	$query = "SELECT JID, JOB_TITLE FROM job ORDER BY JOB_TITLE;";
	
	// run the query
	$result = queryDB($query, $db);
	
	// options for employers
	$jobOptions = "";
	
	// go through all employers and put together pull down menu
	while ($row = nextTuple($result)) {
		$jobOptions .= "\t\t\t";
		$jobOptions .= "<option value='";
		$jobOptions .= $row['JID'] . "'>" . $row['JOB_TITLE'] . "</option>\n";
	}
?>

<html lang="en">
<head>
  <title>Stop! Wage Theft</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="runnable.css" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
    
    <!-- Load SCRIPT.JS which will create datepicker for input field  -->
    <script src="script.js"></script>
    
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
	  <li><a href="jobform.php"><span style="font-size:1.0em" class="glyphicon glyphicon-briefcase"></span><font face="Arial Black"> Enter Job</a></li></font>
      <li><a href="enterhours.php"><span style="font-size:1.0em" class="glyphicon glyphicon-time"></span><font face="Arial Black"> Enter Hours</a></li></font>
      <li class ="active"><a href="enterpaycheck.php"><span style="font-size:1.0em" class="glyphicon glyphicon-barcode"></span><font face="Arial Black"> Enter Paycheck</a></li></font>
      <li><a href="Makeclaim.php"><span style="font-size:1.0em" class="glyphicon glyphicon-bullhorn"></span><font face="Arial Black"> Make Claim</a></li></font>
      <li><a href="faq.php"><span style="font-size:1.0em" class="glyphicon glyphicon-question-sign"></span><font face="Arial Black"> FAQ</a></li></font>
    </ul>

	<ul class="nav navbar-nav navbar-right">
	  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span><font face="Arial Black"> Logout</a></li></font>
	</ul>
  </div>
</nav>
 
 <font face ="Arial Black"> 
<div class="container">
  <h2>Enter Paycheck</h2>
</div>

<?php
if (isset($_POST['JID'])){
	//get data
	$JID = $_POST['JID'];
	$HOURS_PAID_FOR = $_POST['HOURS_PAID_FOR'];
	$NET_PAY = $_POST['NET_PAY'];
	$START_DATE = $_POST['START_DATE'];
	$END_DATE = $_POST['END_DATE'];
	
	if (!$JID) {
		punt ("Please enter an job name");
	}
	
	if (!$HOURS_PAID_FOR){
		punt ("Please enter Hours paid for.");
	}
	
	if (!$NET_PAY){
		punt ("Please enter Net pay.");
	}
	
	if (!$START_DATE){
		punt ("Please pick Start date.");
	}
	
	if (!$END_DATE){
		punt ("Please pick End date.");
	}
	
	// get a handle to the database
    $db = connectDB($DBHost, $DBUser, $DBPasswd, $DBName);
	
	$query = "INSERT INTO paycheck(JID, HOURS_PAID_FOR, NET_PAY, START_DATE, END_DATE) VALUES ('$JID', '$HOURS_PAID_FOR', '$NET_PAY', '$START_DATE', '$END_DATE');";
	
	$result = queryDB($query, $db);
	
	//tell the result
	echo "<div class='panel panel-default'>\n";
	echo "\t<div class='panel-body'>\n";
	echo "\t\tYour paycheck is added.";
	echo "</div></div>\n";
}
?>
<div class="container">
<div class="col-xs-12">
<form action=""  method="post" enctype="multipart/form-data">
	
	<div class="form-group">
	<label for="JID">Job</label>
	<select class="form-control" name="JID">
    <?php echo $jobOptions; ?>
	</select>
	</div>
	
	<div class="form-group">
		<label for="HOURS_PAID_FOR">Hours Paid For:</label>
		<input type="number" name="HOURS_PAID_FOR" min="5" max="100" step=".1">
	</div>
	<div class="form-group">
		<label for="NET_PAY">Net Pay:</label>
		<input type="number" name="NET_PAY" step= ".5">
	</div>
	
	<label for="START_DATE">From:</label>
	<input type="text" id="from" name="START_DATE">
	<label for="END_DATE">to</label>
	<input type="text" id="to" name="END_DATE">
	<br><br>
    <button type="submit" class="btn btn-default">Submit</button>
	  <script>
  </script>
</form><br>

<!--DB Table-->
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
</font>

</body>
</html>
