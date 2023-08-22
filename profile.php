<?php

$filename = basename(__FILE__);

if (isset($_SERVER['PATH_INFO'])) {
  $path = $_SERVER['PATH_INFO'];
  $path_parts = explode('/', $path);
  $username = $path_parts[1];
  echo "Welcome, $username! This is the $filename file.";
} else {
  echo "Please provide a username in the URL path. This is the $filename file.";
}
echo "<a href=\"./profile.php/johndoe\">link text</a>";
?>
