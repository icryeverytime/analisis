<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$numeropaq=1;
$contra="123";
$correo="christianantonio12322@gmail.com";
$currentdate=date('Y-m-d');
$d=strtotime("+1 Months");
$sigpago=date("Y-m-d", $d);
$formadepago="efectivo";
$referencia="referencia";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexion fallo: " . $conn->connect_error);
}
$sql = "SELECT idcliente FROM Cliente WHERE (contra='$contra' AND correo='$correo')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $id=$row["idcliente"]; 
        echo $id;
        echo "<br>"; 
  }
} else {
  echo "0 results";
}

$sql = "SELECT costo FROM Paquete WHERE (numpaq='$numeropaq')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $costo=$row["costo"];  
        echo $costo;
  }
} else {
  echo "0 results";
}
$impuesto=$costo*.16;
$sql="INSERT INTO Servicio(num_paq,id_cuenta,fechacontratacion,fechasigpago,valorunitario,formadepago,montodeimpuestos,referenciabancaria)
VALUES ('$numeropaq','$id','$currentdate','$sigpago','$costo','$formadepago','$impuesto','$referencia');";
if ($conn->query($sql) === TRUE) {
    echo "insertado correctamente";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
$conn->close();
?>