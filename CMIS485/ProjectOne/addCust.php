<html>
<head>
<title>Add Customer Record</title>
</head>
<body>
<?php
  //create db connection
   $connection = odbc_connect('Driver={Microsoft Access Driver (*.mdb)};DBQ=cmis008f', 'nousername', 'nopassword');
  // test connection 
  if (!$connection) { 
   echo "Couldn't make DB connection!"; 
   exit; 
  }
  //Set variables
  $agentID = $_POST['agentID'];
  $lName = $_POST['lastName'];
  $firstName = $_POST['firstName'];
  $mInitial = $_POST['middleInitial'];
  $prof = $_POST['profession'];
  $birthDate = $_POST['dob'];
  $homePhone = $_POST['homePhone'];
  $cellPhone = $_POST['cellPhone'];
  $empName = $_POST['employer'];
  $referName = $_POST['referName'];
  $streetName = $_POST['street'];
  $cityName = $_POST['city'];
  $stateName = $_POST['state'];
  $zipCode = $_POST['zip'];

//Create insert statement
$sql = "INSERT INTO CUSTOMER ". 
      "(agent_id, lastName, firstName, middleInitial, profession, DOB, home_phone, cell_phone, employer, referrer, street, city, state, zip) ".
      "VALUES ('$agentID', '$LName', '$FName', '$mInitial', '$prof', '$birthDate', '$homePhone', '$cellPhone', '$empName', '$referName', '$streetName', '$cityName', '$stateName', '$zipCode')";
  
  
  //Create success variable to store the return of the sql command execution
  $success = odbc_exec($connection, $sql);
  //If the search fails
  if(!$success) {
  //Print failed message
	echo "<h1>Failed up add record</h1>";
  } else {
	//Print success message
	echo "<h1>Customer was added successfully</h1>";
  }
  // Close the database connection 
  odbc_close($connection);
?>

</body>
</html>
