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
  
 	$sql = "DELETE * FROM CUSTOMER WHERE lastName='$lastName' AND firstName='$firstName'"

  //Create success variable to store the return of the sql command execution
  $success = odbc_exec($connection, $sql);
  //If the search fails
  if(!$success) {
	echo "No record found";
	exit;
  } else {
	//Print success message
	echo "<h1>Customer deleted</h1>";
	
  }
  // Close the database connection 
  odbc_close($connection);
  }
?>

<tbody>
</body>
</html>
