<?php 
    include "../includes/connect.php";
    session_start();
    $usuario_session = $_SESSION['usuario'];

    $usuario_id = $conn->query("SELECT * from usuario where usuario = '$usuario_session'");

    $fila_usu = $usuario_id->fetch_assoc();
    $usuario_id = $fila_usu['codigo'];

    //datos del nuevo usuario
    if(isset($_POST['usuario']) and isset($_POST['contrasena'])){
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];


        //Verificar usuario no se repita
        $verificar = $conn->query("SELECT * FROM usuario WHERE usuario = '$usuario'");

        if(mysqli_num_rows($verificar) > 0){
            echo '<script>
            alert("usuario ya registrado");
            window.location = "../index.php";
        </script>';
        exit;
        }
        $query= $conn->query("INSERT INTO usuario (usuario,contrasena,contra_tempo) VALUES ('$usuario','$contrasena','$contrasena')");
        
        $nuevo_usuario_id = mysqli_insert_id($conn);
        //la notificacion le llega al usuario que creo al nuevo ususario
        $crear_usuario_noti = $conn->query("INSERT INTO notificaciones_usuarios (usuario_id, notificacion_id,id_usuario_creado) values ('$usuario_id','6','$nuevo_usuario_id')");

        
        if($query){
            echo '<script>
                alert("usuario almacenado exitosamente");
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
