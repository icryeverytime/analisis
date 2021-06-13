<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$id=$_POST["boton1"];
$newpackage=$_POST["boton2"];
echo $id;
echo $newpackage;


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
  $sql ="DELETE FROM Actualizarservicio WHERE cuentaid=$id";
  if ($conn->query($sql) === TRUE) {
    echo "Actualizado correctamente";
  } else {
    echo "Error actualizando datos: " . $conn->error;
  }

  $conn->close();
  header('Location:actualizacionservicio.php');
  exit;
?>