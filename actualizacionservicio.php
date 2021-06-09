<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexion fallo: " . $conn->connect_error);
}
$string.="<table>
    <tr>
        <th>Id Cuenta </th>
        <th>Nuevo paquete </th>
        <th>Aprobar actualizacion</th> 
    </tr>
";
$sql="SELECT * FROM Actualizarservicio";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $string.="
    <tr>
        <th>".$row["cuentaid"]."</th>
        <th>".$row["nuevopaquete"]."</th>
        <th>
            <form method=\"post\" action=\"actualizarservicio.php\">
                <input type=\"hidden\" id=\"boton1\" name=\"boton1\" value=\"".$row["cuentaid"]."\">
                <input type=\"hidden\" id=\"boton2\" name=\"boton2\" value=\"".$row["nuevopaquete"]."\">
                <input type=\"submit\" value=\"Actualizar\">
            </form>
        </th>
    </tr>
    ";
  }
} else {
  $band=0;
}
$string.="</table>";
if($band==0)
{
    echo "<h1>No existen peticiones a actualizar servicio</h1>";
}
else{
    echo $string;
}
$conn->close();
?>