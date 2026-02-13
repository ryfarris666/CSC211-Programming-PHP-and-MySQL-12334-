<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration</title>
</head>
<body>
<h1>Registration Results</h1>
<?php // Script 6.2 - handle_reg.php
/* This script receives seven values from register.html:
email, password, confirm, year, terms, color, submit */

// Address error management, if you want.
ini_set('display_errors',0);

if(empty($_POST['email'])){
	echo"<p style='color: red;'> email</p>";
} else {
	$email = $_POST['email'];
}

if(empty($_POST['password'])){
	echo"<p style='color: red;'> password</p>";
} else {
	$password = $_POST['password'];
}

if(empty($_POST['confirm password'])){
	echo"<p style='color: red;'> confirm password</p>";
} else {
	$confirm_password = $_POST['confirm password'];
}

if(empty($_POST['year born'])){
	echo"<p style='color: red;'> year born</p>";
} else {
	$year_born = $_POST['year born'];
}	

if(empty($_POST['favorite color'])){
	echo"<p style='color: red;'> favorite color</p>";
} else {
	$favorite_color	= $_POST['favorite color'];
}	
	
// Flag variable to track success:
$okay = true;

// If there were no errors, print a success message:
if ($okay) {
	print '<p>You have been successfully registered (but not really).</p>';
}
?>
</body>
</html>