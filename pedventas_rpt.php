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
                                <i class="fa fa-list"></i>
                                <h3 class="box-title">Informe de Pedido de Ventas</h3>
                                    <div class="box-tools">
                                       
                                </div>
                            </div>
                            
                            <div class="box-body no-padding">
                                <div class="row">
                                    <?php $opcion = (isset($_REQUEST['opcion'])?$_REQUEST['opcion']:"2");?>
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        
                                        <form action="pedventas_print.php" method="get" accept-charset="utf-8" class="form-horizontal">
                                            <input type="hidden" value="<?php echo $opcion;?>" name="opcion">
                                            <div class="box-body">
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">
                                                            <strong>Opciones</strong>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="list-group">
                                                                <a href="pedventas_rpt.php?opcion=1" class="list-group-item">Por Fecha</a>
                                                                <a href="pedventas_rpt.php?opcion=2" class="list-group-item">Por Cliente</a>
                                                                <a href="pedventas_rpt.php?opcion=3" class="list-group-item">Por Artículo</a>
                                                                 <a href="pedventas_rpt.php?opcion=4" class="list-group-item">Por Empleado</a>
                                                                <!-- <a href="pedventas_rpt.php?opcion=5" class="list-group-item">Por Sucursal</a> -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-8">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">
                                                            <strong>Filtros</strong>
                                                        </div>
                                                        
                                                        <div class="panel-body">
                                                            <?php
                                                                switch ($opcion) {
                                                                    case 1:  ?>
                                                                        <div class="form-group has-feedback">
                                                                            <label class="col-md-2 col-lg-2 control-label">Desde:</label>
                                                                                <div class="col-md-6 col-lg-6" >
                                                                                    <input type="date" class="form-control" name="vdesde" autofocus="" >
                                                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                                                </div>
                                                                        </div>
                                                                    <div class="form-group has-feedback">
                                                                            <label class="col-md-2 col-lg-2 control-label">Hasta:</label>
                                                                                <div class="col-md-6 col-lg-6" >
                                                                                    <input type="date" class="form-control" name="vhasta" autofocus="" >
                                                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                                                </div>
                                                                        </div>  
                                                                <?php        break;
                                                                    case 2:    
                                                                        $clientes = consultas::get_datos("select * from clientes where cli_cod in(select cli_cod from pedido_cabventa)");
                                                                        ?>
                                                                        <div class="form-group">
                                                                            <label class="col-md-2 control-label">Cliente:</label>
                                                                            <div class="col-md-6">
                                                                                <select class="form-control select2" name="vcliente">
                                                                                    <?php foreach ($clientes as $cli) { ?>
                                                                                    <option value="<?php echo $cli['cli_cod'];?>">
                                                                                                    <?php echo $cli['cli_nombre']." ".$cli['cli_apellido'];?></option>
                                                                                                    <?php }?>
                                                                                </select>
                                                                            </div>
                                                                        </div>        
                                                                <?php        break;
                                                                    case 3:
                                                                        $articulos = consultas::get_datos("select * from vi_articulo where art_cod in(select art_cod from detalle_pedventa)");
                                                                        ?>                                                          
                                                                            <div class="form-group">
                                                                                <label class="col-md-2 control-label">Artículos:</label>
                                                                                <div class="col-md-6">
                                                                                    <select class="form-control select2" name="varticulo">
                                                                                        <?php foreach ($articulos as $art) { ?>
                                                                                        <option value="<?php echo $art['art_cod'];?>">
                                                                                                        <?php echo $art['art_descri']." ".$art['mar_descri'];?></option>
                                                                                                        <?php }?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        
                                                                <?php        break;
                                                                        
                                                                    case 4:
                                                                        $empleados = consultas::get_datos("select * from empleado where emp_cod in(select emp_cod from pedido_cabventa)");
                                                                        ?>
                                                                            <div class="form-group">
                                                                                <label class="col-md-2 control-label">Empleados:</label>
                                                                                <div class="col-md-6">
                                                                                    <select class="form-control select2" name="vempleado">
                                                                                        <?php foreach ($empleados as $emp) { ?>
                                                                                        <option value="<?php echo $emp['emp_cod'];?>">
                                                                                                        <?php echo $emp['emp_nombre']." ".$emp['emp_apellido'];?></option>
                                                                                                        <?php }?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                                                                
                                                                <?php       break;
                                                                }
                                                            ?>
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-primary pull-right">
                                                    <i class="fa fa-print"></i> Listar
                                                </button>
                                            </div>
                                        </form>
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
        <script>
            $('.modal').on('shown.bs.modal', function(){
               $(this).find('input:text:visible:first').focus(); 
            });
        </script>
        <script>
            function editar(datos){
                var dat = datos.split("_");
               $('#cod').val(dat[0]);
               $('#descri').val(dat[1]);
            };
            function borrar(datos){
                var dat = datos.split("_");
                $('#si').attr('href','marca_control.php?vmar_cod='+dat[0]+'&vmar_descri='+dat[1]+'&accion=3');
                $('#confirmacion').html('<span class="glyphicon glyphicon-question-sign"></span> \n\
                Desea borrar la marca <i><strong>'+dat[1]+'</strong></i>?');
            }
        </script>
    </div>
</body> 
</html>
