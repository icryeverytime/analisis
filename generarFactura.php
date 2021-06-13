<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
session_start();
$id=$_SESSION["id"];

$currentdate=date('Y-m-d');
$regimenfiscal="regimen";
$codigobarras="codigobarras";
$serieemisor="342234";
$seriesat="698712";
$leyendafinal="hola";
$cadenasat="44";


$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT num_paq FROM Servicio WHERE (id_cuenta='$id')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $num_paq=$row["num_paq"]; 
  }
} else {
  echo "0 results";
}

$sql = "SELECT fechacontratacion FROM Servicio WHERE (id_cuenta='$id')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $primerafecha=$row["fechacontratacion"]; 
  }
} else {
  echo "0 results";
}

$periodo=$primerafecha." a ".$currentdate;

$sql="INSERT INTO Factura(num_paqFAC,id_cuentaFAC,regimenfiscal,periodo,codigobarras,serieCSDDemisor,serieCSDDsat,leyendafinal,fechayhorafactura,cadenaSAT)
VALUES ('$num_paq','$id','$regimenfiscal','$periodo','$codigobarras','$serieemisor','$seriesat','$leyendafinal','$currentdate','$cadenasat');";
if ($conn->query($sql) === TRUE) {
    echo "insertado correctamente";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
$conn->close();
header('Location: correofactura.php');
exit;
?>