<?php require 'clases/conexion.php'; 
 session_start();
 error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <?php include("./layouts/header.php"); ?>
      
      <form action="acceso_web.php" method="post">
          <h1>INGRESE A SU CUENTA</h1>
          <input type="text" name="email" placeholder="Ingrese su email">
          <input type="password" name="password" placeholder="Ingrese su contraseña">
         
          <input type="submit" value="ACCEDER" name="enviar">
          
                        <?php
          
                            if(!empty($_SESSION['error'])){ ?>
                            <div class="alert alert-danger" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign"></span>
                                <?php echo $_SESSION['error']; ?>
                            </div>
                            <?php }?>
                    
      </form> 
      <style>
          h1{
              color: black;
              font-size: 25px;
          }
          
         
          form{
              margin: 0;
              padding: 0;
              text-align: center;
          }
          .alert{
              margin-left: auto;
              margin-right: auto;
              width: 300px;
          }
          input[type="text"], input[type="password"]{
              outline: none;
              padding: 20px;
              display: block;
              width: 300px;
              height: 50px;
              border-radius: 3px;
              border: 1px solid #eee;
              margin: 20px auto;
          }
          input[type="submit"]{
              padding: 10px;
              color: #fff;
              background: #7971ea;
              width: 320px;
              margin: 20px auto;
              margin-top: 0;
              border: 0;
              border-radius: 4px;
              cursor: pointer;
          }
          input[type="submit"]:hover{
              background-color: #4D42E0;
          }
      </style>
      <?php include("./layouts/footer.php"); ?> 
  </div>
   

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>