<?php
// edit.php - Edit Record
// EXTRA CREDIT - 10 points

define('TITLE', 'Edit Record');
include('templates/header.html');
include('config.php');

// Initialize variables
$first_name = $last_name = $address = $city = $state = $phone = $email = '';
$id = 0;
$errors = [];

// Check for ID in URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Get current record
    $query = "SELECT * FROM entries WHERE id = $id";
    $result = mysqli_query($dbc, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $address = $row['address'];
        $city = $row['city'];
        $state = $row['state'];
        $phone = $row['phone'];
        $email = $row['email'];
    } else {
        echo '<p class="error">Record not found.</p>';
        echo '<p><a href="display.php">Back to Records</a></p>';
        include('templates/footer.html');
        exit();
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id = mysqli_real_escape_string($dbc, $_POST['id']);
    $okay = true;
    
    // Get form data
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $state = $_POST['state'] ?? '';
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    
    // Validate fields
    if (empty($first_name)) { $okay = false; $errors[] = 'First name required'; }
    if (empty($last_name)) { $okay = false; $errors[] = 'Last name required'; }
    if (empty($address)) { $okay = false; $errors[] = 'Address required'; }
    if (empty($city)) { $okay = false; $errors[] = 'City required'; }
    if (empty($state)) { $okay = false; $errors[] = 'State required'; }
    if (empty($phone)) { $okay = false; $errors[] = 'Phone required'; }
    if (empty($email)) { $okay = false; $errors[] = 'Email required'; }
    
    // Email validation
    if (!empty($email) && substr_count($email, '@') != 1) {
        $okay = false;
        $errors[] = 'Email must have one @ symbol';
    }
    
    if ($okay) {
        // Sanitize for database
        $first_name = mysqli_real_escape_string($dbc, $first_name);
        $last_name = mysqli_real_escape_string($dbc, $last_name);
        $address = mysqli_real_escape_string($dbc, $address);
        $city = mysqli_real_escape_string($dbc, $city);
        $phone = mysqli_real_escape_string($dbc, $phone);
        $email = mysqli_real_escape_string($dbc, $email);
        
        // UPDATE query
        $query = "UPDATE entries SET 
                  first_name = '$first_name',
                  last_name = '$last_name',
                  address = '$address',
                  city = '$city',
                  state = '$state',
                  phone = '$phone',
                  email = '$email'
                  WHERE id = $id LIMIT 1";
        
        $result = mysqli_query($dbc, $query);
        
        if (mysqli_affected_rows($dbc) == 1 || mysqli_affected_rows($dbc) == 0) {
            // Success (0 means no changes made)
            header('Location: display.php?msg=updated');
            exit();
        } else {
            $errors[] = 'Could not update record: ' . mysqli_error($dbc);
        }
    }
}

// Display errors if any
if (!empty($errors)) {
    echo '<p class="error">Please fix these errors:</p><ul>';
    foreach ($errors as $error) {
        echo '<li>' . $error . '</li>';
    }
    echo '</ul>';
}
?>

<h2>Edit Record</h2>

<form action="edit.php?id=<?php echo $id; ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    
    <p><label>First Name: <input type="text" name="first_name" 
        value="<?php echo htmlspecialchars($first_name); ?>" required></label></p>
    
    <p><label>Last Name: <input type="text" name="last_name" 
        value="<?php echo htmlspecialchars($last_name); ?>" required></label></p>
    
    <p><label>Address: <input type="text" name="address" size="40" 
        value="<?php echo htmlspecialchars($address); ?>" required></label></p>
    
    <p><label>City: <input type="text" name="city" 
        value="<?php echo htmlspecialchars($city); ?>" required></label></p>
    
    <p><label>State: 
        <select name="state" required>
            <option value="">Select</option>
            <?php
            $states = ['AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 
'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 
'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY'];
            foreach ($states as $st) {
                echo '<option value="' . $st . '"';
                if ($state == $st) echo ' selected';
                echo '>' . $st . '</option>';
            }
            ?>
        </select></label></p>
    
    <p><label>Phone: <input type="text" name="phone" 
        value="<?php echo htmlspecialchars($phone); ?>" required></label></p>
    
    <p><label>Email: <input type="email" name="email" 
        value="<?php echo htmlspecialchars($email); ?>" required></label></p>
    
    <p><input type="submit" value="Update Record"> 
       <a href="display.php">Cancel</a></p>
</form>

<?php
mysqli_close($dbc);
include('templates/footer.html');
?>