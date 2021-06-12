<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$id=$_POST["boton1"];
$rfc=$_POST["boton8"];
$telefono=$_POST["boton9"];
$segurosocial=$_POST["boton10"];
$fechadenacimiento=$_POST["boton11"];
$calle=$_POST["boton2"];
$nuexterior=$_POST["boton3"];
$colonia=$_POST["boton4"];
$municipio=$_POST["boton5"];
$codigopostal=$_POST["boton7"];
$estado=$_POST["boton6"];

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
    VALUES ('$calle','$nuexterior','$colonia','$municipio','$estado','$codigopostal','$id');";
    if ($conn->query($sql) === TRUE) {
        echo "insertado correctamente";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
$sql="DELETE FROM Actualizardatos WHERE cuentaid='$id'";
if ($conn->query($sql) === TRUE) {
  echo "Borrado corectamente";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();     
?>