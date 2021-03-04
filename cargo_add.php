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
                                <h3 class="box-title">Agregar Cargo</h3>
                                    <div class="box-tools">
                                        <a href="cargo_index.php" class="btn btn-primary pull-right btn-sm" data-title="Volver" rel="tooltip" data-placement="top">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>
                                </div>
                            </div>
                            <form action="cargo_control.php" method="POST" accept-charset="utf-8" class="form-horizontal">
                                <div class="box-body">
                                    <input type="hidden" name="accion" value="1">
                                    <input type="hidden" name="vcar_cod" value="0">
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2"> Descripción</label>
                                        <div class="col-lg-8 col-md-6">
                                            <input type="text" class="form-control" name="vcar_descri" required="" autofocus="">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary pull-right">
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
        </div>
        <?php require 'menu/js_lte.ctp'; ?>
    </div>
</body> 
</html>
