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
                                <i class="fa fa-users"></i>
                                <h3 class="box-title">Clientes</h3>
                                    <div class="box-tools">
                                        <a href="cliente_print.php" class="btn btn-default btn-sm pull-right" rel="tooltip" data-title="Imprimir" data-placement="top"
                                           target="print">
                                            <i class="fa fa-print"></i>
                                        </a>
                                        <a href="cliente_add.php" class="btn btn-primary pull-right btn-sm" data-title="Agregar" rel="tooltip" data-placement="top">
                                            <i class="fa fa-plus"></i>
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
                                         <form action="cliente_index.php" method="POST" accept-charset="utf-8" class="form-horizontal">
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
                                        $val1 = '';
                                        if(isset($_REQUEST['buscar'])) {
                                            $val1 = $_REQUEST['buscar'];
                                        }
     
                                        $clientes = consultas::get_datos("select *from clientes where (cli_ci||cli_nombre||cli_apellido) ilike '%".$val1."%' order by cli_cod");
                                        if (!empty($clientes)) {?>
                                        
                                        <div class="table-responsive">
                                            <table class="table col-lg-12 col-md-12 col-xs-12 table-bordered table-striped table-condensed table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>CI - RUC</th>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>Telefono</th>
                                                        <th>Dirección</th>
                                                        
                                                        <th class="text-center">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($clientes as $cli) { ?>
                                                    <tr>
                                                        <td data-title="#"> <?php echo $cli['cli_cod'];?></td>
                                                        <td data-title="CI - RUC"> <?php echo $cli['cli_ci'];?></td>
                                                        <td data-title="Nombre"> <?php echo $cli['cli_nombre'];?></td>
                                                        <td data-title="Apellido"> <?php echo $cli['cli_apellido'];?></td>
                                                        <td data-title="Telefono"> <?php echo $cli['cli_telefono'];?></td>
                                                        <td data-title="Dirección"> <?php echo $cli['cli_direcc'];?></td>
                                                        <td data-title="Acciones" class="text-center">
                                                            <a href="cliente_edit.php?vcli_cod=<?php echo $cli['cli_cod']; ?>" class="btn btn-warning btn-sm" role="button" data-title="Editar" rel="tooltip" data-placement="top">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                            </a>
                                                            <a href="cliente_del.php?vcli_cod=<?php echo $cli['cli_cod']; ?>" class="btn btn-danger btn-sm" role="button" data-title="Borrar" rel="tooltip" data-placement="top">
                                                                    <span class="glyphicon glyphicon-trash"></span>
                                                                </a>
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
                                            No se han registrado clientes...
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
