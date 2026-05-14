<?php
//add_medicine.php - save new meds

include('config.php');

$medicine_name = mysqli_real_escape_string($dbc, $_POST['medicine_name']);
$dosage = mysqli_real_escape_string($dbc, $_POST['dosage']);
$frequency = mysqli_real_escape_string($dbc, $_POST['frequency']);
$date_prescribed = mysqli_real_escape_string($dbc, $_POST['date_prescribed']);
$notes = mysqli_real_escape_string($dbc, $_POST['notes']);

$query = "INSERT INTO medicine_tracker (medicine_name, dosage, frequency, date_prescribed, notes)
VALUES ('$medicine_name', '$dosage', '$frequency', '$date_prescribed', '$notes')";

mysqli_query($dbc, $query);
mysqli_close($dbc);

header('Location: tracker.php?msg=added');
exit();
?>
