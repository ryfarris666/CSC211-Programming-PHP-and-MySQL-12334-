<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Larry Ullman's Books and Chapters</title>
</head>
<body>
<h1>Some of Larry Ullman's Books</h1>
<?php // Script 7.4 - books.php
/* This script creates and prints out a multidimensional array. */
// Address error management, if you want.

// Create the first array:
$phpvqs = [1 => 'Getting Started with PHP', 'Variables', 'HTML Forms and PHP', 'Using Numbers'];

// Create the second array:
$phpadv = [1 => 'Advanced PHP Techniques', 'Developing Web Applications', 'Advanced Database Concepts', 'Basic Object-Oriented Programming'];

// Create the third array:
$phpmysql = [1 => 'Introduction to PHP', 'Programming with PHP', 'Creating Dynamic Web Sites', 'Introduction to MySQL'];

// Create the multidimensional array:
$books = [
   'PHP VQS' => $phpvqs,
   'PHP Advanced VQP' => $phpadv,
   'PHP and MySQL VQP' => $phpmysql
];

// Print out some values:
print "<p>the third chapter of the first book is <i>{$books['PHP VQS'][3]}</i>.</p>";
print "<p>the first chapter of the second book is <i>{$books['PHP Advanced VQP'][1]}</i>.</p>";
print "<p>the fourth chapter of the fourth book is <i>{$books['PHP and MySQL VQP'][4]}</i>.</p>";

// using print_r() and <pre> discussed on page 177 with example
echo "<pre>";
foreach ($books as $key => $value) {
	print "<p>$key: " . print_r($value, true) . "</p>\n";
}
echo "</pre>";
?>
</body>
</html>