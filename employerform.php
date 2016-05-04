<!DOCTYPE html>

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
      <a class="navbar-brand" href="Home.php"><font face="Arial Black" >Stop! Wage Theft</a></font>
	</div>
<font face="arial black">
    <ul class="nav navbar-nav">
      <li><a href="Home.php"><span style="font-size:1.0em" class="glyphicon glyphicon-home"></span><font face="Arial Black"> Home</a></li></font>
	  <li><a href="jobform.php"><span style="font-size:1.0em" class="glyphicon glyphicon-briefcase"></span><font face="Arial Black"> Enter Job</a></li></font>
      <li><a href="enterhours.php"><span style="font-size:1.0em" class="glyphicon glyphicon-time"></span><font face="Arial Black"> Enter Hours</a></li></font>
      <li><a href="enterpaycheck.php"><span style="font-size:1.0em" class="glyphicon glyphicon-barcode"></span><font face="Arial Black"> Enter Paycheck</a></li></font>
      <li><a href="Makeclaim.php"><span style="font-size:1.0em" class="glyphicon glyphicon-bullhorn"></span><font face="Arial Black"> Make Claim</a></li></font>
      <li><a href="faq.php"><span style="font-size:1.0em" class="glyphicon glyphicon-question-sign"></span><font face="Arial Black"> FAQ</a></li></font>
      <li><a href="contactus.php"><span style="font-size:1.0em" class="glyphicon glyphicon-phone-alt"></span><font face="Arial Black"> Contact Us</a></li></font>
    </ul>
	</div>
</nav>
  
<div class="container">
  <h2>Enter Employer Information</h2>
</div>

<?php
// Back to PHP to perform the search if one has been submitted. Note
// that $_POST['submit'] will be set only if you invoke this PHP code as
// the result of a POST action, presumably from having pressed Submit
// on the form we just displayed above.
if (isset($_POST['E_NAME'])) {
//	echo '<p>we are processing form data</p>';
//	print_r($_POST);
	// get data from the input fields
	$E_NAME = $_POST['E_NAME'];
	$ADDRESS = $_POST['ADDRESS'];
	$E_EMAIL = $_POST['E_EMAIL'];
	
	// check to make sure we have an email
	if (!$E_NAME) {
		punt ("Please enter a name");
	}
	if (!$ADDRESS) {
		punt("Please enter an address");
	}
	if (!$E_EMAIL) {
		punt("Please enter an email");
	}
	// check if address is already in database
		// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up my query
	$query = "SELECT ADDRESS FROM employer WHERE ADDRESS='$ADDRESS';";
	
	// run the query
	$result = queryDB($query, $db);
	
	// check if the address is there
	if (nTuples($result) > 0) {
		punt("The address $ADDRESS is already in the database");
	}
	
	// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up my query
	$query = "INSERT INTO employer(E_NAME, ADDRESS, E_EMAIL) VALUES ('$E_NAME', '$ADDRESS', '$E_EMAIL');";
	
	// run the query
	$result = queryDB($query, $db);
	
	// tell users that we added the employer to the database
	echo "<div class='panel panel-default'>\n";
	echo "\t<div class='panel-body'>\n";
    echo "\t\tThe employer " . $E_NAME . " was added to the database\n";
	echo "</div></div>\n";
	
	header('Location: inputuser.php');
}
?>

<div class="container">
<div class="col-xs-12">
<form action=""  method="post" enctype="multipart/form-data">
  
  <div class="form-group">
	<label for="E_NAME">Name</label>
	<input type="text" class="form-control" name="E_NAME"/>
  </div>
  
  <div class="form-group">
	<label for="ADDRESS">Address</label>
	<input type="text" class="form-control" name="ADDRESS"/>
</div>
  
  <div class="form-group">
	<label for="E_EMAIL">Email</label>
	<input type="email" class="form-control" name="E_EMAIL"/>
</div>
  
  <button type="submit" class="btn btn-default" onclick="myFunction()">Submit</button>
 <script>
function myFunction(){
	alert("Employer information is saved successfully!");
}
</script>
</form><br><br>

<!----------------->
<!---List employers--->
<!----------------->

<div class="col-xs-12">
	<h2><?php echo "Employer"; ?></h2>

</div>

<!-- Titles for table -->
<table class="table table-hover">

<tr style="background:#ECCEF5 !important">

	<td>Name</td>
</tr>


<tbody>
<?php
	// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up my query
	$query = "SELECT E_NAME FROM employer ORDER BY E_NAME;";
	
	// run the query
	$result = queryDB($query, $db);
	
	while($row = nextTuple($result)) {
		echo "\n <tr>";
		echo "<td>" . $row['E_NAME'] . "</td>";
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
