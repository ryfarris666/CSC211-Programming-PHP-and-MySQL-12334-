<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
</head>
<body>
<?php //script 12.2 - mysqli_connect.php - database connection
/*This script connects to the mysql database. I used it for my final and it was perfect*/

// connect to MYSQL - xammp default rpint out message
if ($dbc = mysqli_connect('localhost', 'username', 'password', 'myblog')) {
 
 print '<p>Sucessfully connected to database!</p>';
 
 mysqli_close($dbc); //close the connection.
 
}else{
print '<p style="color:red;">Could not connect to the database:<br>' . mysqli_connect_error() . '.</p>';

}
?>
</body>
</html>