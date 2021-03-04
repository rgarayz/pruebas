<?php
require 'clases/conexion.php';

session_start();

switch ($_REQUEST['accion']){
    case 1:
        $sql = "insert into modulos(mod_cod,mod_nombre)values((select coalesce(max(mod_cod),0)+1 from modulos),'".$_REQUEST['vmod_nombre']."')";
        $mensaje='se ha registrado el modulos';
        break;
    case 2:
        $sql = "update modulos set mod_nombre = '".$_REQUEST['vmod_nombre']."' where mod_cod=".$_REQUEST['vmod_cod'];
        $mensaje='se ha modificado correctamente el modulo';
        break;
    case 3:
        $sql = "delete from modulos where mod_cod= ".$_REQUEST['vmod_cod'];
        $mensaje='se borro correctamente el modulos';
      }
if (consultas::ejecutar_sql($sql)){
    $_SESSION['mensaje']=$mensaje;
    header("location:modulos_index.php");
}else{
  
    $_SESSION['mensaje']='error al procesar ' .$sql;
    header("location:modulos_index.php");
}
?>