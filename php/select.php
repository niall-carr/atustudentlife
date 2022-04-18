<?php

//1.  Create a database connection
$dbhost ="sql302.epizy.com";
$dbuser ="epiz_31535419";
$dbpassword="QkLKDX4cCQ";
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

$result = mysqli_query($connection,"SELECT tenant.id, tenant.firstName, tenant.lastName, accom.Name, tenant.houseNumber, tenant.cardNo, accom.monthlyRent, tenant.amountPaid FROM tenant INNER JOIN accom ON tenant.accom_id=accom.a_ID WHERE ID = '143526' AND pass = 'eN01qen9d1'");

/*echo "<table border='1'>
<tr>
<th>ID</th>
<th>Staff Name</th>
<th>Client ID</th>
<th>Client Name</th>
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
?> 