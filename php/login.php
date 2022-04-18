<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="../css/custom.css" rel="stylesheet">
	
	<title>Update Rent</title>
</head>

<body>

   <div class="container">	
	<img src="../img/logo.gif" alt="Logo"></img>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-navy">
  <div class="container-fluid">
  <div class="d-lg-none">
    <a class="navbar-brand" href="#">Navigation</a>
	</div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	  	<ul class="nav nav-pills space-top">
        <li class="nav-item">
          <a class="nav-link" href="../index.html">Home</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cook.html">Cooking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../involved.html">Get Involved!</a>
        </li>
		<li class="nav-item">
			<a class="nav-link" href="../accom.html">Accommodation</a>
		</li>
		<li>
			<a class="nav-link active" aria-current="page" style="background-color: navy;" href="../rent.html">Rent</a>
		</li>
		<li>
			<a class="nav-link" href="../feeback.html">Feedback</a>
		</li>
      </ul>
    </div>
  </div>
</nav>

<header> 
	<h1>Rent Payment</h1>
	<h3>Because debt needs to be left in the past</h3>
</header>

</html>

<?php

// Check if the user has submitted data into the form

if (isset ($_POST ['submit'])){
	$ID = $_POST ['ID'];
	$pass = $_POST ['pass'];
	$amountPaid = $_POST ['amountPaid'];
	
	//Check if both fields have been entered
	if ($ID && $pass){
		
			//Connect to the server and the williams database
			$servername = "sql302.epizy.com";
			$username = "epiz_31535419";
			$password= "QkLKDX4cCQ";
			$dbname = "epiz_31535419_rent";

				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $dbname);
					// Check connection
					if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
								}
	
	// Check if that department exists
	$exists= mysqli_query ($conn,"SELECT * FROM tenant WHERE ID = '$ID' AND pass = '$pass'") or die ("Query could not be completed");
	
	// Update the location field in the tenant table
	if (mysqli_num_rows($exists) !=0){
		mysqli_query ($conn,"UPDATE tenant SET amountPaid = amountPaid + '$amountPaid' WHERE ID = '$ID' AND pass = '$pass'") or die ("Update could not be applied");
		echo "Payment was successful. Check your account details to view your new balance";
			}else echo "ID or password is incorrect.  Please re-enter:";
					}else echo "You must enter values for all fields.  Please re-enter";
		
		
		
		
	}
	
?>
<html>
<head>
	<title>Update Rent</title>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="../css/custom.css" rel="stylesheet">
</head> 
<body>
<div class="row" id="ind-1">
<form action ="login.php" method ="POST">
<table>
<h4><tr><td>ID:</td> <td> <input type ="text" id="ID" name="ID"> </td></tr></h4>
<h4><tr><td>Password:</td> <td> <input type ="text" id="pass" name="pass"> </td></tr></h4>
<h4><tr><td>Amount to pay:</td> <td> <input type ="text" id="amountPaid" name="amountPaid"> </td></tr></table></h4>
<br>
<p><input type ="submit" id="submit" name="submit" value = "Pay" class="btn btn-info"></p>
<p><a href="signin.php" class="btn btn-info">View Account Details</a></p>
</table>
</form>
</div>
<p><a href="update.html">Return to menu</a></p>
</body>
</html>