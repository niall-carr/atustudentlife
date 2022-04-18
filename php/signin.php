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
	
	<title>Account Details</title>
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
	<h1>Sign In</h1>
	<h3>Enter your ID and password to view your account details, or click the shortcut to go straight to paying rent.</h3>
	</header>

  <div class="row" id="ind-1">
<form action="signin.php" method="post"><br>
<h4><tr><td>ID:</td> <td> <input type ="text" id="id" name="ID"> </td></tr></h4><br>

<h4><tr><td>Password:</td> <td> <input type ="text" id="pass" name="pass"> </td></tr></h4><br>
</body>
</html>

<?php

if (isset ($_POST ['submit'])){
	$ID = $_POST ['ID'];
	$pass = $_POST ['pass'];
	
	//Check if both fields have been entered
	if ($ID && $pass){

//1.  Create a database connection
$dbhost ="sql302.epizy.com";
$dbuser ="epiz_31535419";
$dbpassword ="QkLKDX4cCQ";
$dbname = "epiz_31535419_rent";

$connection= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

//Test if connection occured

if(mysqli_connect_errno()){
	die("DB connection failed: " .
		mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
			);
}


if (!$connection)
  {
  die('Could not connect: ' . mysqli_error());
  }

//2.  Perform Database Query

$result = mysqli_query($connection,"SELECT tenant.id, tenant.firstName, tenant.lastName, accom.Name, tenant.houseNumber, tenant.cardNo, accom.monthlyRent, tenant.amountPaid FROM tenant INNER JOIN accom ON tenant.accom_id=accom.a_ID WHERE ID = '$ID' AND pass = '$pass'");

/*echo "<table border='1'>
<tr>
<th>Tenant ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Accommodation</th>
<th>House Number</th>
</tr>";*/


//3. Use returned data 

while($row = mysqli_fetch_array($result))
  {
  echo "<center><table border='1'>";
  echo "<tr><th>Tenant ID</th><td>" . $row['id'] . "</td></tr>";
  echo "<tr><th>First Name</th><td>" . $row['firstName'] . "</td></tr>";
  echo "<tr><th>Last Name</th><td>" . $row['lastName'] . "</td></tr>";
  echo "<tr><th>Accommodation</th><td>" . $row['Name'] . "</td></tr>";
  echo "<tr><th>House Number</th><td>" . $row['houseNumber'] . "</td></tr>";
  echo "<tr><th>Card No</th><td>" . $row['cardNo'] . "</td></tr>";
  echo "<tr><th>Monthly Rent</th><td>€" . $row['monthlyRent'] . "</td></tr>";
  echo "<tr><th>Amount Paid</th><td>€" . $row['amountPaid'] . "</td></tr>";


  }
echo "</table></center>";



//4.  Release returned data 

mysqli_free_result($result);

//5.  Close database connection

mysqli_close($connection);



	}

}

?> 

<html>
<body>
<br><br>
<input class="btn btn-info" type ="submit" id="submit" name="submit" value = "Sign In">
<br><br>
<a href="login.php" class="btn btn-info">Rent Payment</a>


</div>
</body>
</html>