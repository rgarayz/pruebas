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
                        <div class="box box-danger">
                            <div class="box-header">
                                <i class="fa fa-trash"></i>
                                <h3 class="box-title">Borrar Proveedor</h3>
                                    <div class="box-tools">
                                        <a href="proveedor_index.php" class="btn btn-primary pull-right btn-sm" data-title="Volver" rel="tooltip" data-placement="top">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>
                                </div>
                            </div>
                            <form action="proveedor_control.php" method="POST" accept-charset="utf-8" class="form-horizontal">
                                <div class="box-body">
                                    <?php $proveedor= consultas::get_datos("select *from proveedor where prv_cod=".$_REQUEST['vprv_cod']); 
                                        ?>
                                    
                                    <input type="hidden" name="accion" value="3">
                                    <input type="hidden" name="vprv_cod" value="<?php echo $proveedor[0]['prv_cod']; ?>">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2"> C.I. - RUC N°: </label>
                                        
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input type="text" class="form-control" name="vprv_ruc" required="" readonly=""
                                                   value="<?php echo $proveedor[0]['prv_ruc']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2"> Razón Social </label>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <input type="text" class="form-control" name="vprv_razonsocial" required="" accept="" readonly=""
                                                   value="<?php echo $proveedor[0]['prv_razonsocial']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2"> Dirección: </label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <textarea class="form-control" name="vprv_direccion" rows="3" readonly=""><?php echo $proveedor[0]['prv_direccion']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2"> Teléfono: </label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input type="text" class="form-control" name="vPRV_telefono" readonly=""
                                                   value="<?php echo $proveedor[0]['prv_telefono']; ?>">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-danger pull-left">
                                        <span class="fa fa-trash"></span> Borrar
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
