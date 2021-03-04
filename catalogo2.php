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

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
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
            <div class="container mt-3">
              <div class="d-flex align-items-center justify-content-between py-4 results">
                <div>Showing 1-40 of 350</div>
                  <div> <span>Price: </span> <select name="price" id="price">
                      <option value="l2h" selected>low to high</option>
                      <option value="l2h">high to low</option>
                      </select> </div>
                   </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 offset-md-0 offset-sm-1 col-sm-10 offset-sm-1 my-lg-0 my-2">
                            <div class="card"> <img class="card-img-top" src="https://www.freepnglogos.com/uploads/jewellery-png/jewellery-png-images-download-wedding-bangle-ring-9.png">
                                <div class="card-body">
                                    <div class="d-flex align-items-start justify-content-between">
                                        <div class="d-flex flex-column">
                                            <div class="h6 font-weight-bold">Pearl earrings</div>
                                            <div class="text-muted"><?php echo number_format($res['art_preciov'],0, ",",".");?></div>
                                        </div>
                                        <div class="btn"><span class="far fa-heart"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
      </div>
                          
              <?php } ?>
              <?php } ?>


            
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

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categorias</h3>
              <ul class="list-unstyled mb-0">
                <li class="mb-1"><a href="#" class="d-flex"><span>Hombre</span> <span class="text-black ml-auto">(2,220)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Mujer</span> <span class="text-black ml-auto">(2,550)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Niños</span> <span class="text-black ml-auto">(2,124)</span></a></li>
              </ul>
            </div>

            <div class="border p-4 rounded mb-4">
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filtro por Precio</h3>
                <div id="slider-range" class="border-primary"></div>
                <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
              </div>

              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Tamaño</h3>
                <label for="s_sm" class="d-flex">
                  <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Pequeño (2,319)</span>
                </label>
                <label for="s_md" class="d-flex">
                  <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medio (1,282)</span>
                </label>
                <label for="s_lg" class="d-flex">
                  <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Largo (1,392)</span>
                </label>
              </div>

              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Red (2,429)</span>
                </a>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Green (2,298)</span>
                </a>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Blue (1,075)</span>
                </a>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Purple (1,075)</span>
                </a>
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