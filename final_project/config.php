<?php
// config.php - database connection
// requirement: include() directive (3points)

// connect to MYSQL - chapter 12, p5 xammp default
$dbc = mysqli_connect('localhost', 'root','','myblog');

// check connection - ch12, p 9
if (!$dbc) {
die('could not connect: ' . mysqli_connect_error());
}
// set character set -p25
mysqli_set_charset($dbc, 'utf8');
?>