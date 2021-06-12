<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$correo="christianantonio12322@gmail.com";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexion fallo: " . $conn->connect_error);
}
$string.="<table>
      <tr>
          <th>Id Cuenta </th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Telefono</th>
          <th>RFC</th>
          <th>Seguro Social<br>
          <th>Fecha de nacimiento</th>
          <th>Calle</th>
          <th>Numero Exterior</th>
          <th>Colonia</th>
          <th>Municipio</th> 
          <th>Estado</th>
          <th>Codigo Postal</th>
      </tr>
  ";
$sql="SELECT * FROM Cliente WHERE correo='$correo'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $idcliente=$row["idcliente"];
        $rfc=$row["rfc"];
        $nombre=$row["nombre"];
        $correo=$row["correo"];
        $telefono=$row["telefono"];
        $segurosocial=$row["segurosocial"];
        $fechadenacimiento=$row["fechadenacimiento"];
  }
} else {
  echo "No existe el cliente";
}
$sql="SELECT * FROM Direccion WHERE id_cliente='$idcliente'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $calle=$row["calle"];
        $nuexterior=$row["nuexterior"];
        $colonia=$row["colonia"];
        $municipio=$row["municipio"];
        $estado=$row["estado"];
        $codigopostal=$row["cp"];
  }
} else {
  echo "No existe el cliente";
}
$string.="
    <tr>
        <td>".$idcliente."</td>
        <td>".$nombre."</td>
        <td>".$correo."</td>
        <td>".$telefono."</td>
        <td>".$rfc."</td>
        <td>".$segurosocial."</td>
        <td>".$fechadenacimiento."</td>
        <td>".$calle."</td>
        <td>".$nuexterior."</td>
        <td>".$colonia."</td>
        <td>".$municipio."</td>
        <td>".$estado."</td>
        <td>".$codigopostal."</td>
    </tr>
    </table>
";
echo $string;
$conn->close();
?>