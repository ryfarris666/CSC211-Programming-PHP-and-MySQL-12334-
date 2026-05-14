<?php
//files.php - display files in directory
// display files in directory 5 points

define('TITLE', 'View files');
include('templates/header.html');

// create uploads folder if not exists
if (!file_exists('uploads')) {
mkdir('uploads', 0777);
}
// scandir demo ch11 p30
$files = scandir('uploads');

echo '<h2>Files in uploads directory</h2>';

$file_count = 0;
echo '<ul>';

foreach ($files as $file) {
if($file != '.' && $file != '..') {
echo '<li>' . $file . '</li>';
$file_count++;
}
}

echo '</ul>';
echo "<p>Total files: $file_count</p>";

echo '<p><a href="display.php">Back to records</a></p>';

include('templates/footer.html');
?> 