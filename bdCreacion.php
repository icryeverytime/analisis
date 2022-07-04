<?php
$servername = "localhost";
$username = "root";
$password = "123456789";


$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
  echo "Base de datos creado exitosamente";
} else {
  echo "Error creando base de datos: " . $conn->error;
}

$conn->close();
?> 