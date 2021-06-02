<?php
include 'connectiv.php';
echo "Запуск........</BR>";
// Create connection
$conn = @new mysqli($_server_name, $_myUser, $_myPass,'FBUZ');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>