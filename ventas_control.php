<?php
require 'clases/conexion.php';
session_start();

$sql = "select sp_ventas(".$_REQUEST['accion'].", ".$_REQUEST['vven_cod'].", ".(!empty($_REQUEST['vcli_cod'])?$_REQUEST['vcli_cod']:"0").", '".$_REQUEST['vtipo_venta']."', "
        .(!empty($_REQUEST['vcan_cuota'])?$_REQUEST['vcan_cuota']:"0").", "
        .(!empty($_REQUEST['vven_plazo'])?$_REQUEST['vven_plazo']:"0").")as resul";


$resultado = consultas::get_datos($sql);

if($resultado[0]['resul']!=null) {
    $_SESSION['mensaje'] = $resultado[0]['resul'];
    header("location:ventas_index.php");
}else{
    $_SESSION['mensaje'] = "Error al procesar \n".$sql;
    header("location:ventas_index.php");
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

