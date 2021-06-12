<?php
$rfc="VIJA990409123";
$telefono="4492874398";
$segurosocial="IMSS-02-008";
$fechadenacimiento="1999-04-09";

$calle="Felipe Angeles";
$nuexterior=101;
$colonia="Guadalupe";
$municipio="Aguascalientes";
$estado="Aguascalientes";
$codigopostal=92801;
session_start();
if(!empty($_SESSION["id"])){
    $servername = "localhost";
    $username = "root";
    $password = "";
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
?>