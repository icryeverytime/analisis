<?php
session_start();
$i=0;
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "myDB";
if(!empty($_SESSION["empleado"])){
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Conexion fallo: " . $conn->connect_error);
  }
  $conn2 = new mysqli($servername, $username, $password, $dbname);
  if ($conn2->connect_error) {
    die("Conexion fallo: " . $conn2->connect_error);
  }
  $string.="<table>
      <tr>
          <th>Id Cuenta </th>
          <th>RFC</th> 
          <th>Telefono</th>
          <th>Seguro social</th>
          <th>Fecha de nacimiento</th>
          <th>Calle</th>
          <th>Numero exterior</th>
          <th>Colonia</th>
          <th>Municipio</th>
          <th>Estado</th>
          <th>Codigo Postal</th>
          <th>Actualizar datos</th>
      </tr>
  ";
  $sql="SELECT * FROM Actualizardatos";
  $result=$conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) 
    {
      $idabuscar=$row["cuentaid"];
      $string.="
      <h1>Datos a actualizar</h1>
      <tr>
        <td>".$row["cuentaid"]."</td>
        <td>".$row["rfc"]."</td>
        <td>".$row["telefono"]."</td>
        <td>".$row["segurosocial"]."</td>
        <td>".$row["fechadenacimiento"]."</td>
        <td>".$row["calle"]."</td>
        <td>".$row["nuexterior"]."</td>
        <td>".$row["colonia"]."</td>
        <td>".$row["municipio"]."</td>
        <td>".$row["estado"]."</td>
        <td>".$row["cp"]."</td>
        <td>
        <form method=\"post\" action=\"actualizardatos.php\">
        <input type=\"hidden\" id=\"boton1\" name=\"boton1\" value=\"".$row["cuentaid"]."\">
        <input type=\"hidden\" id=\"boton2\" name=\"boton2\" value=\"".$row["calle"]."\">
        <input type=\"hidden\" id=\"boton3\" name=\"boton3\" value=\"".$row["nuexterior"]."\">
        <input type=\"hidden\" id=\"boton4\" name=\"boton4\" value=\"".$row["colonia"]."\">
        <input type=\"hidden\" id=\"boton5\" name=\"boton5\" value=\"".$row["municipio"]."\">
        <input type=\"hidden\" id=\"boton6\" name=\"boton6\" value=\"".$row["estado"]."\">
        <input type=\"hidden\" id=\"boton7\" name=\"boton7\" value=\"".$row["cp"]."\">
        <input type=\"hidden\" id=\"boton8\" name=\"boton8\" value=\"".$row["rfc"]."\">
        <input type=\"hidden\" id=\"boton9\" name=\"boton9\" value=\"".$row["telefono"]."\">
        <input type=\"hidden\" id=\"boton10\" name=\"boton10\" value=\"".$row["segurosocial"]."\">
        <input type=\"hidden\" id=\"boton11\" name=\"boton11\" value=\"".$row["fechadenacimiento"]."\">
        <input type=\"submit\" value=\"Actualizar\">
        </form>
        </td>
      </tr>
      </table>
      ";      
  }
  } else {
    $i=1;
  }
  if($i==0)
  {
    echo $string;
  }
  else{
    echo "<h1>Actualmente no existen datos a actualizar</h1>";
  }
  $conn->close();
}
?>