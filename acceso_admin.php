<?php
require './clases/conexion.php';

//echo $_REQUEST['usuario']."</br>";
//echo $_REQUEST['clave'];
        

$sql = "select * from v_usuarios where usu_nick = '".$_REQUEST['usuario']."' and usu_clave = '".$_REQUEST['clave']."'";

$resultado = consultas::get_datos($sql);

session_start();

if($resultado[0]['usu_cod'] == null){
    $_SESSION['error'] = 'Usuario o contraseña incorrectos';
    header('location:acceso_admin.php');   
}else{
    $_SESSION['usu_cod'] = $resultado[0]['usu_cod'];
    $_SESSION['usu_nick'] = $resultado[0]['usu_nick'];
    $_SESSION['usu_foto'] = 'img/ava.png';
    $_SESSION['emp_cod'] = $resultado[0]['emp_cod'];
    $_SESSION['nombres'] = $resultado[0]['empleado'];
    $_SESSION['cargo'] = $resultado[0]['car_descri'];
    $_SESSION['gru_cod'] = $resultado[0]['gru_cod'];
    $_SESSION['grupo'] = $resultado[0]['gru_nombre'];
    $_SESSION['id_sucursal'] = $resultado[0]['id_sucursal'];
    $_SESSION['sucursal'] = $resultado[0]['suc_descri'];
    
    header('location:menu.php');
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

