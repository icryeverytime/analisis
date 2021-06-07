<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$id=$_SESSION["id"];

$newpackage=2;
$contra="123";
$correo="christianantonio12322@gmail.com";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexion fallo: " . $conn->connect_error);
}

$sql="UPDATE Servicio SET num_paq=$newpackage WHERE  id_cuenta=$id";
if ($conn->query($sql) === TRUE) {
    echo "Actualizado correctamente";
  } else {
    echo "Error actualizando datos: " . $conn->error;
  }
  
  $conn->close();
?>