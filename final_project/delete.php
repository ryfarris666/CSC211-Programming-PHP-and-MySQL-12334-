<?php
// delete.php - delete record
// delete single record

define('TITLE', 'Delete Record');
include('templates/header.html');
include('config.php');

// check for id ch6 p8
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
$id = $_GET['id'];

// delete query ch12 p36
$query = "DELETE FROM entries WHERE id = $id LIMIT 1";
$result = mysqli_query($dbc, $query); 

if (mysqli_affected_rows($dbc)== 1) {
     echo '<p class="sucess">Recod deleted!</p>';
}else{
    echo '<p class="error">Ivalid ID.</p>';
}
}else{
	echo '<p class="error">Invalid ID.</p>';
}

echo '<p><a href="display.php">Back to records</a></p>';

mysqli_close($dbc);
include('templates/footer.html');
?>