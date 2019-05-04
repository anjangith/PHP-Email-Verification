<?php

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="root"; // Mysql password
$db_name="email_verification"; // Database name


//Connect to server and select database.
$con=mysqli_connect($host,$username,$password,$db_name);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// ...some PHP code for database "my_db"...

// Change database to "test"
mysqli_select_db($con,$db_name);

// ...some PHP code for database "test"...

//mysqli_close($con);

?>
