<?php
session_start();
if(!isset($_SESSION['carrito'])){
header('Location:./webApp.php');

if(!isset($_SESSION['cli_email'])){
  header("Location:login.php");
}
}

$arreglo = $_SESSION['carrito'];


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
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

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="border p-4 rounded" role="alert">
              Soy Cliente? <a href="login.php">Click aquí</a> para acceder
            </div>
          </div>
        </div>
        <form action="pedidow_control.php" method="POST" accept-charset="utf-8" class="form-horizontal">
            <input type="hidden"  name="accion" value="1">
            <input type="hidden"  name="vven_cod" value="0">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0" id="ord" >
            <h2 class="h3 mb-3 text-black">Detalles Factura</h2>
            <div class="p-3 p-lg-5 border">
             
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">Nombre <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="nombre" name="c_fname">
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">Apellido <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_lname" name="apellido">
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">RUC o CI <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_lname" name="ruc_ci">
                </div>
              </div>
              <div class="col-md-14">
                <label for="c_country" class="text-black">Ciudad <span class="text-danger">*</span></label>
                <select id="c_country" class="form-control">
                  <option value="1">Selecciona una ciudad</option> 
                  <option value="2">Asunción</option>
                  <option value="3">Ciudad Del Este</option>    
                  <option value="4">Encarnación</option>    
                  <option value="5">Cnel. Ovideo</option>    
                  <option value="6">Pedro J. Caballero</option>    
                  <option value="7">San Bernardino</option>    
                  <option value="8">San J. Bautista</option>    
                  <option value="9">Caraguatay</option>    
                </select>
              </div>
              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_email_address" class="text-black">Email<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_email_address" name="c_email_address">
                </div>
                <div class="col-md-6">
                  <label for="c_phone" class="text-black">Telefono <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number">
                </div>
              </div>

                              

                <div class="form-check">
                  <input class="form-check-input" type="radio" value="" name="check" id="flexCheckDefault">
                  <label class="form-check-label text-black" for="flexCheckDefault">Delivery
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input text-black" type="radio" name="check" value="" id="flexCheckChecked" checked>
                  <label class="form-check-label text-black" for="flexCheckChecked">Pick-up
                  </label>
                </div>

              <div class="form-group">
                <label for="c_order_notes" class="text-black">Notas</label>
                <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Escriba alguna nota aquí..."></textarea>
              </div>

            </div>
          </div>
          <div class="col-md-6">
            <div class="row mb-5">

              <div class="col-md-12" id="orden">
                <h2 class="h3 mb-3 text-black">Su orden</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5 ">
                    <thead style="text-align: center;">
                      <th>Productos</th>
                      <th>Cantidad</th>
                      <th>Sub Total</th>
                    </thead>
                    <tbody>
                    <?php
                    $total = 0;
                      for($i=0;$i<count($arreglo);$i++){
                          $total = $total+ ($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])
                      
                    ?>
                      <tr>
                        <td><?php echo $arreglo[$i]['Nombre']; ?></td>
                        <td style="padding-left:50px"><?php echo $arreglo[$i]['Cantidad']; ?></td>
                        <td><?php echo number_format($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad'],0,",","."); ?> Gs</td>
                      </tr>
                        <?php } ?>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                        <td class="text-black font-weight-bold"><strong><?php echo number_format(($total),0,",","."); ?> Gs</strong></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="form-group text-center">
                      <button type="submit" onclick="window.location='thankyou.php'">Realizar Pedido</button>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>

    <style>
     button[type="submit"]{
              padding: 10px;
              color: #fff;
              background: #7971ea;
              width: 320px;
              margin-right: 20px;
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