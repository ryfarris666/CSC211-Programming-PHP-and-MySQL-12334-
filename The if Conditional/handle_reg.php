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

// Flag variable to track success:
$okay = true;

if(empty($_POST['email'])){
	echo"<p style='color: red;'> email</p>";
	$okay = false;
}
if(empty($_POST['password'])){
	echo"<p style='color: red;'> password</p>";
	$okay = false;
}
if(empty($_POST['confirm password'])){
	echo"<p style='color: red;'> confirm password</p>";
	$okay = false;
}
if(empty($_POST['year born'])){
	echo"<p style='color: red;'> year born</p>";
	$okay = false;
}
if(empty($_POST['favorite color'])){
	echo"<p style='color: red;'> favorite color</p>";
	$okay = false;
}	
// If there were no errors, print a success message:
if ($okay) {
	print '<p>You have been successfully registered (but not really).</p>';
}
?>
</body>
</html>