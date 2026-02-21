<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<style type="text/css" media="screen">
		.error { color: red; }
	</style>
</head>
<body>
<h1>Registration Results</h1>
<?php // Script 6.3 - handle_reg.php #2
/* This script receives seven values from register.html:
email, password, confirm, year, terms, color, submit */

/*Part A: Function explanation

isset()—This function checks if a variable exists and is not a null. 
it returns true if the variable exists and has any value, including zero, 
false, or an empty string, and false if the variable does not exist or is null.*/

/*Empty()—This function checks its variable. If it is considered empty, it returns 
true if the variable does not exist, is null, or is an empty string, "0," or false, 
or is an empty array. it returns false if the variable exists and is not and does not 
have a non-empty value.*/

/*Is_numeric()—this function checks if the variable is a number or a numeric string. 
It returns true if the variable is an integer, float, or string containing only numbers, 
like “42” or "3.14," and returns false otherwise.*/

// Flag variable to track success:
$okay = true;

// Validate the email address:
if (empty($_POST['email'])) {
	print '<p class="error">Please enter your email address.</p>';
	$okay = false;
}

// Validate the password:
if (empty($_POST['password'])) {
	print '<p class="error">Please enter your password.</p>';
	$okay = false;
}

// If there were no errors, print a success message:
if ($okay) {
	print '<p>You have been successfully registered (but not really).</p>';
}
?>
</body>
</html>