<?php
$rfc=$_POST["RFC"];
$telefono=$_POST["telephone"];
$segurosocial=$_POST["SSN"];
$fechadenacimiento=$_POST["Birthday"];

$calle=$_POST["Street"];
$nuexterior=$_POST["Number"];
$colonia=$_POST["Suburb"];
$municipio=$_POST["Town"];
$estado=$_POST["State"];
$codigopostal=92801;
session_start();
if(!empty($_SESSION["id"])){
    $servername = "localhost";
    $username = "root";
    $password = "123456789";
    $dbname = "myDB";
    $id=$_SESSION["id"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Conexion fallo: " . $conn->connect_error);
    }
    $sql="INSERT INTO Actualizardatos (cuentaid ,calle ,nuexterior ,colonia ,municipio ,estado ,cp ,rfc ,telefono ,segurosocial ,fechadenacimiento)
    VALUES ('$id','$calle','$nuexterior','$colonia','$municipio','$estado','$codigopostal','$rfc','$telefono','$segurosocial','$fechadenacimiento');";
    if ($conn->query($sql) === TRUE) {
        echo "insertado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
header ('Location: index.php');
exit;
?>