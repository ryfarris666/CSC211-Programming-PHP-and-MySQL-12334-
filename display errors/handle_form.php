<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Your Feedback</title>
</head>
<body>
<?php // Script 3.3 handle_form.php 

// This page receives the data from feedback.html
// It will receive: title, name, email, response, comments, and submit in $_POST.

// Create shorthand versions of the variables:
$title = $_POST['title'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST ['email'];
$response = $_POST['response'];
$comments = $_POST['comments'];

// Print the received data:
print "<h1>Thank you, for your comments.</h1>
print "<p><strong>Name:</strong> $title $first_name $last_name</p>";
print "<p><strong>Email:</strong> $email</p>";
print "<p><strong>Response:</strong> $response</p>";
print "<p><strong>Comments:</strong> $comments</p>";

// Show submission
print "<hr>";
print "<h2>Data Received:</h2>";
print "<pre>";
print_r($_POST);
print "</pre>";

?>
</body>
</html>