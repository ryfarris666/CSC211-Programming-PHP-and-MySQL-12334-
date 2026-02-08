<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>number_format results</title>
	<style type="text/css">
		.number { font-weight: bold;}
	</style>
</head>
<body>
<h1>number_format() demo</h1>

<?php 
// Get the number from the form:
$number = $_POST['number'];

//demo number_format() on 84-85
print "<h2>Using number_format() Function</h2>";

//Examples
$number = 100000;
echo "number_format($total) = " . number_format($total) . "</p>";
echo "number_format($total, 2) = " . number_format($total, 2) . "</p>";
echo "number_format($total, 3) = " . number_format($total, 3) . "</p>";
echo "number_format($total, 2, ',','.') = " . number_format($total, 2, ',','.') . "</p>";

print "<h2>You calculation with formatting</h2>";

// calculation with formatting
print "<p>Price: $" . number_format($total, 2) . "</p>";
print "<p>Quantity: " . number_format($quantity, 0) . "</p>";
print "<p>Subtotal: $" . number_format($price * $quantity, 2) . "</p>";
print "<p>Discount; $" . number_format($discount, 2) . "</p>";
print "<p>Tax Rate: " . number_format($tax, 1) . "%</p>";

print "<p><strong>Final total:</strong> $" . number_format($total,2) . "</p>";

// raw vs formatted comparison
print "<h2>Raw vs Formatted Comparison</h2>";
print "<p><strong>Raw total:</strong> $total</p>";
print "<p><strong>Formatted (2 decimals):</strong> $" .  number_format($total, 2) . "</p>";
?>
</body>
</html>