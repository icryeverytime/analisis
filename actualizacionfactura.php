
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
  $string.="<h1>Actualizaciones factura</h1><table>
      <tr>
          <th>Id Cuenta </th>
          <th>Regimenfiscal </th>
          <th>Numero de serie CSSD del emisor</th>
          <th>Numero de serie CSSD del SAT</th>
          <th>Leyenda</th>
          <th>Cadena SAT</th>
          <th>Actualizar factura</th>
      </tr>
  ";
  $sql="SELECT * FROM Actualizarfactura";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $string.="
      <tr>
          <td>".$row["cuentaid"]."</td>
          <td>".$row["regimenfiscal"]."</td>
          <td>".$row["numeroserieCSSD"]."</td>
          <td>".$row["numerodeserieSAT"]."</td>
          <td>".$row["leyenda"]."</td>
          <td>".$row["cadenaSAT"]."</td>
          <td>
              <form method=\"post\" action=\"actualizarfactura.php\">
                  <input type=\"hidden\" id=\"boton1\" name=\"boton1\" value=\"".$row["cuentaid"]."\">
                  <input type=\"hidden\" id=\"boton2\" name=\"boton2\" value=\"".$row["regimenfiscal"]."\">
                  <input type=\"hidden\" id=\"boton3\" name=\"boton3\" value=\"".$row["numeroserieCSSD"]."\">
                  <input type=\"hidden\" id=\"boton4\" name=\"boton4\" value=\"".$row["numerodeserieSAT"]."\">
                  <input type=\"hidden\" id=\"boton5\" name=\"boton5\" value=\"".$row["leyenda"]."\">
                  <input type=\"hidden\" id=\"boton6\" name=\"boton6\" value=\"".$row["cadenaSAT"]."\">
                  <input type=\"submit\" value=\"Actualizar\">
              </form>
          </td>
      </tr>
      ";
    } 
    $string.="</table>";
    echo $string;
  } else {
    echo "<h1>No existen peticiones a actualizar factura</h1>";
  }
  $conn->close();
}else{
  echo "no eres el empleado";
}

?>