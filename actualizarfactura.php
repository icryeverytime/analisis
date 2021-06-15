<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$id=$_POST["boton1"];
$regimenfiscal=$_POST["boton2"];
$csd=$_POST["boton3"];
$sat=$_POST["boton4"];
$leyenda=$_POST["boton5"];
$cadsat=$_POST["boton6"];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexion fallo: " . $conn->connect_error);
}

$sql="UPDATE Factura SET regimenfiscal='$regimenfiscal', serieCSDDemisor='$csd', serieCSDDsat='$sat', leyendafinal='$leyenda', cadenaSAT='$cadsat' WHERE id_cuentaFAC='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Actualizado correctamente";
  } else {
    echo "Error actualizando datos: " . $conn->error;
  }
  $sql ="DELETE FROM Actualizarfactura WHERE cuentaid=$id";
  if ($conn->query($sql) === TRUE) {
    echo "Actualizado correctamente";
  } else {
    echo "Error actualizando datos: " . $conn->error;
  }

  $conn->close();
  header ('Location: index.php');
  exit;
?>