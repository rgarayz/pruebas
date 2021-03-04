<?php
require 'clases/conexion.php';
$arreglo = $_SESSION['carrito'];

$sql = "INSERT INTO detalle_pedventa(ped_cod, dep_cod, art_cod, ped_cant, ped_precio) VALUES ((select coalesce(max(ped_cod),0)+1 from detalle_pedventa), 2, ".$arreglo['Id'].",".$arreglo['Cantidad']." ,".$arreglo['Precio'].")";


if (consultas::ejecutar_sql($sql)){
    $_SESSION['mensaje']=$mensaje;
    header("Location:webApp.php");
}else{
  
    $_SESSION['mensaje']='error al procesar ' .$sql;
    header("location:checkout.php");
}