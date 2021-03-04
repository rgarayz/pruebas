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
                                <h3 class="box-title">Editar Marca</h3>
                                    <div class="box-tools">
                                        <a href="marca_index.php" class="btn btn-warning pull-right btn-sm" data-title="Volver" rel="tooltip" data-placement="top">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>
                                </div>
                            </div>
                            <form action="marca_control.php" method="POST" accept-charset="utf-8" class="form-horizontal">
                                <?php $marcas = consultas::get_datos("select * from marca where mar_cod=".$_REQUEST['vmar_cod']); ?>
                                <div class="box-body">
                                    <input type="hidden" name="accion" value="2">
                                    <input type="hidden" name="vmar_cod" value="<?php echo $marcas[0]['mar_cod'] ?>">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2"> Descripción</label>
                                        <div class="col-lg-8 col-md-6">
                                            <input type="text" class="form-control" name="vmar_descri" required="" autofocus="" value="<?php echo $marcas[0]['mar_descri'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-warning pull-right">
                                        <span class="glyphicon glyphicon-floppy-save"></span> Actualizar
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
