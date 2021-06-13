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

    <link rel="stylesheet" href="CSS/1Index.css">
    
    <!-- Link para font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap');
        .text{
            text-align: justify;
            margin-left: 5%;
            margin-top: 5%;
        }
        .text1{
            font-size: px;
            color: black;
        }     
        @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@300&display=swap');
        .text2{
            font-family: 'Rajdhani';
            font-size: 45px;
            color: black;
        }     
        .text3{
            font-size: 35px;
            font-family: 'Open Sans Condensed';
        }
        @import url('https://fonts.googleapis.com/css2?family=Jost&display=swap');
        .text4{
            font-size: 15px;
            font-family: 'Jost';
        }
        #dos{
          display: none;
        }
        #logout:hover #dos{
            display: inline;
        }
        #logout:hover #primero{
          display: none;
        }
        #dos{
          color: red;
        }
        
    </style>
     <style type="text/css" media="print">
            .footer{
              display: none;
            } 
            h1{
              display: none;
            }
        </style>
    <title>Inicio</title>
  </head>
  <body>
<header>
    <nav class="navbar my-nav navbar-expand-lg">
      <a class="navbar-brand" href="index.php"><img src="Imagenes/logo2.png" width="100px;" alt="Logo Xfinity"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="2internet.php">Internet</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="3tv.php">TV & Streaming</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="4bundles.php">Bundles</a>
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
    

<?php
include 'juntar.php'; 
?>


   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>  <br> 
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