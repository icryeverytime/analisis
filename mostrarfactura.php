<html>
<head>
<style type="text/css" media="print">
        button{
          display:none;
        }
    </style>
</head>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
if (isset($_POST["name"]))
{
    $id=$_POST["name"];
}
else{
  $id=$_SESSION["id"];
}


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexion fallo: " . $conn->connect_error);
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
$sql = "SELECT foliofactura,num_paqFAC,regimenfiscal,periodo,codigobarras,serieCSDDemisor,serieCSDDsat,leyendafinal,fechayhorafactura,cadenaSAT FROM Factura WHERE id_cuentaFAC='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $foliofact=$row["foliofactura"];
        $regimenfiscal=$row["regimenfiscal"];
        $periodo=$row["periodo"];
        $codigobarras=$row["codigobarras"];
        $serieCSSDDemisor=$row["serieCSSDDemisor"];
        $serieCSDDSat=$row["serieCSDDsat"];
        $leyendafinal=$row["leyendafinal"];
        $facturafecha=$row["fechayhorafactura"];
        $cadenasat=$row["cadenaSAT"];
        $numpaq=$row["num_paqFAC"]; 
  }
} else {
  echo "0 results factura";
}
$sql = "SELECT fechacontratacion,fechasigpago,valorunitario,importetotalnumer,importetotalletra,formadepago,montodeimpuestos,referenciabancaria FROM Servicio WHERE id_cuenta='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $fechacontratacion=$row["fechacontratacion"];
        $fechasigpago=$row["fechasigpago"];
        $valorunitario=$row["valorunitario"];
        $importetotalnumer=$row["importetotalnumer"];
        $importetotalletra=$row["importetotalletra"];
        $formadepago=$row["formadepago"];
        $montodeimpuestos=$row["montodeimpuestos"];
        $referencia=$row["referenciabancaria"];
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
echo "Folio de la factura: ".$foliofact."<br>";
echo "Fecha de expedicion: ".$facturafecha."<br>";
echo "Numero de paquete: ".$numpaq."<br>";
echo "Periodo del uso de servicio: ".$periodo."<br>";
echo "Feca del siguiente pago: ".$fechasigpago."<br>";
echo "Valor unitario consignado en numero: ".$valorunitario."<br>";
echo "Importe total en numero: ".$importetotalnumer."<br>";
echo "Importe total en letra: ".$importetotalletra."<br>";
echo "Forma de pago: ".$formadepago."<br>";
echo "Monto de los impuestos: ".$montodeimpuestos."<br>";
echo "Codigo de barras: ".$codigobarras."<br>";
echo "Numero de Serie del CSDD del emisor: ".$serieCSSDDemisor."<br>";
echo "Numero de Serie del CSDD del SAT: ".$serieCSDDSat."<br>";
echo "Leyenda Comprobante fiscal: ".$leyendafinal."<br>";
echo "Referencia Bancaria: ".$referencia."<br>";
echo "Fecha de emision de certificaion de la factura electronica: ".$facturafecha."<br>";
echo "Cadena Original del complemento de Certificacion Digital del SAT: ".$cadenasat."<br>";  
echo "<button onclick=\"window.print()\">Imprimir factura</button>";
$conn->close();
?>
</html>