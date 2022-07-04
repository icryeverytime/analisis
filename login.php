
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "myDB";

$correo=$_POST["email"];
$contra=$_POST["pass"];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexion fallo: " . $conn->connect_error);
}
else{
}
$sql = "SELECT idcliente,nombre FROM Cliente WHERE (contra='$contra' AND correo='$correo')";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $id=$row["idcliente"];
        $i=1;
        $nombre=$row["nombre"];  
  }
} else {
  echo "0 results";
}
if($i==1){
    $_SESSION["id"]=$id;
    $_SESSION["nombre"]=$nombre;
    echo $_SESSION["id"];
}
else{
    $sql = "SELECT idempleado,nombre FROM Empleado WHERE (contra='$contra' AND correo='$correo')";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            $id= $row["idempleado"]; 
         $_SESSION["empleado"]=$id;
         $nombre=$row["nombre"];
         $_SESSION["nombre"]=$nombre;
         echo $id;
        }
    } 
    else 
    {
        //echo "0 results";
    }
}

$conn->close();
header ('Location: 7FinishRegister.php');
exit;
?>
</html>