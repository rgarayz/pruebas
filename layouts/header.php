<?php
error_reporting(0);
session_start();
?>
<header class="site-navbar" role="banner">
      <div class="site-navbar-top" id="navbar">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Search">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
               
                <a href="webApp.php" class="js-logo-clone">Mi Tienda</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul >
                  <li></li>
                    <li><a href="login.php" id="sesion">Acceder</a></li><li>|</li>
                        
                    <li><a href="registro.php">Registrarse</a></li>

                    <li><a href="cerrar_sesion.php"><span class="glyphicon glyphicon-off"></a></span></li>
                  
                  <li><span class="icon icon-person"></span><?php echo $_SESSION['cli_email'] ?></li>
                  <li>
                    <a href="cart.php" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count">
                        <?php if(isset($_SESSION['carrito'])){
                          echo count($_SESSION['carrito']);
                        }else{
                          echo 0;
                        } 
                        
                        ?>
                      </span>
                    </a>
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li>
              <a href="webApp.php">Inicio</a>
            
            </li>
            <li>
              <a href="nosotros.php">Nosotros</a>
            
            </li>
          
            <li><a href="catalogo.php">Catálogo</a></li>
            <li><a href="coleccion.php">Nueva Colección</a></li>
            <li><a href="contacto.php">Contacto</a></li>
            <hr>
          </ul>
        </div>
      </nav>
    </header>

    <style>
      #navbar{
        color: #FFFFFF;
        background-image: url(./images/fondo.jpg);
      }
      



    </style>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Inicio</a> <span class="mx-2 mb-0">/</span>
           <strong class="text-black"><a href="cart.php">Shop</a></strong></div>
        </div>
      </div>
    </div>