<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Register</title>
<style type="text/css" media="screen">
.error {color:red; }
</style>
</head> <!-- FIXED: closing head tag -->
<body>
<h1>Register</h1>
<?php //script 11.6 - register.php 
/* this script registers a user by storing their informaiton in a text file and creating a directory for them*/

// identify the directory and file to use:
$dir = '../users/';
$file = $dir . 'users.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //handle the form.

$problem =FALSE; //no problems so far

// check for each value...
	if (empty($_POST['username'])) {
		$problem = TRUE;
		print '<p class="error">Please enter a username!</p>';
	}	

	if (empty($_POST['password1'])) {
		$problem = TRUE;
		print '<p class="error">Please enter a password!</p>';
	}

	if ($_POST['password1'] != $_POST['password2']) {
		$problem = TRUE;
		print '<p class="error">Your password did not match your confirmed password!</p>';
	} 
	
	if (!$problem){ //if there wern't a problem...

if (is_writable($file)) { //open the file.

// create the data to be written:
$subdir = time() . rand(0, 4596);
$data = $_POST['username'] . "\t" . sha1(trim($_POST['password1'])) . "\t". $subdir . PHP_EOL;

// write data:
file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

// create the directory:
mkdir ($dir. $subdir);

// print a message:
print '<p>You are now registered!</p>';
		
		} else {
			print '<p class="error">You could not be registered due to a system error.</p>';
		}
		
	} else { // Forgot a field.
		print '<p class="error">Please go back and try again!</p>';	
	}

} else { 

// leave PHP and display the form:
?>

<form action="register.php" method="post">
	<p>Username: <input type="text" name="username" size="20"></p>
	<p>Password: <input type="password" name="password1" size="20"></p>
	<p>Confirm Password: <input type="password" name="password2" size="20"></p>
	<input type="submit" name="submit" value="Register">
</form>

<?php } // End of submission IF. ?>
</body>
</html>