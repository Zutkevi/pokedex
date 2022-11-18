<?php
// Conexion por medio lo localhost (para pruebas)
$host="localhost";
$user="root";
$pass="";
$db="api";

$conexion=mysqli_connect($host, $user, $pass, $db);
/*
if($conexion){
    echo'conectada correctamente';
}else{
    echo'error';
}
*/
?>