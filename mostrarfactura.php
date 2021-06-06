<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$correo="christianantonio12322@gmail.com";
$contra="123";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexion fallo: " . $conn->connect_error);
}
$sql = "SELECT idcliente FROM Cliente WHERE (contra='$contra' AND correo='$correo')";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $id=$row["idcliente"];  
  }
} else {
  echo "0 results";
}
$sql = "SELECT calle,nuexterior,colonia,municipio,estado,cp FROM Direccion WHERE id_cliente='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $calle=$row["calle"];
        $nuexterior=$row["nuexterior"];
        $colonia=$row["colonia"];
        $municipio=$row["municipio"];
        $estado=$row["estado"];
        $cp=$row["cp"];
  }
} else {
  echo "0 results";
}
echo $id. "<br>";
$sql = "SELECT foliofact,regimenfiscal,periodo,codigobarras,serieCSDDemisor,serieCSDDsat,leyendafinal,fechayhorafactura,cadenaSAT FROM Factura WHERE foliofact='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $foliofact=$row["foliofact"];
        $regimenfiscal=$row["regimenfiscal"];
        $periodo=$row["periodo"];
        $codigobarras=$row["codigobarras"];
        $serieCSSDDemisor=$row["serieCSSDDemisor"];
        $serieCSDDSat=$row["serieCSDDsat"];
        $leyendafinal=$row["leyendafinal"];
        $facturafecha=$row["fechayhorafactura"];
        $cadenasat=$row["cadenaSAT"]; 
  }
} else {
  echo "0 results factura";
}
echo "Numero de cuenta del cliente: ".$id;
echo "<br>";
echo "Direccion: ".$nuexterior." ".$calle.", ".$colonia.", ".$municipio.". ".$estado.", ".$cp;
echo "<br>";
echo "Regimen fiscal: ".$regimenfiscal;
echo "<br>";
echo "Direccion : Av. Lázaro Cárdenas No. 2500. Col Residencial San Agustín 66260, Monterrey, N.L. México <br>";
echo "Folio de la factura: ".$foliofact."<br";

?>