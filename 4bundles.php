<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--Favicon-->
   <link rel="icon" href="Imagenes/favicon.jpg" type="image" sizes="16x16">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="CSS/4Bundles.css">
    
    <!-- Link para font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    
    <style>
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
        span{
          color:whitesmoke;
        }
        span:hover {
    color: #0056b3;
    text-decoration: underline;
}
    </style>
    <title>Internet</title>
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
            <li class="nav-item active">
                <a class="nav-link" href="2internet.php">Internet <span class="sr-only"></span></a>
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
        <li><a class="dropdown-item" href="updatefactura.php">Update Factura</a></li>
        <li><a class="dropdown-item" href="instalacion.php">Programar instalacion</a></li>
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
    <div class="seccionfondo">

        <br>
    <div class="card-deck">
  <div class="card border-0" style="background-color: rgba(245, 245, 245, 0);">
    <div class="card-body">
      <h5 class="card-title text-light">Bundle #1</h5>
      <p class="card-text text-light">200Mbps Symmetrical+ 300 Channels + ClaroVideo+ Blim + PH Premium + Spotify + Netflix</p>
      <form method="post" action="contratarservicio.php">
                  <input type="hidden" id="boton1" name="boton1" value="1">
                  <button type="submit" class="btn btn-outline-dark"><span>BUY</span></button>
              </form>
      
    </div>
  </div>
  
</div><br><br><br><div class="card border-0" style="background-color: rgba(245, 245, 245, 0);">
    <div class="card-body">
      <h5 class="card-title text-light">Bundle #2</h5>
      <p class="card-text text-light">100Mbps + 100 Channels + 30 HD Channels</p>
     <form method="post" action="contratarservicio.php">
                  <input type="hidden" id="boton1" name="boton1" value="2">
                  <button type="submit" class="btn btn-outline-dark"><span>BUY</span></button>
              </form>


    </div>
  </div><br><br><br><div class="card border-0" style="background-color: rgba(245, 245, 245, 0);">
    <div class="card-body">
      <h5 class="card-title text-light">Bundle #3</h5>
      <p class="card-text text-light">50Mbps + 100 Channels</p>
      <form method="post" action="contratarservicio.php">
                  <input type="hidden" id="boton1" name="boton1" value="3">
                  <button type="submit" class="btn btn-outline-dark"><span>BUY</span></button>
              </form>


    </div><br><br><br><div class="card border-0" style="background-color: rgba(245, 245, 245, 0);">
    <div class="card-body">
      <h5 class="card-title text-light">Bundle #4</h5>
      <p class="card-text text-light">20Mbps + 75 Channels</p>
      <form method="post" action="contratarservicio.php">
                  <input type="hidden" id="boton1" name="boton1" value="4">
                  <button type="submit" class="btn btn-outline-dark"><span>BUY</span></button>
              </form>


    </div>
  </div><br><br><br><div class="card border-0" style="background-color: rgba(245, 245, 245, 0);">
    <div class="card-body">
      <h5 class="card-title text-light">Bundle #5</h5>
      <p class="card-text text-light">10Mbps + 50 Channels</p>
      <form method="post" action="contratarservicio.php">
                  <input type="hidden" id="boton1" name="boton1" value="5">
                  <button type="submit" class="btn btn-outline-dark"><span>BUY</span></button>
              </form>

    </div>
  </div>
  </div>
      </div>
      
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
   
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
