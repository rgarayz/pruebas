<?php
session_start();

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
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-12 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                
                <div class="d-flex">
                  <div class="dropdown mr-1 ml-md-auto">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Latest
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                      <a class="dropdown-item" href="#">Hombre</a>
                      <a class="dropdown-item" href="#">Mujer</a>
                      <a class="dropdown-item" href="#">Niños</a>
                    </div>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Referencia</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      <a class="dropdown-item" href="#">Relevancia</a>
                      <a class="dropdown-item" href="#">Nombre, A a Z</a>
                      <a class="dropdown-item" href="#">Nombre, Z a A</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Precio, bajo a alto</a>
                      <a class="dropdown-item" href="#">Price, alto a bajo</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <?php
            include("./clases/conexion.php");
                $valor='';
                 if(isset($_REQUEST['buscar'])){
                $valor=$_REQUEST['buscar'];
                }
                $resultado = consultas::get_datos("select * from articulo order by art_cod LIMIT 8") or die ("Error de conexion. ".pg_last_error());
                if(!empty($resultado)) {?>
            
            <?php foreach ($resultado as $res) { ?>
        
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                     <a href="shop-single.php?id=<?php echo $res['art_cod']; ?>">
                     <img src="images/<?php echo $res['art_imagen'] ?>" width="200px" height="150px" alt="Image placeholder" class="img-fluid"></a>
                  </figure>
                 
                  <div class="block-4-text p-4">
                    <h3><a href="shop-single.php?id=<?php echo $res['art_cod']; ?>"><?php echo $res['art_descri']; ?></a></h3>
                    <p class="mb-0">ref. <?php echo $res['art_codbarra']; ?></p>
                    <p class="text-primary font-weight-bold"><?php echo number_format($res['art_preciov'],0, ",",".");?> GS</p>
                  </div>
                  
                </div>
              </div>
              <?php } ?>
              <?php } ?>


            </div>
          </div>
          
              

            
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          
        </div>

        
        </div>
        
      </div>
   
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