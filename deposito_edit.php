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
                                <h3 class="box-title">Editar Deposito</h3>
                                    <div class="box-tools">
                                        <a href="deposito_index.php" class="btn btn-primary pull-right btn-sm" data-title="Volver" rel="tooltip" data-placement="top">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>
                                </div>
                            </div>
                            <form action="deposito_control.php" method="POST" accept-charset="utf-8" class="form-horizontal">
                                <div class="box-body">
                                    <?php $deposito= consultas::get_datos("select *from deposito where dep_cod=".$_REQUEST['vdep_cod']); 
                                        ?>
                                    
                                    <input type="hidden" name="accion" value="2">
                                    <input type="hidden" name="vdep_cod" value="<?php echo $deposito[0]['dep_cod']; ?>">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2"> Código: </label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input type="text" class="form-control" name="vdep_cod" readonly="" 
                                                   value="<?php echo $deposito[0]['dep_cod']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2"> Descripción: </label>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <input type="text" class="form-control" name="vdep_descri" required=""  autofocus=""
                                                   value="<?php echo $deposito[0]['dep_descri']; ?>">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2"> Cod. Sucursal </label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input type="text" class="form-control" name="vid_sucursal"
                                                   value="<?php echo $deposito[0]['id_sucursal']; ?>">
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-warning pull-left">
                                        <span class="fa fa-edit"></span> Actualizar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>  
            </div>  
        </div>
        <?php require 'menu/footer_lte.ctp'; ?>
        </div>
        <?php require 'menu/js_lte.ctp'; ?>
    </div>
</body> 
</html>
