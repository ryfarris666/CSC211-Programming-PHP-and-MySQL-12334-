<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forum Posting</title>
</head>
<body>
<?php // Script 5.6 - handle_post.php #5
/* This script receives five values from posting.html:
first_name, last_name, email, posting, submit */

// Address error management, if you want.

// define name variables
$first_name = "Jane";
$last_name = "Doe";
// Create a full name variable:
$full_name = $first_name . ' ' . $last_name;

echo "<h1>String Functions with $full_name</h1>";

// Get a word count:
echo "<h2>1. str_word_count()</h2>";
echo "Full name: '$full_name'<br>";
echo "Word count: " . str_word_count($full_name) . " words<br>";

// string length
echo "<h2>2. strlen()</h2>";
echo "First name length:" . strlen($first_name) . "<br>";
echo "Last name length:" . strlen($last_name) . "<br>";
echo "Full name length:" . strlen($full_name) . "<br>";

// function 
echo "<h2>3. substr()</h2>";
echo "First letter: " . substr($full_name, 0,1) . "<br>";
echo "Last letter: " .  substr($full_name, -1) . "<br>";
echo "Middle section: " .  substr($full_name, 3,4) . "<br>";

?>
</body>
</html>