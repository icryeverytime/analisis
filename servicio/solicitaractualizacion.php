<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$id=$_SESSION["id"];
$nuevopaquete=2;

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

?>