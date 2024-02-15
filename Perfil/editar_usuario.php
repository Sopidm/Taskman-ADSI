<?php 
    include "../includes/connect.php";
    session_start();
    $usuario_session = $_SESSION['usuario'];

    $usuario_id = $conn->query("SELECT * from usuario where usuario = '$usuario_session'");

    $fila_usu = $usuario_id->fetch_assoc();
    $usuario_id = $fila_usu['codigo'];
    $contrasena_usuario = $fila_usu['contrasena'];
    //datos del nuevo usuario
    if(isset($_POST['contrasena'])){
        
        $contrasena = $_POST['contrasena'];

        $editar = $conn->query("UPDATE usuario Set contrasena = '$contrasena' ");

        
        if($editar){
            echo '<script>
                alert("usuario editado exitosamente");
                window.location = "index.php";
            </script>';
        }else{
            echo '<script>
                alert("intentalo de nuevo");
                window.location = "index.php";
            </script>';
        }

    }      
    $conn->close();

?>