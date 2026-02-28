<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>No Soup for You!</title>
</head>
<body>
<h1>Mmm...soups</h1>
<?php // Script 7.1 - soups1.php
/* This script creates and prints out an array. */
// Address error management, if you want.

//Create the array:
$soups = [
 'Monday' => 'Minostrone',
 'Tuesday' => 'Creamy potato',
 'Wednesday' => 'Pickle cheeseburger'
];

// count and print the current number of elements:
$count1 = count($soups);
Print "<p>the soups array orignally had
$count1 elements.</p>";

// add three items to the array:
$soups['Thursday'] = 'Chicken noodle';
$soups['Friday'] = 'Chili';
$soups['Saturday'] = 'Tomato';

// count and print the number of elements again:
$count2 = count($soups);
Print "<p>After adding 3 more soups, the array 
now has $count2 elements.</p>";

// Print the contents of the array:
print_r($soups);

?>
</body>
</html>