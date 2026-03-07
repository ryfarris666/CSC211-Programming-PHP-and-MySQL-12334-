<?php // script 9.4 - reset.php

// delete the cookies:
setcookie('font_size','', time() -600, '/');
setcookie('font_size','', time() -600, '/');

?><!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>reset your settings</title>
</head>
<body>

<p>Your settings have been reset! Feel free to <a href="view_settings.php">customize</a> them again.</p>

</body>
</html>