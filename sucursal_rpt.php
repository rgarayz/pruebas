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
                                <h3 class="box-title">Informe de Sucursal</h3>
                                    <div class="box-tools">
                                       
                                </div>
                            </div>
                            
                            <div class="box-body no-padding">
                                <div class="row">
                                    <?php $opcion = (isset($_REQUEST['opcion'])?$_REQUEST['opcion']:"2");?>
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        
                                        <form action="suc_print.php" method="get" accept-charset="utf-8" class="form-horizontal">
                                            <input type="hidden" value="<?php echo $opcion;?>" name="opcion">
                                            <div class="box-body">
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">
                                                            <strong>Opciones</strong>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="list-group">
                                                                <a href="sucursal_rpt.php?opcion=1" class="list-group-item">Por código</a>
                                                                <a href="sucursal_rpt.php?opcion=2" class="list-group-item">Por Descripción</a>

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
                                                            <?php $sucursal= consultas::get_datos("SELECT * FROM sucursal ORDER BY id_sucursal");?>
                                                            <div class="form-group">
                                                                <label class="col-md-2 col-lg-2 control-label">Desde:</label>
                                                                <div class="col-md-6 col-lg-6" >
                                                                    <select class="form-control select2" name="vdesde">
                                                                        <?php foreach ($sucursal as $suc) { ?>
                                                                        <option value="<?php echo ($opcion==1)? $suc['id_sucursal']:$suc['suc_descri'];?>">
                                                                                        <?php echo ($opcion==1)?$suc['id_sucursal']:$suc['suc_descri'];?></option>
                                                                                        <?php }?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Hasta:</label>
                                                                <div class="col-md-6">
                                                                    <select class="form-control select2" name="vhasta">
                                                                        <?php foreach ($sucursal as $suc) { ?>
                                                                        <option value="<?php echo ($opcion==1)? $suc['id_sucursal']:$suc['suc_descri'];?>">
                                                                                        <?php echo ($opcion==1)?$suc['id_sucursal']:$suc['suc_descri'];?></option>
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
