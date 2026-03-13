<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Upload a file</title>
</head> <!-- FIXED: closing head tag -->
<body>
<?php //script 11.4 - upload_file.php 
/*this script displays and handles an html form. this script takes a file upload and stores it on the server.*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // handle the form.

    // try to move the uploaded file:
    if (move_uploaded_file($_FILES['the_file']['tmp_name'], "../uploads/{$_FILES['the_file']['name']}")) {
        // FIXED: removed space in array key
        
        print '<p>Your file has been uploaded.</p>';
        
    } else {
        
        print '<p style="color: red;">Your file could not be uploaded because: '; // FIXED: color
        
        // print a message based upon the error:
        switch ($_FILES['the_file']['error']) {
            case 1:
                print 'the file exceeds the upload_max_filesize setting in php.ini'; // FIXED: spelling
                break;
            case 2:
                print 'the file exceeds the MAX_FILE_SIZE setting in html form';
                break;
            case 3:
                print 'the file was only partially uploaded';
                break;
            case 4:
                print 'no file was uploaded';
                break;
            case 6:
                print 'the temporary folder does not exist.';
                break;
            default:
                print 'Something unforeseen happened.'; // FIXED: spelling
                break;
        }

        print '.</p>'; // complete the paragraph

    } // end of move_uploaded_file() IF.

} // end of the submission IF.

// leave php and display the form:
?>

<form action="upload_file.php" enctype="multipart/form-data" method="post">
    <p>Upload a file using this form:</p>
    <input type="hidden" name="MAX_FILE_SIZE" value="300000">
    <p><input type="file" name="the_file"></p>
    <p><input type="submit" name="submit" value="Upload this file"></p>
</form>

</body>
</html>