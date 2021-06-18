<?php
include 'app/connectiv.php';
echo "Запуск........</BR>";
// Create connection
$conn = @new mysqli($_server_name, $_myUser, $_myPass, 'FBUZ');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully</br>";
$table = "Raion";
$sh = $conn->query("SHOW TABLES LIKE '{$table}'");
if ($sh->num_rows == 1) {
  echo "Table '$table' exists</br>";
} else {
  echo "Table '$table' does not exist</br>";
  $sql = "CREATE TABLE `FBUZ`.`$table` ( `id` INT NOT NULL , `id_name` VARCHAR(150) NOT NULL ,`name` VARCHAR(150) NOT NULL ,`cap` VARCHAR(150) NOT NULL , `type` VARCHAR(50) NOT NULL , `strokeStyle` VARCHAR(50) NOT NULL , `fillStyle` VARCHAR(50) NOT NULL , `path` TEXT NOT NULL ) ENGINE = InnoDB;";
  $sh1 = $conn->query($sql);
  echo $sh1 === 1;

  $raionData_json = json_decode(file_get_contents('json/Raion.json'));
  foreach ($raionData_json->raion as $row) {
    $sqlI = "INSERT $table (`id`, `id_name`,`name`,`cap`, `type`,`strokeStyle`,`fillStyle`,`path`) VALUES (' $row->id', '$row->id_name','$row->name', '$row->cap','$row->type', '$row->strokeStyle', '$row->fillStyle', '$row->path')";
    if ($conn->query($sqlI) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sqlI . "<br>" . $conn->error;
    }
  }
}
$table = "Raion";
$sh = $conn->query("SHOW TABLES LIKE '{$table}'");
if ($sh->num_rows == 1) {
  echo "Table '$table' exists</br>";
} else {
  echo "Table '$table' does not exist</br>";
  $sql = "CREATE TABLE `FBUZ`.`$table` ( `id` INT NOT NULL , `id_name` VARCHAR(150) NOT NULL ,`name` VARCHAR(150) NOT NULL ,`cap` VARCHAR(150) NOT NULL , `type` VARCHAR(50) NOT NULL , `strokeStyle` VARCHAR(50) NOT NULL , `fillStyle` VARCHAR(50) NOT NULL , `path` TEXT NOT NULL ) ENGINE = InnoDB;";
  $sh1 = $conn->query($sql);
  echo $sh1 === 1;
}
$sh->free();
$conn->close();
