<?php // script 8.4 - index.php
// index.php (3 points) all form fields(15 points)

define('TITLE', 'Registration Form');
include('templates/header.html');
?>

<h2>Registration Form</h2>

<?php
// check for error message
if (isset($_GET['error'])) {
	print '<p class="error">Please fill all fields correctly.</p>';
}
?>

<form action="process.php" method="post">

<!-- first name (2 points) -->
<p><label>First Name: <input type="text" name="first_name"
value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" required></label>
</p>

<!-- last name (2 points) -->
<p><label>Last Name: <input type="text" name="last_name"
value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" required></label>
</p>

<!-- address (2 points) -->
<p><label>Address: <input type="text" name="address"
value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>" required></label>
</p>

<!-- city (2 points) -->
<p><label>City: <input type="text" name="city"
value="<?php if (isset($_POST['city'])) echo $_POST['city']; ?>" required></label>
</p>

<!-- State (2 points) -->
<p><label>State:
<select name="state" required>
<option value="">Select</p>
<?php
// array demo -ch7 p4
$states = ['AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 
'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 
'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY'];

foreach ($states as $st) {
    echo '<option value="' . $st . '"';
    if (isset($_POST['state']) && $_POST['state'] == $st) {
        echo ' selected';
    }
    echo '>' . $st . '</option>';
}
?>
</select></label></p>

<! -- phone number (2 points) -->

<p><label>Phone: <input type="text" name="phone"
value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>" required></label></p>

<! -- email validation (3 points) -->

<p><label>Email: <input type="email" name="email"
value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required></label></p>

<p><input  type="submit" value="Register">
 <input type="reset" value="Clear"></p>
 </form>
 
 <p><a href="display.php">View All Records<a/></p>
 
 <!--- picture (4points) -->
<p><img src="images/project-image.png"
alt="My Project" style="max-width:10%; border:1px solid #ccc; opacity: 0.75;"></p>
 
<?php include('templates/footer.html');
// include the footer.
?>
