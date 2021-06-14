<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$id=$_SESSION["id"];
$rfc=$_POST["RFC"];
$telefono=$_POST["telephone"];
$segurosocial=$_POST["SSN"];
$fechadenacimiento=$_POST["Birthday"];
$calle=$_POST["Street"];
$nuexterior=$_POST["Number"];
$colonia=$_POST["Suburb"];
$municipio=$_POST["Town"];
$codigopostal=$_POST["ZipCode"];
$estado=$_POST["State"];

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
$sql ="INSERT Direccion (calle, nuexterior, colonia, municipio, estado, cp, id_cliente)
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
header ('Location: 6LogIn.php');
exit; 
?>