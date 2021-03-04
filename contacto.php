<?php 
include("./clases/conexion.php");
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

    <form action="#" method="post" class="text-center">
        <div class="form-group"">
          <h1>QUEREMOS ESCUCHARTE!</h1>
          <input type="text" name="nombre" placeholder="Ingrese su nombre" require="">
          <input type="text" name="email" placeholder="Ingrese su email" require="">
          <textarea type="text" name="mensaje"cols="60" rows="10" placeholder="Dejanos un mensaje"></textarea>
        </div>
         <div class="form-group" style="margin-bottom: 50px">
          <input type="submit" value="ENVIAR" name="enviar">
        </div>              
      </form> 

      <div class="cont text-center" style="margin-bottom: 80px;">
      
          <a href="https:\\facebook.com"><img src="./img/face.png"  width="90px" height="60px"></a> 
      
      
          <a href="https:\\instagram.com"><img src="./img/instagram.png" width="90px" height="60px"></a>

          <a href="https:\\twitter.com"><img src="./img/twi.png" width="90px" height="60px"></a>

      </div>
      <div class="small-box">



      </div>

      <style>
          img{
              padding-right: 5px;
          }
          h1{
              color: black;
              font-size: 25px;
          }
          form{
              margin: 0;
              padding: 0;
              text-align: center;
          }
          
          input[type="text"]{
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
          textarea{
            margin: 0;
              padding: 0;
              text-align: center;

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







