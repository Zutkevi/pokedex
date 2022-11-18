<?php

session_start();

include 'con_db.php';
// recibir datos por medio del metodo post
$username=$_POST['username'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$pass= hash('sha512', $pass);

// insertar los datos ne la base de datos

$query= "INSERT INTO usuarios (username, email, pass)
         VALUES ('$username', '$email', '$pass')";

// validación para que no se repitan datos

$verificar_username = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username='$username' ");
if(mysqli_num_rows($verificar_username) >0){
    echo '
    <script>
        alert("El nombre de usuario ingresado ya esta en uso, intentalo con otro nuevamente");
        window.location = "../index.php";
    </script>
    ';
    exit();
}

// validacion para que el correo no se repita
$verificar_email = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$email' ");
if(mysqli_num_rows($verificar_email) >0){
    echo '
    <script>
        alert("El correo electronico ingresado ya esta en uso, intentalo con otro nuevamente");
        window.location = "../index.php";
    </script>
    ';
    exit();
}

$ejecutar= mysqli_query($conexion, $query);


if($ejecutar){
    echo '
    <script>
        alert("Usuario registrado correctamente");
        window.location = "../index.php"; 
    </script>
    ';
}else{
    echo '
    <script>
        alert("Usuario no registrado, intentalo nuevamente");
        window.location = "../index.php"; 
    </script>
    ';
}

mysqli_close($conexion);

?>