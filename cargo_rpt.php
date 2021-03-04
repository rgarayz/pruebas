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
                                <h3 class="box-title">Informe de Cargo</h3>
                                    <div class="box-tools">
                                       
                                </div>
                            </div>
                            
                            <div class="box-body no-padding">
                                <div class="row">
                                    <?php $opcion = (isset($_REQUEST['opcion'])?$_REQUEST['opcion']:"2");?>
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        
                                        <form action="cargo_print.php" method="get" accept-charset="utf-8" class="form-horizontal">
                                            <input type="hidden" value="<?php echo $opcion;?>" name="opcion">
                                            <div class="box-body">
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">
                                                            <strong>Opciones</strong>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="list-group">
                                                                <a href="cargo_rpt.php?opcion=1" class="list-group-item">Por código</a>
                                                                <a href="cargo_rpt.php?opcion=2" class="list-group-item">Por Descripción</a>

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
                                                            <?php $cargo= consultas::get_datos("SELECT * FROM cargo ORDER BY car_cod");?>
                                                            <div class="form-group">
                                                                <label class="col-md-2 col-lg-2 control-label">Desde:</label>
                                                                <div class="col-md-6 col-lg-6" >
                                                                    <select class="form-control select2" name="vdesde">
                                                                        <?php foreach ($cargo as $car) { ?>
                                                                        <option value="<?php echo ($opcion==1)? $car['car_cod']:$car['car_descri'];?>">
                                                                                        <?php echo ($opcion==1)?$car['car_cod']:$car['car_descri'];?></option>
                                                                                        <?php }?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Hasta:</label>
                                                                <div class="col-md-6">
                                                                    <select class="form-control select2" name="vhasta">
                                                                        <?php foreach ($cargo as $car) { ?>
                                                                        <option value="<?php echo ($opcion==1)? $car['car_cod']:$car['car_descri'];?>">
                                                                                        <?php echo ($opcion==1)?$car['car_cod']:$car['car_descri'];?></option>
                                                                                        <?php }?>
                                                                    </select>
                                                                </div>
                                                            </div>
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
        <--fORMULARIO MODAL ADD-->
        <div class="modal fade" id="registrar" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
                        <h4 class="modal-title"><strong><i class="fa fa-file"></i>
                                Registrar marca</strong></h4>
                    </div> 
                    <form action="marca_control.php" method="POST" accept-charset="utf-8" class="form-horizontal">
                        <input name="accion" value="1" type="hidden"/>
                        <input name="vmar_cod" value="0" type="hidden">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-2 col-lg-2 control-label">Descripción</label>
                                <div class="col-sm-10 col-sm-10">
                                    <input type="text" class="form-control" autofocus="" name="vmar_descri" required="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" data-dismiss="modal" class="btn btn-default pull-left"><i class="fa fa-close"></i>Cerrar</button>
                            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>
                                Registrar</button>
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
