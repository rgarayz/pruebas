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
                                <h3 class="box-title">Sucursales</h3>
                                    <div class="box-tools">
                                        <a href="suc_print.php" class="btn btn-default pull-right btn-sm" role="button" data-title ="Imprimir" rel="tooltip" data-placement="top" target="print">
                                            <i class="fa fa-print"></i>
                                        </a>
                                        <a class="btn btn-primary pull-right btn-sm" rel="tooltip" data-title="Agregar" data-placement="top"
                                           data-toggle="modal" data-target="#registrar">
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
                                        <form action="suc_index.php" method="POST" accept-charset="utf-8" class="form-horizontal">
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
                                        $va = '';
                                        if(isset($_REQUEST['buscar'])) {
                                            $va = $_REQUEST['buscar'];
                                        }
     
                                        $sucursal = consultas::get_datos("select *from sucursal where (id_sucursal||suc_descri) ilike '%".$va."%' order by id_sucursal");
                                        if (!empty($sucursal)) {?>
                                        
                                        <div class="table-responsive">
                                            <div class="text-center">
                                                <table class="table col-lg-12 col-md-12 col-xs-12 table-bordered table-striped table-condensed table-hover ">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center">#</th>
                                                        <th style="text-align:center">Sucursal</th>
                                                        <th class="text-center">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($sucursal as $suc) { ?>
                                                    <tr>
                                                        <td data-title="#"> <?php echo $suc['id_sucursal'];?></td>
                                                        <td data-title="Descripcion"><?php echo $suc['suc_descri'];?></td>
                                                        <td data-title="Acciones" class="text-center">
                                                            <a onclick="editar(<?php echo "'".$suc['id_sucursal']."_".$suc['suc_descri']."'" ?>)" class="btn btn-warning btn-sm" role="button" data-title="Editar" rel="tooltip" data-placement="top"
                                                               data-toggle="modal" data-target="#editar">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                            </a>
                                                            <a onclick="borrar(<?php echo "'".$suc['id_sucursal']."_".$suc['suc_descri']."'" ?>)" class="btn btn-danger btn-sm" role="button" data-title="Borrar" rel="tooltip" data-placement="top"
                                                               data-toggle="modal" data-target="#borrar">
                                                                    <span class="glyphicon glyphicon-trash"></span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        </div>
                                        <?php }else{ ?>
                                        <div class="alert alert-info flat">
                                            <span class="glyphicon glyphicon-info-sign"></span>
                                            No se han registrado sucursales...
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
        <--fORMULARIO MODAL ADD-->
        <div class="modal fade" id="registrar" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
                        <h4 class="modal-title"><strong><i class="fa fa-file"></i>
                                Registrar Sucursal</strong></h4>
                    </div> 
                    <form action="suc_control.php" method="POST" accept-charset="utf-8" class="form-horizontal">
                        <input name="accion" value="1" type="hidden"/>
                        <input name="vid_sucursal" value="0" type="hidden">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-2 col-lg-2 control-label">Descripción</label>
                                <div class="col-sm-10 col-sm-10">
                                    <input type="text" class="form-control" autofocus="" name="vsuc_descri" required="">
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
                                Editar Sucursal</strong></h4>
                    </div> 
                    <form action="suc_control.php" method="POST" accept-charset="utf-8" class="form-horizontal">
                        <input name="accion" value="2" type="hidden"/>
                        <input name="vid_sucursal" id="cod" type="hidden">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 col-lg-2 control-label">Descripción</label>
                                <div class="col-sm-10 col-sm-10">
                                    <input type="text" class="form-control" name="vsuc_descri" required="" id="descri">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" data-dismiss="modal" class="btn btn-default pull-left"><i class="fa fa-close"></i>Cerrar</button>
                            <button type="submit" class="btn btn-warning pull-right"><i class="fa fa-edit"></i>
                                Actualizar</button>
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
                $('#si').attr('href','suc_control.php?vid_sucursal='+dat[0]+'&vsuc_descri='+dat[1]+'&accion=3');
                $('#confirmacion').html('<span class="glyphicon glyphicon-question-sign"></span> \n\
                Desea borrar la sucursal <i><strong>'+dat[1]+'</strong></i>?');
                
            }
        </script>
    </div>
</body> 
</html>
