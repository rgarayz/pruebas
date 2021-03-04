<?php
require './clases/conexion.php';



$sql = "select * from clientes where cli_email = '".$_REQUEST['email']."' and cli_pass = '".$_REQUEST['password']."'";




$resultado = consultas::get_datos($sql);

session_start();

if($resultado[0]['cli_cod'] == null){
    $_SESSION['error'] = 'Email o contraseña incorrectos';
    header('location:login.php');   
}else{
    $_SESSION['cli_cod'] = $resultado[0]['cli_cod'];
    $_SESSION['cli_nombre'] = $resultado[0]['cli_nombre'];
    $_SESSION['cli_email'] = $resultado[0]['cli_email'];
    $_SESSION['cli_apellido'] = $resultado[0]['cli_apellido'];
    $_SESSION['cli_telefono'] = $resultado[0]['cli_telefono'];
    $_SESSION['cli_direcc'] = $resultado[0]['cli_direcc'];
    $_SESSION['cli_pass'] = $resultado[0]['cli_pass'];
    
  

    header('location:webApp.php');
    
}




