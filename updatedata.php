<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "myDB";
 session_start();
 $id=$_SESSION["id"];
 $conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
 die("Conexion fallo: " . $conn->connect_error);
 }
 $sql="SELECT nombre,correo,rfc,telefono,segurosocial,fechadenacimiento FROM Cliente WHERE (idcliente='$id')";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
         $nombre=$row["nombre"];
         $correo=$row["correo"];
         $rfc=$row["rfc"];
         $telefono=$row["telefono"];
         $segurosocial=$row["segurosocial"];
         $fechadenacimiento=$row["fechadenacimiento"];
   }
 } else {
   echo "No existe el cliente";
 }
 $sql="SELECT calle,nuexterior,colonia,municipio,estado,cp FROM Direccion WHERE (id_cliente='$id')";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
         $calle=$row["calle"];
         $nuexterior=$row["nuexterior"];
         $colonia=$row["colonia"];
         $municipio=$row["municipio"];
         $estado=$row["estado"];
         $cp=$row["cp"];
   }
 } else {
   echo "No existe el cliente";
 }
 $conn->close();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Favicon-->
    <link rel="icon" href="Imagenes/favicon.jpg" type="image" sizes="16x16">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="CSS/7FinishRegister.css">
    
    <!-- Link para font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    
    <style>
    </style>
    <title>Register</title>
  </head>
  <body>
   <header>
    <nav class="navbar my-nav navbar-expand-lg fixed-top">
      <a class="navbar-brand" href="index.html"><img src="Imagenes/logo2.png" width="100px;" alt="Logo Xfinity"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="2internet.html">Internet</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="3tv.html">TV & Streaming</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="4bundles.html">Bundles</a>
            </li>
            <?php 
        session_start();
        if(empty($_SESSION["id"]) and (empty($_SESSION["empleado"])))
        {
        ?>
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				Sign In
			  </a>
			  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
				<li><a class="dropdown-item" href="5SignIn.php">Create a New Account</a></li>
				<li><a class="dropdown-item" href="6LogIn.php">Log In</a></li>
			  </ul>
        <?php
        }else if(!empty($_SESSION["id"])){
          ?>
          <li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo $_SESSION["nombre"]; ?>
			  </a>
			  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
				<li><a class="dropdown-item" href="endsession.php">Logout</a></li>
				<li><a class="dropdown-item" href="generarFactura.php">Request Invoice</a></li>
        <li><a class="dropdown-item" href="updatedata.php">Update Data</a></li>
        <li><a class="dropdown-item" href="updateService.php">Update Service</a></li>
			  </ul>
          <?php
        }
        else if(!empty($_SESSION["empleado"]))
        {
          ?>
          <li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo $_SESSION["nombre"]; ?>
			  </a>
			  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
				<li><a class="dropdown-item" href="endsession.php">Logout</a></li>
				<li><a class="dropdown-item" href="administracion.php">Administracion</a></li>
			  </ul>

        
        <?php
        }
        ?>
			  </li>
        </ul>
       </div>
    </nav>
      </header>
    <br>
    
    <!-- multistep form -->
    <form id="msform" method="POST" action="solicitardatos.php">
       <!-- fieldsets -->
      <fieldset>
        <h2 class="fs-title">WELCOME TO XFINITY</h2>
        <h3 class="fs-subtitle">Change information you want to change</h3>
        <h3 class="fs-subtitle">RFC</h3>
        <input type="text" name="RFC" value="<?php echo $rfc ?>" />
        <h3 class="fs-subtitle">Telephone</h3>
        <input type="text" name="telephone" value="<?php echo $telefono ?>"/>
        <h3 class="fs-subtitle">SSN</h3>
        <input type="text" name="SSN" value="<?php echo $segurosocial?>"/>
        <h3 class="fs-subtitle">Birthday</h3>
        <input type="text" name="Birthday" value="<?php echo $fechadenacimiento?>"/>
        <br>
        <h3 class="fs-subtitle">Address</h3>
        <h3 class="fs-subtitle">Street</h3>
        <input type="text" name="Street" value="<?php echo $calle ?>"/>
        <h3 class="fs-subtitle">Number</h3>
        <input type="text" name="Number" value="<?php echo $nuexterior ?>"/>
        <h3 class="fs-subtitle">Suburb</h3>
        <input type="text" name="Suburb" value="<?php echo $municipio?>"/>
        <h3 class="fs-subtitle">Town</h3>
        <input type="text" name="Town" value="<?php echo $colonia?>"/>
        <h3 class="fs-subtitle">ZipCode</h3>
        <input type="text" name="ZipCode" value="<?php echo $cp?>"/>
        <h3 class="fs-subtitle">State</h3>
        <input type="text" name="State" value="<?php echo $estado ?>"/>
        <input type="submit" name="next" class="next action-button" value="Next" />
      </fieldset>   
    </form>
    
    <br>
<footer class="footer pie py-4">
  <div class="container">
      <div class="row align-items-right">
          <div class="col-lg-4 copyright text-lg-left">Copyright © Xfinity 2021</div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="align-items-right">
                  <a class="btn tw btn-social mx-2" href="https://twitter.com/FNSM_Oficial" target="_blank" ><i class="fab fa-twitter"></i></a> 
                  <a class="btn fb btn-social mx-2" href="https://www.facebook.com/ferianacionaldesanmarcosoficial/about/?ref=page_internal" target="_blank" ><i class="fab fa-facebook-f"></i></a>
                  <a class="btn ig btn-social mx-2" href="https://www.instagram.com/fnsm_oficial/" target="_blank" ><i class="fab fa-instagram-square"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div class="col-lg-4 text-lg-right">
                  <a class="mr-3" href="#!">Política de Privacidad</a>
              </div>
      </div>
  </div>
</footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>