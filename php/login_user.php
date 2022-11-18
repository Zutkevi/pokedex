<?php

session_start();

include 'con_db.php';

$email=$_POST['email'];
$pass=$_POST['pass'];
$pass= hash('sha512', $pass);

// validacion de login

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$email' and pass='$pass' ");

if(mysqli_num_rows($validar_login) >0){
    $_SESSION['usuario'] = $email;
    header("Location:../page/marvel_api.php");
    exit;
}else{
    echo '
        <script>
            alert("Error al iniciar sesion, verifica la información e intentalo nuevamente");
            window.location = "../index.php"; 
        </script>
    ';
    exit;
}

?>