<!DOCTYPE html>
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
      <a class="navbar-brand" href="Home_in.php"><font face="Arial Black" >Stop! Wage Theft</a></font>
	</div>

    <ul class="nav navbar-nav">
      <li><a href="Home_in.php"><span style="font-size:1.0em" class="glyphicon glyphicon-home"></span><font face="Arial Black"> Home</a></li></font>
      <li><a href="enterhours.php"><span style="font-size:1.0em" class="glyphicon glyphicon-time"></span><font face="Arial Black"> Enter Hours</a></li></font>
      <li><a href="enterpaycheck.php"><span style="font-size:1.0em" class="glyphicon glyphicon-barcode"></span><font face="Arial Black"> Enter Paycheck</a></li></font>
      <li><a href="Makeclaim.php"><span style="font-size:1.0em" class="glyphicon glyphicon-bullhorn"></span><font face="Arial Black"> Make Claim</a></li></font>
      <li><a href="faq_in.php"><span style="font-size:1.0em" class="glyphicon glyphicon-question-sign"></span><font face="Arial Black"> FAQ</a></li></font>
	  <li class="active"><a href="contactus_in.php"><span style="font-size:1.0em" class="glyphicon glyphicon-phone-alt"></span><font face="Arial Black"> Contact Us</a></li></font>
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span><font face="Arial Black"> Logout</a></li></font>
	</ul>  
	</div>

</nav>

  
<div class="container">
<div class="page-header">
	<h1><font face="Arial Black">Contact Us</h1></font>
</div>

<div class="col-xs-12">
<div class="col-md-6">
<img src="home1.jpg" class="img-responsive" alt="Wage Theft" align="center">
</div>

<div class="col-md-6"><br>

	<p><font face="Arial Black" size="5.0em">Please, Give us any feedback! </p></font>
	<form name="htmlform" method="post" action="contact_.php">
	<table width="450px">
	</tr>
	<tr>
	 <td valign="top">
	  <label for="first_name">First Name *</label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="first_name" maxlength="50" size="30"> 
	 </td>
	</tr> <br>

	<tr>
	 <td valign="top"">
	  <label for="last_name">Last Name *</label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="last_name" maxlength="50" size="30">
	 </td>
	</tr>
	<tr>
	 <td valign="top">
	  <label for="email">Email Address *</label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="email" maxlength="80" size="30">
	 </td>

	</tr>
	<tr>
	 <td valign="top">
	  <label for="telephone">Telephone Number</label>
	 </td>
	 <td valign="top">
	  <input  type="text" name="telephone" maxlength="30" size="30">
	 </td>
	</tr>
	<tr>
	 <td valign="top">
	  <label for="comments">Comments *</label>
	 </td>
	 <td valign="top">
	  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
	 </td>

	</tr>
	<tr>
	 <td colspan="2" style="text-align:center">

		<button type="submit" class="btn btn-default" name="submit">Submit</button>  
	 </td>
	</tr>
	</table>
</div>

<div class="col-xs-12">
<footer>
<center><br><br><p>Spring 2016 Informatics Project - Ben Schroder, Danielle McGee and Maria(Yujeong) Kim </p>
</footer>

</body>
</html>