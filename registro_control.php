<?php
require 'clases/conexion.php';

$sql = "INSERT INTO clientes (cli_cod, cli_nombre, cli_apellido, cli_telefono, cli_direcc, cli_email, cli_pass)"
            . "VALUES  ((select coalesce(max(cli_cod),0)+1 from clientes), '".$_REQUEST['nombre']."', '".$_REQUEST['apellido']."', '".$_REQUEST['telefono']."', '".$_REQUEST['dir']."', '".$_REQUEST['email']."', '".$_REQUEST['password']."')";

            

if (consultas::ejecutar_sql($sql)){
    $_SESSION['mensaje']=$mensaje;
    header("location:login.php");
}else{
  
    $_SESSION['mensaje']='error al procesar ' .$sql;
    header("location:login.php");
}

?>

