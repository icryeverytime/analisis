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

require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
require '/usr/share/php/libphp-phpmailer/class.smtp.php';
$mail = new PHPMailer;
$mail->setFrom('chrisitianantonio12322@gmail.com');
$mail->addAddress('christianantonio123222@gmail.com');
$mail->Subject = 'Message sent by PHPMailer';
$mail->Body = 'Hello! use PHPMailer to send email using PHP';
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl';
$mail->Host = 'ssl://smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Port = 465;
$mail->Username = 'christianantonio12322@gmail.com';
$mail->Password = 'chrisanto123';
if(!$mail->send()) {
  echo 'Email is not sent.';
  echo 'Email error: ' . $mail->ErrorInfo;
} else {
  echo 'Email has been sent.';
}
?> 