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
                                <i class="fa fa-plus"></i>
                                <h3 class="box-title">Agregar Pedido de Ventas</h3>
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
                                    <input type="hidden"  name="accion" value="1">
                                    <input type="hidden"  name="vped_cod" value="0">
                                    <div class="box-body">
                                        <div class="row margin">
                                            <div class="col-md-3 col-xs-3 col-lg-3">
                                                <?php $fecha = consultas::get_datos("select current_date as fecha"); ?>
                                                <label>Fecha:</label>
                                                <input type="date" name="vped_fecha" class="form-control" required="" value="<?php echo $fecha[0]['fecha']; ?>" readonly="">
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                                                <label> Clientes:</label>
                                                <div class="input-group">
                                                    <?php $clientes = consultas::get_datos("select * from clientes order by cli_cod"); ?>
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
                                                        <button class="btn btn-primary btn-flat" type="button" data-toggle="modal" data-target="#registrar" data-title="Agregar Cliente" rel="tooltip">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="row margin">
                                            <div class="col-md-3 col-xs-3 col-lg-3 col-md-3">
                                                <label> Empleado:</label>
                                                <input type="text" name="vempleado" class="form-control" required="" value="<?php echo $_SESSION['nombres']; ?>" readonly="">
                                            </div>
                                            <div class="col-md-3 col-xs-3 col-lg-3 col-md-3">
                                                <label>Sucursal:</label>
                                                <input type="text" name="vsucursal" class="form-control" required="" value="<?php echo $_SESSION['sucursal']; ?>" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary pull-right">
                                            <i class="fa fa-floppy-o"></i> Registrar
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
        <--fORMULARIO MODAL ADD-->
        <div class="modal fade" id="registrar" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
                        <h4 class="modal-title"><strong><i class="fa fa-file"></i>
                                Registrar cliente</strong></h4>
                    </div> 
                               <form action="cliente_control_ven.php" method="POST" accept-charset="utf-8" class="form-horizontal">
                                <div class="box-body">
                                    <input type="hidden" name="accion" value="1">
                                    <input type="hidden" name="vcli_cod" value="0">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2"> C.I. N°: </label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input type="number" class="form-control" name="vcli_ci" required="" autofocus="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2"> Nombres: </label>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <input type="text" class="form-control" name="vcli_nombre" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2"> Apellido: </label>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <input type="text" class="form-control" name="vcli_apellido" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2"> Telefono: </label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input type="text" class="form-control" name="vcli_telefono" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2"> Dirección: </label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <textarea class="form-control" name="vcli_direcc" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success pull-left">
                                        <span class="glyphicon glyphicon-floppy-save"></span> Registrar
                                    </button>
                                </div>
                            </form>
                </div>
            </div>
        </div>
        <--FIN MODAL ADD-->
        
        <--MODAL EDIT-->
        <div class="modal fade" id="editar" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
                        <h4 class="modal-title"><strong><i class="fa fa-edit"></i>
                                Editar marca</strong></h4>
                    </div> 
                    <form action="marca_control.php" method="POST" accept-charset="utf-8" class="form-horizontal">
                        <input name="accion" value="2" type="hidden"/>
                        <input name="vmar_cod" id="cod" type="hidden">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 col-lg-2 control-label">Descripción</label>
                                <div class="col-sm-10 col-sm-10">
                                    <input type="text" class="form-control" name="vmar_descri" required="" id="descri">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" data-dismiss="modal" class="btn btn-default pull-left"><i class="fa fa-close"></i>Cerrar</button>
                            <button type="submit" class="btn btn-warning pull-right"><i class="fa fa-edit"></i>
                                Actualzar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <--FIN MODAL EDIT-->
        
        <--MODAL BORRAR-->
        <div class="modal fade" id="borrar" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
                        <h4 class="modal-title custom_align" id="Heading">Atención!!!</h4>
                    </div>
                        <div class="modal-body">
                            <div class="alert alert-danger" id="confirmacion"></div>
                        </div>
                        <div class="modal-footer">
                            <button  data-dismiss="modal" class="btn btn-default"><i class="fa fa-close"></i>  NO</button>
                            <a id="si" role="buttom" class="btn btn-success">
                                <span class="glyphicon glyphicon-ok-sign"> SI</span>
                            </a>
                        </div>
                </div>
            </div>
        </div>
        <--FIN MODAL BORRAR-->
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
