<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexion fallo: " . $conn->connect_error);
}

$sql = "CREATE TABLE Paquete (
    numpaq int(2),
    bits VARCHAR(30) NOT NULL,
    canales VARCHAR(30) NOT NULL,
    PRIMARY KEY (numpaq)
    );";
if ($conn->query($sql) === TRUE) {
  echo "Tablas creadas existosamente";
} else {
  echo "1.-Error creando tablas: " . $conn->error;
}
$sql="CREATE TABLE Cliente (
    rfc VARCHAR(30) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    paquete int(2),
    correo int(2) NOT NULL,
    telefono int(10) NOT NULL,
    PRIMARY KEY (rfc),
    CONSTRAINT FOREIGN KEY (paquete) REFERENCES Paquete(numpaq)
)";
if ($conn->query($sql) === TRUE) {
    echo "Tablas creadas existosamente";
  } else {
    echo "2.-Error creando tablas: " . $conn->error;
  }
$sql="CREATE TABLE Direccion(
    iddirecion int(10) NOT NULL AUTO_INCREMENT,
    calle varchar(30) NOT NULL,
    nuexterior int(6) NOT NULL,
    colonia varchar(30) NOT NULL,
    municipio varchar(30) NOT NULL,
    estado varchar(30) NOT NULL,
    cp int(10) NOT NULL,
    rfc_cliente VARCHAR(30),
    PRIMARY KEY (iddirecion),
    CONSTRAINT FOREIGN KEY (rfc_cliente) REFERENCES Cliente(rfc)
    );";
if ($conn->query($sql) === TRUE) {
    echo "Tablas creadas existosamente";
  } else {
    echo "3.- Error creando tablas: " . $conn->error;
  }

$conn->close();
?> 