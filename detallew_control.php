<?php
session_start();
$arreglo = '';
$_SESSION['carrito']=$arreglo;
require 'clases/conexion.php';
var_dump($_SESSION['carrito']);


$sql = "INSERT INTO detalle_pedventa(ped_cod, dep_cod, art_cod, ped_cant, ped_precio) VALUES ((select coalesce(max(ped_cod)) from detalle_pedventa), 1,".$arreglo['Id']." ,".$arreglo['Cantidad'].", ".$arreglo['Precio'].")";

if (consultas::ejecutar_sql($sql)){
    $_SESSION['mensaje']=$mensaje;
    header("Location:thankyou.php");
}else{
  
    $_SESSION['mensaje']='error al procesar ' .$sql;
    header("location:checkout.php");
}

?>