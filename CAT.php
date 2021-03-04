<?php

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

    
      <div class="container">
	  
        <div class="row mb-5">
          <div class="col-md-9 order-2">

            
			
			
			<div class="container">
                <?php
                
                include("./clases/conexion.php");
                $valor='';
                 if(isset($_REQUEST['buscar'])){
                $valor=$_REQUEST['buscar'];
                }
                $resultado = consultas::get_datos("select * from articulo order by art_cod DESC LIMIT 1") or die ("Error de conexion. ".pg_last_error());
                if(!empty($resultado)) {?>
				<div class="row">
					<div class="col-12">
				
				
						<div class="col-md-3 col-6 product block">
							<a href="wacom-tablet">
								<img class="img-fluid img-portfolio img-hover mb-3" src="images/cloth_1" alt="<?php echo $res['art_codbarra'] ?>">
							</a>
						
                            
								<div class="caption">
									<h3><a href="wacom-tablet"><?php echo $res['art_descri'];?></a>
										</h3>
									<div class="price-mob"><?php echo['art_preciov'] ?></div>
										<div class="clearfix">
										</div>
											<p class="product-block-description d-none d-md-block">
												kgDFSDHDGHS <a href="cart.php" class="btn btn-succes btn-sm" role="button" data-title="Comprar" rel="tooltip" data-placement="top">Add to cart
                                                                <span class="glyphicon glyphicon-shopping-cart"></span>
                                                            </a>
											</p>

								</div>
						</div>
						
					</div>
				</div>

						
                    
                    <?php }else{ ?>
                                        <div class="alert alert-info flat">
                                            <span class="glyphicon glyphicon-info-sign"></span>
                                            No se han registrado marcas...
                                        </div>
                                        <?php } ?>
					<div class="col-md-3 col-6 product block">
				        <a href="wacom-tablet">
					       <img class="img-fluid img-portfolio img-hover mb-3" src="images/cloth_2" alt="wacom bamboo tablet">
				        </a>
					       <div class="caption">
						      <h3><a href="wacom-tablet">New Balance</a>
						      </h3>
					           <div class="price-mob">288.000</div>
						          <div class="clearfix"></div>
							         <p class="product-block-description d-none d-md-block">
												Remera POLO
							         </p>
					       </div>
			         </div>
                    <div class="col-md-3 col-6 product block">
				        <a href="wacom-tablet">
					       <img class="img-fluid img-portfolio img-hover mb-3" src="images/cloth_1" alt="wacom bamboo tablet">
				        </a>
					       <div class="caption">
						      <h3><a href="wacom-tablet">Caterpillar</a>
						      </h3>
					           <div class="price-mob">265.000</div>
						          <div class="clearfix"></div>
							         <p class="product-block-description d-none d-md-block">
												Jersey
							         </p>
					       </div>
			         </div>
                    <div class="col-md-3 col-6 product block">
				        <a href="wacom-tablet">
					       <img class="img-fluid img-portfolio img-hover mb-3" src="images/cloth_2" alt="wacom bamboo tablet">
				        </a>
					       <div class="caption">
						      <h3><a href="wacom-tablet">Wacom</a>
						      </h3>
					           <div class="price-mob">100.000</div>
						          <div class="clearfix"></div>
							         <p class="product-block-description d-none d-md-block">
												kgDFSDHDGHS
							         </p>
					       </div>
			         </div>
                    <div class="col-md-3 col-6 product block">
				        <a href="wacom-tablet">
					       <img class="img-fluid img-portfolio img-hover mb-3" src="images/cloth_2" alt="wacom bamboo tablet">
				        </a>
					       <div class="caption">
						      <h3><a href="wacom-tablet">Wacom</a>
						      </h3>
					           <div class="price-mob">100.000</div>
						          <div class="clearfix"></div>
							         <p class="product-block-description d-none d-md-block">
												kgDFSDHDGHS
							         </p>
					       </div>
			         </div>
                    <div class="col-md-3 col-6 product block">
				        <a href="wacom-tablet">
					       <img class="img-fluid img-portfolio img-hover mb-3" src="images/cloth_2" alt="wacom bamboo tablet">
				        </a>
					       <div class="caption">
						      <h3><a href="wacom-tablet">Wacom</a>
						      </h3>
					           <div class="price-mob">100.000</div>
						          <div class="clearfix"></div>
							         <p class="product-block-description d-none d-md-block">
												kgDFSDHDGHS
							         </p>
					       </div>
			         </div>
                    <div class="col-md-3 col-6 product block">
				        <a href="wacom-tablet">
					       <img class="img-fluid img-portfolio img-hover mb-3" src="images/cloth_2" alt="wacom bamboo tablet">
				        </a>
					       <div class="caption">
						      <h3><a href="wacom-tablet">Wacom</a>
						      </h3>
					           <div class="price-mob">100.000</div>
						          <div class="clearfix"></div>
							         <p class="product-block-description d-none d-md-block">
												kgDFSDHDGHS
							         </p>
					       </div>
			         </div>
                    <div class="col-md-3 col-6 product block">
				        <a href="wacom-tablet">
					       <img class="img-fluid img-portfolio img-hover mb-3" src="images/cloth_2" alt="wacom bamboo tablet">
				        </a>
					       <div class="caption">
						      <h3><a href="wacom-tablet">Wacom</a>
						      </h3>
					           <div class="price-mob">100.000</div>
						          <div class="clearfix"></div>
							         <p class="product-block-description d-none d-md-block">
												kgDFSDHDGHS
							         </p>
					       </div>
			         </div>
                    <div class="col-md-3 col-6 product block">
				        <a href="wacom-tablet">
					       <img class="img-fluid img-portfolio img-hover mb-3" src="images/cloth_2" alt="wacom bamboo tablet">
				        </a>
					       <div class="caption">
						      <h3><a href="wacom-tablet">Wacom</a>
						      </h3>
					           <div class="price-mob">100.000</div>
						          <div class="clearfix"></div>
							         <p class="product-block-description d-none d-md-block">
												kgDFSDHDGHS
							         </p>
					       </div>
			         </div>
                    <div class="col-md-3 col-6 product block">
				        <a href="wacom-tablet">
					       <img class="img-fluid img-portfolio img-hover mb-3" src="images/cloth_2" alt="wacom bamboo tablet">
				        </a>
					       <div class="caption">
						      <h3><a href="wacom-tablet">Wacom</a>
						      </h3>
					           <div class="price-mob">100.000</div>
						          <div class="clearfix"></div>
							         <p class="product-block-description d-none d-md-block">
												
                                         kgDFSDHDGHS
							         </p>
					       </div>
			         </div>
                    <div class="col-md-3 col-6 product block">
				        <a href="wacom-tablet">
					       <img class="img-fluid img-portfolio img-hover mb-3" src="images/cloth_2" alt="wacom bamboo tablet">
				        </a>
					       <div class="caption">
						      <h3><a href="wacom-tablet">Wacom</a>
						      </h3>
					           <div class="price-mob">100.000</div>
						          <div class="clearfix"></div>
							         <p class="product-block-description d-none d-md-block">
												kgDFSDHDGHS
							         </p>
					       </div>
			         </div>
				<div class="col-md-3 col-6 product block">
				        <a href="wacom-tablet">
					       <img class="img-fluid img-portfolio img-hover mb-3" src="images/cloth_2" alt="wacom bamboo tablet">
				        </a>
					       <div class="caption">
						      <h3><a href="wacom-tablet">Wacom</a>
						      </h3>
					           <div class="price-mob">100.000</div>
						          <div class="clearfix"></div>
							         <p class="product-block-description d-none d-md-block">
												kgDFSDHDGHS
							         </p>
					       </div>
			         </div>
				
				
				</div>		
             </div>
            
                 <style>
                     .img1{
                         padding: 10px;
                         margin: 10px;
                         border: 2px solid black;
                         float: left;
                         width: 250px;    
                     }
                     .img2{
                         padding: 10px;
                         margin: 10px;
                         border: 2px solid black;
                         float: center;
                         width: 250px;
                     }
                     button{
                         padding: 0px;
                         float: left;
                         margin-top: 20px;
                     }
                  
                  
                  </style>
                
                
            


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

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="site-section site-blocks-2">
                <div class="row justify-content-center text-center mb-5">
                  <div class="col-md-7 site-section-heading pt-4">
                    <h2>Categorias</h2>
                  </div>
                </div>
                
                  <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                    <a class="block-2-item" href="#">
                      <figure class="image">
                        <img src="images/children.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="text-uppercase">Colección</span>
                        <h3>Niños</h3>
                      </div>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                    <a class="block-2-item" href="#">
                      <figure class="image">
                        <img src="images/men.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="text-uppercase">Collections</span>
                        <h3>Hombres</h3>
                      </div>
                    </a>
                  </div>
                 <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                    <a class="block-2-item" href="#">
                      <figure class="image">
                          <img src="images/women.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="text-uppercase">Collección</span>
                        <h3>Mujeres</h3>
                      </div>
                    </a>
                  </div>
                </div>
              
            </div>
          </div>
        </div>
        
      
    <?php include("./layouts/footer.php"); ?>

    


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