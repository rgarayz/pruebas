<?php 
session_start();
include("./clases/conexion.php");


if(isset($_SESSION['carrito'])){
  //si existe buscamos si ya esta agregado
  if(isset($_GET['id'])){
    $arreglo =$_SESSION['carrito'];
    $encontro=false;
    $numero=0;
    for($i=0;$i<count($arreglo);$i++){
      if($arreglo[$i]['Id'] == $_GET['id']){
        $encontro=true;
        $numero=$i;
      }
    }
  
  if ($encontro == true){
    $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
    $_SESSION['carrito']=$arreglo;
  }else{
    //si no hay registros
    $nombre ="";
    $precio ="";
    $imagen="";
    $res= consultas::get_datos("select * from articulo where art_cod=".$_GET['id']) or die ("Error de conexion. ".pg_last_error());
    $nombre=$res[0]['art_descri'];
    $precio=$res[0]['art_preciov'];
    $imagen=$res[0]['art_imagen'];
    $arregloNuevo = array(
      'Id'=> $_GET['id'],
      'Nombre' => $nombre,
      'Precio' => $precio,
      'Imagen' => $imagen,
      'Cantidad' => 1
    );
    array_push($arreglo, $arregloNuevo);
    $_SESSION['carrito']=$arreglo;
    header ("Location: ./cart.php");

    }
  }

}else{
  if(isset($_GET['id'])){
    $nombre ="";
    $precio ="";
    $imagen="";
    $res= consultas::get_datos("select * from articulo where art_cod=".$_GET['id']) or die ("Error de conexion. ".pg_last_error());
    $nombre=$res[0]['art_descri'];
    $precio=$res[0]['art_preciov'];
    $imagen=$res[0]['art_imagen'];
    $arreglo[] = array(
      'Id'=> $_GET['id'],
      'Nombre' => $nombre,
      'Precio' => $precio,
      'Imagen' => $imagen,
      'Cantidad' => 1
    );
    $_SESSION['carrito']=$arreglo;
    header ("Location: ./cart.php");
   
  
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda </title>
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

    <script type="text/javascript" src="../jquery.js"></script>
    <script type="text/javascript" src="jquery.prettynumber.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      $("#number").prettynumber();   
      });
    </script>
    
  </head>
  <body>
  
  <div class="site-wrap">
  <?php include("./layouts/header.php"); ?> 

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="mx-auto">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Imagen</th>
                    <th class="product-name">Producto</th>
                    <th class="product-price">Precio</th>
                    <th class="product-quantity">Cantidad</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Borrar</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $total = 0;
                  if(isset($_SESSION['carrito'])){
                    $arregloCarrito =$_SESSION['carrito'];
                    for($i=0;$i<count($arregloCarrito);$i++){
                      $total = $total +($arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad']); 
                  ?>

                  <tr>
                    <td class="product-thumbnail">
                      <img src="images/<?php echo $arregloCarrito[$i]['Imagen']; ?>" width="200px" height="150px" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $arregloCarrito[$i]['Nombre'] ?></h2>
                    </td>
                    <td><?php echo number_format($arregloCarrito[$i]['Precio'],0,",","."); ?> Gs</td>
                    <td class="centro">
                      <div style="max-width: 120px, border-;">      
                        <input type="text" class="form-control text-center txtCantidad"
                          data-precio="<?php echo number_format($arregloCarrito[$i]['Precio'],0,",","."); ?>"
                          data-id="<?php echo number_format($arregloCarrito[$i]['Id'],0,",","."); ?>"
                          value="<?php echo $arregloCarrito[$i]['Cantidad'] ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                      </div>
                    </div>
                    </td>
                    <td class="cant<?php echo $arregloCarrito[$i]['Id']; ?>">
                    <?php echo number_format($arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad'],0,",","."); ?> Gs</td>
                    <td><a href="#" class="btn btn-primary btn-sm btnEliminar" id="btn_del" data-id="<?php echo $arregloCarrito[$i]['Id']; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                  </tr>
                    <?php } } ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-sm btn-block" id="btn1">Actualizar Carrito</button>
              </div>
              <div class="col-md-6">
                <button class="btn btn-outline-primary btn-sm btn-block" onclick="window.location.href='/taller/catalogo.php'" >Continuar Comprando</button>
              </div>
            </div>
            <style>
            #btn1 {
              padding: 10px;
              color: #fff;
              background: #7971ea;
              width: 260px;
              margin: 20px auto;
              margin-top: 0;
              border: 0;
              border-radius: 4px;
              cursor: pointer;
            }
            #btn_del{
              padding: 10px;
              color: #fff;
              background: #7971ea;
              width: 58px;
              margin: 20px auto;
              margin-top: 0;
              border: 0;
              border-radius: 4px;
              cursor: pointer;
            }
            .centro{
              text-align: center;
              width: 200px;
            }
            #btn2{
            padding: 10px;
              color: #fff;
              background: #7971ea;
              width: 300px;
              margin: 20px auto;
              margin-top: 0;
              border: 0;
              border-radius: 4px;
              cursor: pointer;

            }
            </style>
            
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Total Carrito</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black"><?php echo number_format(($total),0,",","."); ?> Gs</strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black"><?php echo number_format(($total),0,",","."); ?> Gs</strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" id="btn2" onclick="window.location='checkout.php'">ORDENAR COMPRA</button>
                  </div>
                </div>
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

  <script>
  $(document).ready(function(){
    $(".btnEliminar").click(function(event){
      event.preventDefault();
      var id = $(this).data('id');
      var boton = $(this);
      $.ajax({
        method:'POST',
        url:'./eliminarCarrito.php',
        data:{
          id:id
        }
      }).done(function(respuesta){
        boton.parent('td').parent('tr').remove();
      });
    });
    $(".txtCantidad").keyup(function(){
      var cantidad = $(this).val();
      var precio = $(this).data('precio');
      var id = $(this).data('id');

      incrementar(cantidad,precio,id);
      
    });
    $(".btnIncrementar").click(function(){
    var precio =  $(this).parent('div').parent('div').find('input').data('precio');

    var id =  $(this).parent('div').parent('div').find('input').data('id');

    var cantidad =  $(this).parent('div').parent('div').find('input').val('cantidad');
    incrementar(cantidad,precio,id);


    });

    function incrementar(cantidad, precio, id){
     
      
      var mult = parseFloat(cantidad)* parseFloat(precio);
      $(".cant"+id).text(mult);
    }
  });
  </script>
    
  </body>
</html>