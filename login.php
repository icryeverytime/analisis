
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$correo="christianantonio123222@gmail.com";
$contra="123";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexion fallo: " . $conn->connect_error);
}
else{
}
$sql = "SELECT idcliente FROM Cliente WHERE (contra='$contra' AND correo='$correo')";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $id=$row["idcliente"];
        $i=1;  
  }
} else {
  echo "0 results";
}
if($i==1){
    $_SESSION["id"]=$id;
    echo $_SESSION["id"];
}
else{
    $sql = "SELECT idempleado FROM Empleado WHERE (contra='$contra' AND correo='$correo')";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            $id= $row["idempleado"]; 
         $_SESSION["empleado"]=$id;
        }
    } 
    else 
    {
        echo "0 results";
    }
}

?>
</html>