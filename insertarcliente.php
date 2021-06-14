<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";


//insert
$nombre=$_POST["name"]." ".$_POST["lastname"];
$correo=$_POST["email"];
$contra=$_POST["pass"];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexion fallo: " . $conn->connect_error);
}

$sql = "INSERT INTO Cliente (nombre, correo, contra)
VALUES ('$nombre', '$correo','$contra');";

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
$conn->close();
header ('Location: 6LogIn.php');
exit;
?>