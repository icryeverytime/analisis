
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$band=1;
if(!empty($_SESSION["empleado"])){
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Conexion fallo: " . $conn->connect_error);
  }
  $string2.="<h1>Actualizar Servicio</h1><table>
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
      $string2.="
      <tr>
          <td>".$row["cuentaid"]."</td>
          <td>".$row["nuevopaquete"]."</td>
          <td>
              <form method=\"post\" action=\"actualizarservicio.php\">
                  <input type=\"hidden\" id=\"boton1\" name=\"boton1\" value=\"".$row["cuentaid"]."\">
                  <input type=\"hidden\" id=\"boton2\" name=\"boton2\" value=\"".$row["nuevopaquete"]."\">
                  <input type=\"submit\" value=\"Actualizar\">
              </form>
          </td>
      </tr>
      ";
    }
  } else {
    $band=0;
  }
  $string2.="</table>";
  if($band==0)
  {
      echo "<h1>No existen peticiones a actualizar servicio</h1>";
  }
  else{
      echo $string2;
  }
  $conn->close();
}else{
  echo "no eres el empleado";
}

?>