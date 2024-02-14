<?php 
session_start();
include "../includes/connect.php";
$usuario= $_POST['usuario'];
$contrasena= $_POST['contrasena'];

$validar = $conn->query("SELECT * FROM usuario WHERE usuario = '$usuario' and contrasena = '$contrasena' ");

if(mysqli_num_rows($validar) >0){
    $_SESSION['usuario']= $usuario;
    echo '<script>
    alert("Iniciado correctamente");
    window.location = "../inicio/index.php";
    </script>';
    exit;
}else{
    echo '<script>
        alert("Usuario no encontrado intentelo de nuevo");
        window.location = "../index.php";
    </script>';
}
?>