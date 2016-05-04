<!DOCTYPE html>

<?php
	include_once('top.php');
	include_once("config.php");
	include_once("dbutils.php");
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
      <a class="navbar-brand" href="Home_in.php"><font face="Arial Black">Stop! Wage Theft</a></font>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="Home_in.php"><span style="font-size:1.0em" class="glyphicon glyphicon-home"></span><font face="Arial Black"> Home</a></li></font>
      <li class="active"><a href="enterhours.php"><span style="font-size:1.0em" class="glyphicon glyphicon-time"></span><font face="Arial Black"> Enter Hours</a></li></font>
      <li><a href="enterpaycheck.php"><span style="font-size:1.0em" class="glyphicon glyphicon-barcode"></span><font face="Arial Black"> Enter Paycheck</a></li></font>
      <li><a href="Makeclaim.php"><span style="font-size:1.0em" class="glyphicon glyphicon-bullhorn"></span><font face="Arial Black"> Make Claim</a></li></font>
      <li><a href="faq_in.php"><span style="font-size:1.0em" class="glyphicon glyphicon-question-sign"></span><font face="Arial Black"> FAQ</a></li></font>
	  <li><a href="contactus_in.php"><span style="font-size:1.0em" class="glyphicon glyphicon-phone-alt"></span><font face="Arial Black"> Contact Us</a></li></font>
    </ul>
	<ul class="nav navbar-nav navbar-right">
	  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span><font face="Arial Black"> Logout</a></li></font>
	</ul> 
  </div>
</nav>
 
 <font face ="Arial Black">
<div class="container">
  <h3>Enter Hours</h3>
</div>

<?php
if (isset($_POST['submit'])){
	//get data
	$DAILY_HOURS = $_POST['DAILY_HOURS'];
	$DAILY_HOURS_DATE = $_POST['DAILY_HOURS_DATE'];
	
	if (!$DAILY_HOURS){
		punt ("Please enter hours.");
	}
	
	if (!$DAILY_HOURS_DATE) {
		punt ("Please enter dates.");
	}
	 
	// get a handle to the database
    $db = connectDB($DBHost, $DBUser, $DBPasswd, $DBName);
	
	$query = "SELECT DAILY_HOURS, DAILY_HOURS_DATE FROM hours WHERE DAILY_HOURS_DATE='$DAILY_HOURS_DATE', DAILY_HOURS='$DAILY_HOURS';";
	$result = queryDB($query, $db);
	
	
	$query = "INSERT INTO hours(DAILY_HOURS, DAILY_HOURS_DATE) VALUES ('$DAILY_HOURS', '$DAILY_HOURS_DATE');";
	$result = queryDB($query, $db);
	
	//tell the result
	echo "<div class='panel panel-default'>\n";
	echo "\t<div class='panel-body'>\n";
	echo "\t\tYou worked " . $DAILY_HOURS . " for " . $DAILY_HOURS_DATE ." .\n";
	echo "</div></div>\n";
}
?>

<!--Enter Hours -->
<div class="container">
<div class="col-xs-12">
<form action=""  method="post" enctype="multipart/form-data">
  
  <p><b>Date:</b> <input type="text" id="datepicker"></p>
  
  <div class="form-group">
        <label for="hourlywage">Hours Worked:</label>
        <input type="number" name="quantity" min="1" max="100" step=".5"/>
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
<br>



<!--DB Table-->
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
		echo "<td>" . $row['DAILY_HOURS'] . "</td>";
		echo "<td>" . $row['DAILY_HOURS_DATE'] . "</td>";
		echo "</tr>";
	}
?>
</tbody>

</table>
</font>

</div>
</div>

</body>
</html>