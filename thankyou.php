<?php
session_start();
include './clases/conexion.php';

if(!isset($_SESSION['carrito'])){header("Location:./webApp.php");}
$arreglo = $_SESSION['carrito'];
$total = 0;
for($i=0;$i<count($arreglo);$i++){
  $total =$total+($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
}
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

<div class="site-section"
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <img src="./images/listo.png" width="300px" height="266px">
            <h2 class="display-3 text-black">Muchas gracias!</h2>
            <p class="text">Su orden ha sido precesada correctamente.</p>
            <p><a href="catalogo.php" class="compra">Volver a comprar</a></p>
          </div>
        </div>
      </div>
      </div>

    <?php include("./layouts/footer.php"); ?> 

  </div>
<style>
span{
  width: 200px;
  height: 100px;;
}
.text{
  color: black;
  font-size: 20px;
}
.compra{
              padding: 10px;
              color: #fff;
              background: #7971ea;
              width: 320px;
              margin-right: 20px;
              margin: 20px auto;
              margin-top: 5px;
              border: 0;
              border-radius: 4px;
              cursor: pointer;
          }
         
</style>
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