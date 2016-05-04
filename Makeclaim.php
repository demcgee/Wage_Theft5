<!DOCTYPE html>

<?php
	include_once('top.php');
?>

<?php
	// Generating pull down menu for employers
	
	// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up my query
	$query = "SELECT EID, E_NAME FROM employer ORDER BY E_NAME;";
	
	// run the query
	$result = queryDB($query, $db);
	
	// options for employers
	$employerOptions = "";
	
	// go through all employers and put together pull down menu
	while ($row = nextTuple($result)) {
		$employerOptions .= "\t\t\t";
		$employerOptions .= "<option value='";
		$employerOptions .= $row['EID'] . "'>" . $row['E_NAME'] . "</option>\n";
	}
?>

<html lang="en">
<head>
  <title>Stop! Wage Theft</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <li><a href="Home_in.php"><span style="font-size:1.0em" class="glyphicon glyphicon-home"></span><font face="Arial Black"> Home</a></li></font>
      <li><a href="jobform.php"><span style="font-size:1.0em" class="glyphicon glyphicon-briefcase"></span><font face="Arial Black"> Enter Job</a></li></font>
      <li><a href="enterhours.php"><span style="font-size:1.0em" class="glyphicon glyphicon-time"></span><font face="Arial Black"> Enter Hours</a></li></font>
      <li><a href="enterpaycheck.php"><span style="font-size:1.0em" class="glyphicon glyphicon-barcode"></span><font face="Arial Black"> Enter Paycheck</a></li></font>
      <li class="active"><a href="Makeclaim.php"><span style="font-size:1.0em" class="glyphicon glyphicon-bullhorn"></span><font face="Arial Black"> Make Claim</a></li></font>
      <li><a href="faq_in.php"><span style="font-size:1.0em" class="glyphicon glyphicon-question-sign"></span><font face="Arial Black"> FAQ</a></li></font>
<li><a href="contactus_in.php"><span style="font-size:1.0em" class="glyphicon glyphicon-phone-alt"></span><font face="Arial Black"> Contact Us</a></li></font>
	<li><a href="Adminhome.php"><span style="font-size:1.0em" class="glyphicon glyphicon-user"></span><font face="Arial Black"> Admin Dashboard</a></li></font>
    </ul>
    	<ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span><font face="Arial Black"> Logout</a></li></font>
	</ul>
  </div>
</nav>
   <font face ="Arial Black">
<div class="container">
  <h2>Make Claim</h2>
</div>

<?php
// Back to PHP to perform the search if one has been submitted. Note
// that $_POST['submit'] will be set only if you invoke this PHP code as
// the result of a POST action, presumably from having pressed Submit
// on the form we just displayed above.
if (isset($_POST['EID'])) {
//	echo '<p>we are processing form data</p>';
//	print_r($_POST);

	// get data from the input fields
	$EID = $_POST['EID'];
	$CLAIM_DATE_START = $_POST['CLAIM_DATE_START'];
	$CLAIM_DATE_END = $_POST['CLAIM_DATE_END'];
	$CLAIM_HOURS = $_POST['CLAIM_HOURS'];
	
	// check to make sure we have an email
	if (!$EID) {
		punt ("Please enter an employer");
	}
	
	if (!$CLAIM_DATE_START) {
		punt ("Please enter a start date");
	}
	
	if (!$CLAIM_DATE_END) {
		punt ("Please enter an end date");
	}

	if (!$CLAIM_HOURS) {
		punt("Please enter hours");
	}

	// check if address is already in database
		// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
		session_start();
	$id = $_SESSION['id'];
	

	// set up my query
	$query = "INSERT INTO claim(EID, id, CLAIM_DATE_START, CLAIM_DATE_END, CLAIM_HOURS) VALUES ('$EID','$id', '$CLAIM_DATE_START', '$CLAIM_DATE_END', '$CLAIM_HOURS');";
	
	// run the query
	$result = queryDB($query, $db);
	
	// tell users that we added the employer to the database
	echo "<div class='panel panel-default'>\n";
	echo "\t<div class='panel-body'>\n";
    echo "\t\tThe claim was added to the database\n";
	echo "</div></div>\n";
	
}
?>

<div class="container">
<div class="col-xs-12">
<form action=""  method="post" enctype="multipart/form-data">
	
	<div class="form-group">
	<label for="">Employer</label>
	<select class="form-control" name="EID">
    <?php echo $employerOptions; ?>
	</select>
	
	</div>
    <label for="CLAIM_DATE_START">From:</label>
	<input type="text" id="from" name="CLAIM_DATE_START">
	<label for="CLAIM_DATE_END">to</label>
	<input type="text" id="to" name="CLAIM_DATE_END">
	
	<div class="form-group">
        <label for="CLAIM_HOURS">Hours Shorted</label>
        <input type="number" name="CLAIM_HOURS" min="1" max="100" step=".5"/>
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
	  <script>
  </script>
</form> </font>

</body>
</html>
