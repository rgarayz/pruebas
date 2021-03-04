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
                                <h3 class="box-title">Agregar Deposito</h3>
                                    <div class="box-tools">
                                        <a href="deposito_index.php" class="btn btn-primary pull-right btn-sm" data-title="Volver" rel="tooltip" data-placement="top">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>
                                </div>
                            </div>
                            <form action="deposito_control.php" method="POST" accept-charset="utf-8" class="form-horizontal">
                                <div class="box-body">
                                    <input type="hidden" name="accion" value="1">
                                    <input type="hidden" name="vdep_cod" value="0">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2">Codigo </label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input type="number" class="form-control" name="vdep_cod" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2">Descripción: </label>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <input type="text" class="form-control" name="vdep_descri" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2">Sucursal: </label>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group">
                                                   <?php $sucursal = consultas::get_datos("select * from sucursal order by id_sucursal");?>
                                                    <select class="form-control select2" name="vid_sucursal" required="">
                                                    <?php if(!empty($sucursal)) {
                                                    foreach ($sucursal as $suc){ ?>
                                                    <option value="<?php echo $suc['id_sucursal']; ?>"><?php echo $suc['suc_descri']; ?></option>
                                                    <?php }
                                                    }else{ ?>
                                                    <option value="">Debe insertar al menos una sucursal</option>
                                                    <?php } ?>
                                                </select>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary btn-flat" type="button" data-toggle="modal" data-target="#registrar" data-title="Agregar Sucursal" rel="tooltip">
                                                            <i class="fa fa-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
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
                    <form action="deposito_control.php" method="POST" accept-charset="utf-8" class="form-horizontal">
                        <input name="accion" value="4" type="hidden"/>
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
        </div>
        <?php require 'menu/js_lte.ctp'; ?>
    </div>
</body> 
</html>
