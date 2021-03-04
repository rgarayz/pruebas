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
                                <h3 class="box-title">Borrar Artículos</h3>
                                    <div class="box-tools">
                                        <a href="articulo_index.php" class="btn btn-primary pull-right btn-sm" data-title="Volver" rel="tooltip" data-placement="top">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>
                                </div>
                            </div>
                            <form action="articulo_control.php" method="POST" accept-charset="utf-8" class="form-horizontal">
                                <div class="box-body">
                                    <?php $articulos= consultas::get_datos("select * from articulo where art_cod=".$_REQUEST['vart_cod']); 
                                        ?>
                                    <input type="hidden" name="accion" value="3">
                                    <input type="hidden" name="vart_cod" value="<?php echo $articulos[0]['art_cod']; ?>">
                                    <div class="form-group has-feedback">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2">Cod. Barra: </label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input type="text" class="form-control" name="vart_codbarra" value="<?php echo $articulos[0]['art_codbarra']; ?>" readonly="">
                                            <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2">Marca: </label>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group">
                                                   <?php $marcas = consultas::get_datos("select * from marca order by mar_cod");?>
                                                    <select class="form-control select2" name="vmar_cod" required="" readonly="">
                                                    <?php if(!empty($marcas)) {
                                                    foreach ($marcas as $mar){ ?>
                                                    <option  value="<?php echo $mar['mar_cod']; ?>"><?php echo $mar['mar_descri']; ?></option>
                                                    <?php }
                                                    }else{ ?>
                                                    <option value="" >Debe insertar al menos una marca</option>
                                                    <?php } ?>
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2">Descripción: </label>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <input type="text" class="form-control" name="vart_descri" readonly="" value="<?php echo $articulos[0]['art_descri']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2">Precio Compra: </label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input type="number" class="form-control" name="vart_precioc" readonly="" value="<?php echo $articulos[0]['art_precioc']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2"> Precio Venta: </label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input type="number" class="form-control" name="vart_preciov" readonly="" value="<?php echo $articulos[0]['art_preciov']; ?>">
                                        </div>
                                    </div>   
                                </div>
                                <div class="from-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2">Impuesto:</label>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="input-group">
                                                   <?php $tipos = consultas::get_datos("select * from tipo_impuesto order by tipo_cod");?>
                                                    <select class="form-control select2" name="vtipo_cod" required="" readonly="">
                                                    <?php if(!empty($tipos)) {
                                                    foreach ($tipos as $tipo){ ?>
                                                    <option value="<?php echo $tipo['tipo_cod']; ?>"><?php echo $tipo['tipo_descri']; ?></option>
                                                    <?php }
                                                    }else{ ?>
                                                    <option value="">Debe insertar al menos un impuesto</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-danger pull-left">
                                        <span class="glyphicon glyphicon-floppy-remove"></span> Borrar
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
                                Registrar Marca</strong></h4>
                    </div> 
                    <form action="articulo_control.php" method="POST" accept-charset="utf-8" class="form-horizontal">
                        <input name="accion" value="4" type="hidden"/>
                        <input name="vmar_cod" value="0" type="hidden">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-2 col-lg-2 control-label">Descripción</label>
                                <div class="col-sm-10 col-sm-10">
                                    <input type="text" class="form-control" autofocus="" name="vart_descri" required="">
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
