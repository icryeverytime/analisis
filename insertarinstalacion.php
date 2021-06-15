<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

session_start();
//insert
$id=$_SESSION["id"];
$hora=(string)$_POST["appt"];
$fechafactura=(string)$_POST["date"];

echo $hora;
echo $contra;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexion fallo: " . $conn->connect_error);
}

$sql = "INSERT INTO Instalacion (cuentaid, horadeinicio, fecha)
VALUES ('$id', '$hora','$fechafactura');";

if ($conn->query($sql) === TRUE) {
  echo "insertado correctamente";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
header ('Location: index.php');
exit;
?>