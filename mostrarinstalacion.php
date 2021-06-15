<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$band=1;
$c=1;

if(!empty($_SESSION["empleado"])){
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Conexion fallo: " . $conn->connect_error);
  }
  $string1.="<h1>Instalaciones solicitadas</h1><br><table>
      <tr>
          <th>Id Cuenta </th>
          <th>Fecha de instalacion </th>
          <th>Hora de instalacion</th> 
      </tr>
  ";
  $sql="SELECT * FROM Instalacion";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $string1.="
      <tr>
          <td>".$row["cuentaid"]."</td>
          <td>".$row["fecha"]."</td>
          <td>".$row["horadeinicio"]."</td>
      </tr>
      ";
    }
    $string1.="</table>";
    echo $string1;
  } else {
    echo "<h1>No existen peticiones a actualizar servicio</h1><br><br><br><br>";
  }
  $conn->close();
}else{
  echo "no eres el empleado";
}

?>