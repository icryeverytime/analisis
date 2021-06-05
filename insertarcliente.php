<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

//insert
$rfc="VIJA990409123";
$nombre="Christian Viramontes";
$correo="christianantonio12322@gmail.com";
$telefono="4492874398";
$segurosocial="IMSS-02-008";
$fechadenacimiento="1999-04-09";
$contra="123";

$calle="Felipe Angeles";
$nuexterior=101;
$colonia="Guadalupe";
$municipio="Aguascalientes";
$codigopostal=92801;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexion fallo: " . $conn->connect_error);
}

$sql = "INSERT INTO Cliente (rfc, nombre, correo, telefono,segurosocial,fechadenacimiento,contra)
VALUES ('$rfc', '$nombre', '$correo','$telefono','$segurosocial','$fechadenacimiento','$contra');";

if ($conn->query($sql) === TRUE) {
  echo "insertado correctamente";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
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
$sql ="INSERT INTO Direccion (calle, nuexterior, colonia, municipio, estado, cp, id_cliente)
    VALUES ('$calle',$nuexterior,'$colonia','$municipio','$municipio','$codigopostal','$id');";
    if ($conn->query($sql) === TRUE) {
        echo "insertado correctamente";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
$conn->close();
?>