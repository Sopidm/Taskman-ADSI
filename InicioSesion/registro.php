<?php 
    include "../includes/connect.php";
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
    $query= $conn->query("INSERT INTO usuario (usuario,contrasena) VALUES ('$usuario','$contrasena')");
    if($query){
        echo '<script>
            alert("usuario almacenado exitosamente");
            window.location = "../index.php";
        </script>';
    }else{
        echo '<script>
            alert("intentalo de nuevo");
            window.location = "../index.php";
        </script>';
    }

    
    $conn->close();

?>