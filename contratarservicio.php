<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "myDB";

$numeropaq=$_POST["boton1"];
$id=$_SESSION["id"];
$formadepago="Tarjeta";
echo $id;
$currentdate=date('Y-m-d');
$d=strtotime("+1 Months");
$sigpago=date("Y-m-d", $d);

$referencia="4209998812";
if(!empty($_SESSION["id"])){
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Conexion fallo: " . $conn->connect_error);
  }


  $sql = "SELECT costo FROM paquete WHERE (numpaq='$numeropaq')";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
          $costo=$row["costo"]; 
    }
  } else {
    echo "0 results";
  }
  $impuesto=$costo*.16;
  $total=$impuesto+$costo;
  $locale = 'es_MX';
  $fmt = numfmt_create($locale, NumberFormatter::SPELLOUT);
  $in_words = numfmt_format($fmt, $total);
  $sql="INSERT INTO Servicio(num_paq,id_cuenta,fechacontratacion,fechasigpago,valorunitario,formadepago,montodeimpuestos,referenciabancaria,importetotalnumer,importetotalletra)
  VALUES ('$numeropaq','$id','$currentdate','$sigpago','$costo','$formadepago','$impuesto','$referencia','$total','$in_words');";
  if ($conn->query($sql) === TRUE) {
      echo "insertado correctamente";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else{
  header ('Location: index.php');
  exit;
}
$conn->close();
header ('Location: index.php ');
  exit;
?>