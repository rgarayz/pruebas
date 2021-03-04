<!DOCTYPE html>
<html lang="es">
<head>
    <title>MENU</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <link rel="shorcut icon" type="image/x-icon" href="/lp3/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <?php
    session_start();
    require 'menu/css_lte.ctp';
    ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php require 'menu/header_lte.ctp'; ?>
        <?php require 'menu/toolbar_lte.ctp'; ?>
        <div class="content-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-clipboard"></i>
                                <h3 class="box-title">Articulos</h3>
                                    <div class="box-tools">
                                        <a href="articulo_add.php" class="btn btn-primary pull-right btn-sm" data-title="Agregar" rel="tooltip" data-placement="top">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a href="articulo_print.php" class="btn btn-default btn-sm pull-right" rel="tooltip" data-title="Imprimir" data-placement="top"
                                           target="print">
                                            <i class="fa fa-print"></i>
                                        </a>                                  
                                </div>
                            </div>
                            <div class="box-body no-padding">
                                <?php if(!empty($_SESSION['mensaje'])) { ?>
                            <div class="alert alert-success" role="alert" id="mensaje">
                                <span class="glyphicon glyphicon-ok-sign"></span>
                                <?php echo $_SESSION['mensaje'];
                                $_SESSION['mensaje']= null; ?>
                            </div>
                            <?php } ?>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-lg-12">
                                         <form action="articulo_index.php" method="POST" accept-charset="utf-8" class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-lg-6 col-md-6 col-xs-6">
                                                        <div class="input-group custom-search-form">
                                                            <input type="search" class="form-control" name="buscar" placeholder="Buscar..." autofocus="">
                                                            <span class="input-group-btn">
                                                                <button type="submit" class="btn btn-primary btn-flat" data-title="Buscar"
                                                                        rel="tooltip" data-placement="top"><span class="fa fa-search"></span>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php                                   
     
                                        $articulos = consultas::get_datos("select *from v_art where (mar_descri||art_descri) ilike '%".(isset($_REQUEST['buscar'])? $_REQUEST['buscar']:'')."%' order by art_cod");
                                        if (!empty($articulos)) {?>
                                        
                                        <div class="table-responsive">
                                            <table class="table col-lg-12 col-md-12 col-xs-12 table-bordered table-striped table-condensed table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Articulo</th>
                                                        <th>Marca</th>
                                                        <th>Precio Compra</th>
                                                        <th>Precio Venta</th>
                                                        <th>Impuesto</th>
                                                        
                                                        <th class="text-center">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($articulos as $art) { ?>
                                                    <tr>
                                                       
                                                        <td data-title="Articulo"> <?php echo $art['art_descri'];?></td>
                                                        <td data-title="Marca"> <?php echo $art['mar_descri'];?></td>
                                                        <td data-title="Precio Compra"> <?php echo number_format($art['art_precioc'],0, ",",".");?></td>
                                                        <td data-title="Precio Venta"> <?php echo number_format($art['art_preciov'],0, ",",".");?></td>
                                                        <td data-title="Impuesto"> <?php echo $art['tipo_descri'];?></td>
                                                        <td data-title="Acciones" class="text-center">
                                                            <a href="articulo_edit.php?vart_cod=<?php echo $art['art_cod']; ?>" class="btn btn-warning btn-sm" role="button" data-title="Editar" rel="tooltip" data-placement="top">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                            </a>
                                                            <a href="articulo_del.php?vart_cod=<?php echo $art['art_cod']; ?>" class="btn btn-danger btn-sm" role="button" data-title="Borrar" rel="tooltip" data-placement="top">
                                                                    <span class="glyphicon glyphicon-trash"></span>
                                                                </a>
                 
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php }else{ ?>
                                        <div class="alert alert-info flat">
                                            <span class="glyphicon glyphicon-info-sign"></span>
                                            No se han registrado articulos...
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>  
            </div>  
        </div>
        <?php require 'menu/footer_lte.ctp'; ?>
        </div>
        <?php require 'menu/js_lte.ctp'; ?>
        <script>
        $('#mensaje').delay(3000).slideUp(200,function(){
            $(this).alert('close');
        });
        </script>
    </div>
</body> 
</html>
