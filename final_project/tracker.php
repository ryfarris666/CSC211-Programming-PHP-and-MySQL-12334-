<?php
//tracker.php - medicine tracker

define('TITLE', 'Medicine Tracker');
include('templates/header.html');
include('config.php');
?>

<h2>Medicine Tracker</h2>
<p>Track your daily medications.</p>

<?php
// show messages
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'added'){
        echo '<p style="color: green; font-weight: bold;">Medication added!</p>';
    }
    if ($_GET['msg'] == 'deleted') {
        echo '<p style="color: green; font-weight: bold;">Medication deleted!</p>';
    }
    if ($_GET['msg'] == 'taken') {
        echo '<p style="color: green; font-weight: bold;">Marked as taken!</p>';
    }
}

//take button
if(isset($_GET['take']) && is_numeric($_GET['take'])){
    $id = $_GET['take'];
    $time = date('H:i:s');
    mysqli_query($dbc, "UPDATE medicine_tracker SET time_taken='$time', status='Taken' WHERE id=$id");
    header('Location: tracker.php?msg=taken');
    exit();
}

//delete
if (isset($_GET['delete']) && is_numeric($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($dbc, "DELETE FROM medicine_tracker WHERE id=$id");
    header('Location: tracker.php?msg=deleted');
    exit();    
}
?>

<div style="background: #f1f1f1; padding: 20px; border-radius: 5px; margin-bottom: 30px;">
    <h3>Add New Medication</h3>
    <form action="add_medicine.php" method="post">
        <p>
            <label>Medicine Name:</label><br>
            <input type="text" name="medicine_name" style="width: 100%; padding: 8px;" required>
        </p>
        <p>
            <label>Dosage:</label><br>
            <input type="text" name="dosage" placeholder="500mg" style="width: 50%; padding: 8px;" required>
        </p>
        <p>
            <label>Frequency:</label><br>
            <select name="frequency" style="width: 50%; padding: 8px;" required>
                <option value="">Select</option>
                <option value="Once daily">Once daily</option>
                <option value="Twice daily">Twice daily</option>
                <option value="Three times daily">Three times daily</option>
                <option value="As needed">As needed</option>
            </select>
        </p>
        <p>
            <label>Date Prescribed:</label><br>
            <input type="date" name="date_prescribed" style="width: 50%; padding: 8px;" required>
        </p>
        <p>
            <label>Notes:</label><br>
            <textarea name="notes" rows="3" style="width: 100%; padding: 8px;"></textarea>
        </p>
        <input type="submit" value="Add Medication" style="background: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
    </form>
</div>

<h3>My Medications</h3>

<?php
// display current meds
$result = mysqli_query($dbc, "SELECT * FROM medicine_tracker ORDER BY status ASC, date_added DESC");

if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo $row['medicine_name'] . " - ";
        echo $row['dosage'] . " - ";
        echo $row['frequency'] . " - ";
        echo $row['status'] . "<br>";
        
        if ($row['status'] != 'Taken') {
            echo '<a href="tracker.php?take=' . $row['id'] . '">Take</a> ';
        }
        echo '<a href="edit_medicine.php?id=' . $row['id'] . '">Edit</a> ';
        echo '<a href="tracker.php?delete=' . $row['id'] . '">Delete</a>';
        echo "<br><br>";
    }
} else {
    echo '<p>No medications added yet. Use the form above.</p>';
}

mysqli_close($dbc);
include('templates/footer.html');
?>