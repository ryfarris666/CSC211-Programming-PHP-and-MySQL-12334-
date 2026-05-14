<?php
// process.php - save to database
// save to database 10 points and control structure 4 points

define('TITLE', 'Processing');
include('templates/header.html');
include('config.php'); //include directive

//form data ch5 p26
$first_name = trim($_POST['first_name'] ?? '');
$last_name = trim($_POST['last_name'] ?? '');
$address = trim($_POST['address'] ?? '');
$city = trim($_POST['city'] ?? '');
$state = trim($_POST['state'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');

// srting mod ch5. p26
$first_name = trim($first_name);
$last_name = trim($last_name);

// concatenation ch5. p 5
$full_name = $first_name . ' ' . $last_name;
echo "<p>Welcome, $full_name!</p>";

// control structure - ch6 p 9
$okay = true;
$error = '';

if(empty($first_name)) { $okay = false; $error = 'First name required';}
if(empty($last_name)) { $okay = false; $error = 'Last name required';}
if(empty($address)) { $okay = false; $error = 'Address required';}
if(empty($city)) { $okay = false; $error = 'City required';}
if(empty($state)) { $okay = false; $error = 'State required';}
if(empty($phone)) { $okay = false; $error = 'Phone required';}
if(empty($email)) { $okay = false; $error = 'Email required';}

// email validation ch8 p37
if (!empty($email) && substr_count($email,'@') != 1) {
	$okay = false;
	$error = 'Email must have one @ symbol';
}

if (!$okay){
echo '<p class="error">Error: ' . $error . '</p>';
echo '<p><a href="index.php">Go back</a></p>';
include('templates/footer.html');
exit();	
}

// function demo ch12 p 23
$first_name = mysqli_real_escape_string($dbc, $first_name);
$last_name = mysqli_real_escape_string($dbc, $last_name);
$address = mysqli_real_escape_string($dbc, $address);
$city = mysqli_real_escape_string($dbc, $city);
$phone = mysqli_real_escape_string($dbc, $phone);
$email = mysqli_real_escape_string($dbc, $email);

// insert query ch12 p 30
$query = "INSERT INTO entries (first_name, last_name, address, city, state, phone, email)
VALUES ('$first_name', '$last_name', '$address', '$city', '$state', '$phone', '$email')";

// execute query ch12 p20
if (mysqli_query($dbc, $query)) {
	echo '<p class="success">Registration successful!</p>';
	echo '<p><a href="display.php">View ALL Records</a></p>';
}else{
	echo '<p class="error">Error: ' . mysqli_error($dbc) . '</p>';
}
mysqli_close($dbc);
include('templates/footer.html');
?>
