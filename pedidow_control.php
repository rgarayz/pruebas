<?php
session_start();
$arreglo = $_SESSION['carrito'];
require 'clases/conexion.php';
var_dump($_SESSION['carrito']);

$fecha = date('Y-m-d');
$sql = "INSERT INTO pedido_cabventa(ped_cod, ped_fecha, emp_cod, cli_cod, estado, id_sucursal) VALUES ((select coalesce(max(ped_cod),0)+1 from pedido_cabventa), '$fecha', 2, ".$_SESSION['cli_cod'].", 'P', 1)";

if (consultas::ejecutar_sql($sql)){
    $_SESSION['mensaje']=$mensaje;
    header("Location:detallew_control.php");
}else{
  
    $_SESSION['mensaje']='error al procesar ' .$sql;
    header("location:checkout.php");
}

?>


 