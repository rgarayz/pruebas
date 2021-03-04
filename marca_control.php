<?php
require 'clases/conexion.php';


$sql = "select sp_marca(".$_REQUEST['accion'].",".$_REQUEST['vmar_cod'].",'".$_REQUEST['vmar_descri']."') as resul;";

session_start();
$resultado = consultas::get_datos($sql);

if($resultado[0]['resul']!=null) {
    $_SESSION['mensaje'] = $resultado[0]['resul'];
    header("location:marca_index.php");
}else{
    $_SESSION['mensaje'] = "Error al procesar \n".$sql;
    header("location:marca_index.php");
}




