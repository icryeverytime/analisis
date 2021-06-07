<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$id=$_SESSION["id"];

$rfc="VIJA990409123";
$telefono="4492874398";
$segurosocial="IMSS-02-008";
$fechadenacimiento="1999-04-09";

$calle="Felipe Angeles";
$nuexterior=101;
$colonia="Guadalupe";
$municipio="Aguascalientes";
$codigopostal=92801;

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
$sql="UPDATE Cliente SET rfc='$rfc',telefono='$telefono',segurosocial='$segurosocial',fechadenacimiento='$fechadenacimiento' WHERE idcliente='$id'";
if ($conn->query($sql) === TRUE) {
    echo "insertado correctamente";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
$sql ="INSERT INTO Direccion (calle, nuexterior, colonia, municipio, estado, cp, id_cliente)
    VALUES ('$calle',$nuexterior,'$colonia','$municipio','$municipio','$codigopostal','$id');";
    if ($conn->query($sql) === TRUE) {
        echo "insertado correctamente";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
?>