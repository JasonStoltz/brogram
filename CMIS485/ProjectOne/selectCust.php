<html>
<head>
<title>Select a Customer Record</title>
</head>
<body>
<!-- Set lastName and firstName variables to setup SELECT statement -->
<?php

  //create db connection

   $connection = odbc_connect('Driver={Microsoft Access Driver (*.mdb)};DBQ=cmis008f', 'nousername', 'nopassword');

  // test connection 

  if (!$connection) { 
   echo "Couldn't make DB connection!"; 
   exit; 
  }


  //Set variables
  $lastName = $_POST['lastName'];
  $firstName = $_POST['firstName'];
  $allFlag = $_POST['searchAll'];

  //Set SQL SELECT statement to variable $sql based on flag
  if($allFlag){
  	 $sql =  "SELECT * FROM CUSTOMER";	
  }
 else {
 	$sql = "SELECT * FROM CUSTOMER WHERE lastName='$lastName' AND firstName='$firstName'";
 }

  //Create success variable to store the return of the sql command execution
  $success = odbc_exec($connection, $sql);

  //If the search fails
  if(!$success) {
	echo "<h1>No record found</h1>";
  } else {
	//Print the beginning of the table
	echo "<h1>Selected customer:</h1>";
	echo "<table border=1 padding=1>";
	echo "<tr>";
	echo "<td>CustID</td>";
	echo "<td>Last Name</td>";
	echo "<td>First name</td>";
	echo "<td>MI</td>";
	echo "<td>Street</td>";
	echo "<td>City</td>";
	echo "<td>State</td>";
	echo "<td>Zip</td>";
	echo "<td>Home Phone</td>";
	echo "<td>Cell Phone</td>";
	echo "<td>DOB</td>";
	echo "<td>Profession</td>";
	echo "<td>Employer</td>";
	echo "<td>Refferer</td>";
	echo "<td>Agent ID</td>";
	echo "<tr>";
  //If it succeeds set all variables to appropriate values using odbc_fetch_array() command
  while($row = odbc_fetch_array($success)) {
	echo "<tr>";
	echo "<td>".$row['cust_id']."</td>";
	echo "<td>".$row['lastName']."</td>";
	echo "<td>".$row['firstName']."</td>";
	echo "<td>".$row['middleInitial'];
	echo "<td>".$row['street'];
	echo "<td>".$row['city'];
	echo "<td>".$row['state'];
	echo "<td>".$row['zip'];
	echo "<td>".$row['home_phone'];
	echo "<td>".$row['cell_phone'];
	echo "<td>".$row['DOB'];
	echo "<td>".$row['profession'];
	echo "<td>".$row['employer'];
	echo "<td>".$row['referrer'];
	echo "<td>".$row['agent_id'];
  }

  }
    // Close the database connection 
    odbc_close($connection);
?>

<tbody>
</body>
</html>
