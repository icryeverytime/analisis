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
    numpaq int(2) NOT NULL,
    bits VARCHAR(30) NOT NULL,
    canales VARCHAR(30) NOT NULL,
    costo int(10) NOT NULL,
    PRIMARY KEY (numpaq)
    );";
if ($conn->query($sql) === TRUE) {
  echo "Tablas creadas existosamente";
} else {
  echo "1.-Error creando tablas: " . $conn->error;
}
$sql="CREATE TABLE Cliente (
    idcliente int(10) NOT NULL AUTO_INCREMENT,
    rfc VARCHAR(13) NOT NULL,
    nombre VARCHAR(50) NOT NULL,  
    correo  VARCHAR(50) NOT NULL,
    telefono VARCHAR(12) NOT NULL,
    segurosocial VARCHAR(14) NOT NULL,
    fechadenacimiento VARCHAR(30) NOT NULL,
    contra VARCHAR(40) NOT NULL,
    PRIMARY KEY (idcliente)
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
    id_cliente int(10) NOT NULL,
    PRIMARY KEY (iddirecion),
    CONSTRAINT FOREIGN KEY (id_cliente) REFERENCES Cliente(idcliente)
    );";
if ($conn->query($sql) === TRUE) {
    echo "Tablas creadas existosamente";
  } else {
    echo "3.- Error creando tablas: " . $conn->error;
  }
  $sql="CREATE TABLE Servicio(
      num_paq int(2) NOT NULL,
      id_cuenta int(10) NOT NULL,
      folioservicio int(10) NOT NULL AUTO_INCREMENT,
      fechacontratacion DATE NOT NULL,
      fechasigpago DATE NOT NULL,
      valorunitario float(10) NOT NUlL,
      formadepago varchar(30) NOT NULL,
      montodeimpuestos float(10) NOT NULL,
      referenciabancaria varchar(40) NOT NULL,
      PRIMARY KEY (folioservicio),
      CONSTRAINT FOREIGN KEY (num_paq) REFERENCES Paquete(numpaq),
      CONSTRAINT FOREIGN KEY (id_cuenta) REFERENCES Cliente(idcliente)
    );";
if ($conn->query($sql) === TRUE) {
    echo "Tablas creadas existosamente";
  } else {
    echo "4.- Error creando tablas: " . $conn->error;
  }
  $sql="CREATE TABLE Factura(
    id_cuentaFAC int(10) NOT NULL,
    num_paqFAC int(2) NOT NULL,
    foliofactura int(10) NOT NULL AUTO_INCREMENT,
    regimenfiscal varchar(100) NOT NULL,
    periodo varchar(100) NOT NULL,
    importetotalnumer float(10) NOT NULL,
    importetotalletra varchar(30) NOT NULL,
    codigobarras varchar(30) NOT NULL,
    serieCSDDemisor varchar(30) NOT NULL,
    serieCSDDsat varchar(30) NOT NULL,
    leyendafinal varchar(30) NOT NULL,
    fechayhorafactura DATE NOT NULL,
    cadenaSAT varchar(50) NOT NULL,
    PRIMARY KEY (foliofactura),
    CONSTRAINT FOREIGN KEY (num_paqFAC) REFERENCES Paquete(numpaq),
    CONSTRAINT FOREIGN KEY (id_cuentaFAC) REFERENCES Cliente(idcliente)
  );";
if ($conn->query($sql) === TRUE) {
  echo "Tablas creadas existosamente";
} else {
  echo "4.- Error creando tablas: " . $conn->error;
}
  $sql="INSERT INTO Paquete(numpaq,bits,canales,costo)
    VALUES(1,20,75,200);
    INSERT INTO Paquete(numpaq,bits,canales,costo)
    VALUES(2,50,75,300);
    INSERT INTO Paquete(numpaq,bits,canales,costo)
    VALUES(3,100,100,400);
    INSERT INTO Paquete(numpaq,bits,canales,costo)
    VALUES(4,200,300,500);
    ";
if ($conn->multi_query($sql) === TRUE) {
    echo "Tablas creadas existosamente";
  } else {
    echo "5.- Error creando tablas: " . $conn->error;
  }

$conn->close();
?> 