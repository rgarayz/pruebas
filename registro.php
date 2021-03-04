
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Registro</title>
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
      
      <?php if (!empty($message)); ?>
      <p><?php $message ?></p>
      

      
      
    
      <div class="container">
          <form action="registro_control.php" accept-charset="utf-8"  class="form-inline" role="form" method="post">
            <div class="form-group">
                <h1>REGíSTRATE</h1>
                <input type="text" class="form-group text-black" name="nombre" placeholder="Ingrese su nombre">
                <input type="text" class="form-group text-black" name="apellido" placeholder="Ingrese su apellido">
            </div>
                    <div class="form-group">
                        <input type="text" class="form-group text-black" name="telefono" placeholder="Ingrese su telefono">
                        <input type="text" class="form-group text-black" name="email" placeholder="Ingrese su email">
                    </div>
                            <div class="form-group-lg">
                                <input type="text" class="form-group text-black" name="dir" placeholder="Ingrese su direccion">
                            </div>
                                    <div class="form-group">
                                        <input type="password" class="form-group text-black" name="password" placeholder="Ingrese su contraseña">
                                        <input type="password" class="form-group text-black" name="pass" placeholder="Confirme su contraseña">
                                    </div>
                                        <div class="form-group-sm">
                                            <input type="submit" class="form-group-sm" value="REGISTRARSE" name="enviar">
                                    </div>
                            
                    
            
            </form>
      </div>
      
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
              margin-top: 15px;
              border: 0;
              border-radius: 3px;
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