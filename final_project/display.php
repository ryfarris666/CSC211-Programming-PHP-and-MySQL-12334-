<?php
// display.php - view all records
// display contents 5 points add button 5 points

define('TITLE', 'View Records');
include('templates/header.html');
include('config.php');

// add new record button - 5 points
echo '<p><a href="index.php"><button>+ ADD NEW RECORD</button></a></p>';

// select query ch12 p29
$query = "SELECT * FROM entries ORDER BY last_name";
$result = mysqli_query($dbc, $query);

$num = mysqli_num_rows($result);
echo "<p>Total records: $num</p>";

if ($num > 0) {
// array demo chp 7 p14
echo '<table>';
echo '<tr><th>ID</th><th>Name</th><th>Address</th><th>City</th><th>State</th><th>Phone</th><th>Email</th><th>Action</th></tr>';

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	// concatenation ch5 p5
$full_name = $row['first_name'] . ' ' . $row['last_name'];

echo '<tr>';
echo '<td>' . $row['id'] . '</td>';
echo '<td>' . $full_name . '</td>';
echo '<td>' . $row['address'] . '</td>';
echo '<td>' . $row['city'] . '</td>';
echo '<td>' . $row['state'] . '</td>';
echo '<td>' . $row['phone'] . '</td>';
echo '<td>' . $row['email'] . '</td>';
echo '<td>
<a href="edit.php?id='. $row['id'] . '" style="color:blue; margin-right:10px;">Edit</a> 
<a href="delete.php?id='. $row['id'] . '" onclick="return confirm(\'Delete?\')">Delete</a></td>';
echo '</td>';
}

echo '</table>';

// compare and files link
echo '<p><a href="compare.php">Compare Fields</a></p>';
echo '<p><a href="files.php">View files in directory</a></p>';
}else{
echo '<p>No records yet.</p>';
}
mysqli_close($dbc);
include('templates/footer.html');
?>