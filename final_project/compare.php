<?php
// compare.php - compare fields using substrings
// substrings 5 points

define('TITLE', 'Compare Fields');
include('templates/header.html');
include('config.php');

echo '<h2>Compare first 3 letters of the first name wiht the last 3 letter of the last name</h2>';

$query = "SELECT first_name, last_name FROM entries";
$result = mysqli_query($dbc, $query);

if (mysqli_num_rows($result) >0) {
	echo '<table border="1" cellpadding="5">';
	echo '<tr><th>First Name</th><th>Last Name</th><th>First 3</th><th>Last 3</th><th>Match?</th></tr>';
	
	$match_count = 0;
	$total = 0;
	// ch7 p14
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// substr demo ch5 p23
		$first_part = substr($row['first_name'], 0, 3);
		$last_part = substr($row['last_name'], -3);
		
		// compare using strcasecmp ch5 p21
		if (strcasecmp($first_part, $last_part)== 0) {
			$match = 'YES';
			$match_count++;
		}else{
			$match = 'no';
		}
		$total++;
		
echo '<tr>';
echo '<td>' . $row['first_name'] . '</td>';
echo '<td>' . $row['last_name'] . '</td>';
echo '<td>' . $first_part . '</td>';
echo '<td>' . $last_part . '</td>';
echo '<td>' . $match . '</td>';
echo '</tr>';
	}
	echo '</table>';
	
	// math with variable ch4 p5
	$percentage = ($match_count / $total) * 100;
	echo '<p>Matches: ' . $match_count . ' out of total ' . number_format($percentage, 1) . '%</p>';

}else{
	echo '<p>No records to compare.</p>';
}

echo '<p><a href="display.php">Back to records</a></p>';

mysqli_close($dbc);
include('templates/footer.html');
?>