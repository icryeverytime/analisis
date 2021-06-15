<?php
$regimen=$_POST["regimen"];
$csdd=$_POST["cssd"];
$sat=$_POST["cssdsat"];
$leyenda=$_POST["leyenda"];
$cadenaSAT=$_POST["sat"];

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
    $sql="INSERT INTO Actualizarfactura (cuentaid ,regimenfiscal,numerodeserieCSSD ,numerodeserieSAT ,leyenda ,cadenaSAT)
    VALUES ('$id','$regimen','$csdd','$sat','$leyenda','$cadenaSAT');";
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