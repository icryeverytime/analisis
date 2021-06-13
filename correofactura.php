
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
session_start();
$id=$_SESSION["id"];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexion fallo: " . $conn->connect_error);
}
$sql = "SELECT contra,correo FROM Cliente WHERE (idcliente='$id')";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $correo=$row["correo"];
        $contra=$row["contra"];  
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

$string.="Numero de cuenta del cliente: ".$id;
$string.="<br>";
$string.="Direccion: ".$nuexterior." ".$calle.", ".$colonia.", ".$municipio.". ".$estado.", ".$cp;
$string.="<br>";
$string.="Regimen fiscal: ".$regimenfiscal;
$string.="<br>";
$string.="Direccion : Av. Lázaro Cárdenas No. 2500. Col Residencial San Agustín 66260, Monterrey, N.L. México <br>";
$string.="Folio de la factura: ".$foliofact."<br>";
$string.="Fecha de expedicion: ".$facturafecha."<br>";
$string.="Numero de paquete: ".$numpaq."<br>";
$string.="Periodo del uso de servicio: ".$periodo."<br>";
$string.="Feca del siguiente pago: ".$fechasigpago."<br>";
$string.="Valor unitario consignado en numero: ".$valorunitario."<br>";
$string.="Importe total en numero: ".$importetotalnumer."<br>";
$string.="Importe total en letra: ".$importetotalletra."<br>";
$string.="Forma de pago: ".$formadepago."<br>";
$string.="Monto de los impuestos: ".$montodeimpuestos."<br>";
$string.="Codigo de barras: ".$codigobarras."<br>";
$string.="Numero de Serie del CSDD del emisor: ".$serieCSSDDemisor."<br>";
$string.="Numero de Serie del CSDD del SAT: ".$serieCSDDSat."<br>";
$string.="Leyenda Comprobante fiscal: ".$leyendafinal."<br>";
$string.="Referencia Bancaria: ".$referencia."<br>";
$string.="Fecha de emision de certificaion de la factura electronica: ".$facturafecha."<br>";
$string.="Cadena Original del complemento de Certificacion Digital del SAT: ".$cadenasat."<br>";  
echo $string;

?> 
<!DOCTYPE html>
<html>
  
<head>
  <title>Send Mail</title>
  <script src=
    "https://smtpjs.com/v3/smtp.js">
  </script>
  
  <script type="text/javascript">
    function sendEmail() {
      Email.send({
        Host: "smtp.gmail.com",
        Username: "internetcompany68@gmail.com",
        Password: "@1234abc",
        To: '<?php echo $correo ?>',
        From: "internetcompany68@gmail.com",
        Subject: "Invoice",
        Body: "<?php echo $string ?>",
      })
    }
  </script>
</head>
  
<body>
  <form method="post">
    <input type="button" value="Send Email" 
        onclick="sendEmail()" />
  </form>
</body>
  
</html> 
<?php 
echo '<script>sendEmail();</script>';
header('Location: index.php');
exit;
?>