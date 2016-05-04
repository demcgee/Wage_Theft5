<!DOCTYPE html>

<?php
    include_once('top.php');
	include_once('config.php');
	include_once('dbutils.php');
	include_once('hashutil.php');
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
      <a class="navbar-brand" href="Home.php">Wage Theft</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="Home_in.php"><span style="font-size:1.0em" class="glyphicon glyphicon-home"></span><font face="Arial Black"> Home</a></li></font>
	<li class="active"><a href="jobform.php"><span style="font-size:1.0em" class="glyphicon glyphicon-briefcase"></span><font face="Arial Black"> Enter Job</a></li></font>
      <li><a href="enterhours.php"><span style="font-size:1.0em" class="glyphicon glyphicon-time"></span><font face="Arial Black"> Enter Hours</a></li></font>
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
  
<div class="container">
  <h2>Enter Job Information</h2>
</div>

<?php
// Back to PHP to perform the search if one has been submitted. Note
// that $_POST['submit'] will be set only if you invoke this PHP code as
// the result of a POST action, presumably from having pressed Submit
// on the form we just displayed above.
if (isset($_POST['JOB_TITLE'])) {
//	echo '<p>we are processing form data</p>';
//	print_r($_POST);

	// get data from the input fields
	$EID = $_POST['EID'];
	$JOB_TITLE = $_POST['JOB_TITLE'];
	$HOURLY_WAGE = $_POST['HOURLY_WAGE'];
	
	// check to make sure form is filled out
	if (!$EID) {
		punt ("Please enter an employer name");
	}

	if (!$JOB_TITLE) {
		punt("Please enter a job title");
	}

	if (!$HOURLY_WAGE) {
		punt("Please enter an hourly wage");
	}

	// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	session_start();
	$id = $_SESSION['id'];
	
	// set up my query
	$query = "INSERT INTO job(EID, id, JOB_TITLE, HOURLY_WAGE) VALUES ('$EID', '$id', '$JOB_TITLE', '$HOURLY_WAGE');";
	
	// run the query
	$result = queryDB($query, $db);
	
	// tell users that we added the job to the database
	echo "<div class='panel panel-default'>\n";
	echo "\t<div class='panel-body'>\n";
    echo "\t\tThe job " . $JOB_TITLE . " was added to the database\n";
	echo "</div></div>\n";
	
}
?>

<div class="container">
<div class="col-xs-12">
<form action=""  method="post" enctype="multipart/form-data">
  
    <div class="form-group">
	<label for="EID">Employer</label>
	<select class="form-control" name="EID">
    <?php echo $employerOptions; ?>
	</select>
	</div>
	
	<div class="form-group">
	<label for="JOB_TITLE">Job Title</label>
	<input type="text" class="form-control" name="JOB_TITLE"/>
	</div>
	
	<div class="form-group">
	<label for="HOURLY_WAGE">Hourly Wage</label>
	<input type="number" name="HOURLY_WAGE" min="1" max="100" step=".5"/>
	</div>
	
	<button type="submit" class="btn btn-default">Submit</button>
</form>

<!----------------->
<!---List jobs--->
<!----------------->
<div class="container">
<div class="col-xs-12">
	<h2><?php echo "Jobs"; ?></h2>
</div>
</div>

<div class="container">
<div class="col-xs-12">
<table class="table table-hover">

<!-- Titles for table -->
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
</div>
</div>

</div> <!-- closing bootstrap container -->

</body>
</html>
