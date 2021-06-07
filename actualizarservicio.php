<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$newpackage=2;
$contra="123";
$correo="christianantonio12322@gmail.com";

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
$sql="UPDATE Servicio SET num_paq=$newpackage WHERE  id_cuenta=$id";
if ($conn->query($sql) === TRUE) {
    echo "Actualizado correctamente";
  } else {
    echo "Error actualizando datos: " . $conn->error;
  }
  
  $conn->close();
?>