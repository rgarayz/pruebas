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
                                <i class="fa fa-trash"></i>
                                <h3 class="box-title">Borrar Sucursal</h3>
                                    <div class="box-tools">
                                        <a href="suc_index.php" class="btn btn-danger pull-right btn-sm" data-title="Volver" rel="tooltip" data-placement="top">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>
                                </div>
                            </div>
                            <form action="suc_control.php" method="POST" accept-charset="utf-8" class="form-horizontal">
                                <?php $sucursal = consultas::get_datos("select * from sucursal where id_sucursal=".$_REQUEST['vid_sucursal']); ?>
                                <div class="box-body">
                                    <input type="hidden" name="accion" value="3">
                                    <input type="hidden" name="vid_sucursal" value="<?php echo $sucursal[0]['id_sucursal'] ?>">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2"> Descripción</label>
                                        <div class="col-lg-8 col-md-6">
                                            <input type="text" class="form-control" name="vsuc_descri" required="" readonly="" value="<?php echo $sucursal[0]['suc_descri'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-danger pull-right">
                                        <span class="glyphicon glyphicon-trash"></span> Borrar
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
