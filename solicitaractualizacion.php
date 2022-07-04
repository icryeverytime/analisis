<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "myDB";

$id=$_SESSION["id"];
$nuevopaquete=$_POST["boton1"];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexion fallo: " . $conn->connect_error);
}

if(!empty($_SESSION["id"])){
    $sql="INSERT INTO Actualizarservicio(nuevopaquete,cuentaid)
    VALUES('$nuevopaquete','$id');
    ";
    if ($conn->query($sql) === TRUE) {
        echo "insertado correctamente";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }else{
    echo "False";
  }
  $conn->close();
  header ('Location: index.php');
exit;
?>