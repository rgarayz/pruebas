<?php
require 'clases/conexion.php';
session_start();

$sql = "select sp_articulo1(".$_REQUEST['accion'].",".$_REQUEST['vart_cod'].", '".$_REQUEST['vart_codbarra']."',".$_REQUEST['vmar_cod']
        .",'".$_REQUEST['vart_descri']."',".$_REQUEST['vart_precioc'].", ".$_REQUEST['vart_preciov'].", ".$_REQUEST['vtipo_cod'].", '".$_REQUEST['vart_imagen']."') as resul";

$resultado = consultas::get_datos($sql);

if($resultado[0]['resul']!=null) {
    $_SESSION['mensaje'] = $resultado[0]['resul'];
    header("location:articulo_index.php");
}else{
    $_SESSION['mensaje'] = "Error al procesar \n".$sql;
    header("location:articulo_index.php");
}



