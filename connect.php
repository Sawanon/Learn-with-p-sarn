<?php
$host = "localhost";
$root = "root";
$pass = "88888888";
$db = "testbook";
$conn = new mysqli($host,$root,$pass,$db);
if (!$conn) {
  echo "Nooo";
}
 ?>
