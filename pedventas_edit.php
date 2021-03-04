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
                        <div class="box box-warning">
                            <div class="box-header">
                                <i class="fa fa-edit"></i>
                                <h3 class="box-title">Modificar Pedido de Ventas</h3>
                                    <div class="box-tools">
                                        <a href="pedventas_index.php" class="btn btn-primary pull-right btn-sm" data-title="Volver" rel="tooltip" data-placement="top">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>
                                </div>
                            </div>

                            <div class="box-body">
                                <?php if(!empty($_SESSION['mensaje'])) { ?>
                            <div class="alert alert-success" role="alert" id="mensaje">
                                <span class="glyphicon glyphicon-ok-sign"></span>
                                <?php echo $_SESSION['mensaje'];
                                $_SESSION['mensaje']= null; ?>
                            </div>
                            <?php } ?>
                                <form action="pedventas_control.php" method="POST" accept-charset="utf-8" class="form-horizontal">
                                   <?php $pedidos = consultas::get_datos("select *from v_pedido_cabventa where ped_cod=".$_REQUEST['vped_cod']);?>
                                    <input type="hidden"  name="accion" value="2">
                                    <input type="hidden"  name="vped_cod" value="<?php echo $pedidos[0]['ped_cod'];?>">
                                    <div class="box-body">
                                        <div class="row margin">
                                            <div class="col-md-3 col-xs-3 col-lg-3">
                                                <label>Fecha:</label>
                                                <input type="text" name="vped_fecha" class="form-control" required="" readonly="" value="<?php echo $pedidos[0]['ped_fecha']; ?>">
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                                                <label> Clientes:</label>
                                                <div class="input-group">
                                                    <?php $clientes = consultas::get_datos("select * from clientes order by cli_cod =".$pedidos[0]['cli_cod']." desc"); ?>
                                                    <select class="form-control select2" name="vcli_cod" required="">
                                                        <?php if (!empty($clientes)) {
                                                            foreach ($clientes as $cli) {
                                                                ?>
                                                                <option value="<?php echo $cli['cli_cod']; ?>"><?php echo $cli['cli_nombre'] . " " . $cli['cli_apellido']; ?></option>
                                                            <?php }
                                                        } else {
                                                            ?>
                                                            <option value="">Debe insertar al menos un cliente</option>
                                                            <?php } ?>
                                                    </select>
                                                    <span class="input-group-btn">
                                                        
                                                    </span>
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="row margin">
                                            <div class="col-md-3 col-xs-3 col-lg-3 col-md-3">
                                                <label> Empleado:</label>
                                                <input type="text" name="vempleado" class="form-control" readonly="" required="" value="<?php echo $pedidos[0]['empleado']; ?>" >
                                            </div>
                                            <div class="col-md-3 col-xs-3 col-lg-3 col-md-3">
                                                <label>Sucursal:</label>
                                                <input type="text" name="vsucursal" class="form-control" readonly="" required="" value="<?php echo $pedidos[0]['suc_descri']; ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-warning pull-right">
                                            <i class="fa fa-save"></i> Modificar
                                        </button> 
                                    </div>
                                    
                                </form>
                                
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
