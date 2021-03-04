<?php
require 'clases/conexion.php';
session_start();

$sql = "select sp_sucursal(".$_REQUEST['accion'].",".$_REQUEST['vid_sucursal'].",'".$_REQUEST['vsuc_descri']."') as resul;";

$resultado = consultas::get_datos($sql);


if($resultado[0]['resul']!=null) {
    $_SESSION['mensaje'] = $resultado[0]['resul'];
    header("location:suc_index.php");
}else{
    $_SESSION['mensaje'] = "Error al procesar \n".$sql;
    header("lcoation:suc_index.php");
}




