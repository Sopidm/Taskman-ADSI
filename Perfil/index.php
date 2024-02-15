<?php 
include "editar_usuario.php";


if(!isset($_SESSION['usuario'])){ echo '<script>
        alert("Debes iniciar sesion");
        window.location = "../index.php";
    </script>';
    session_destroy();  
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Nueva Notificación</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
  <body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html"><img src="../images/logo.enc" width="50px" height="60px">TASKMAN</a>
        </div>
      </nav>
    <div class="container">
        <div class="usuario">
            <section class="section">
              
             <a href="Perfil/index.html" ><img src="../images/avatar-icon-vector-illustration.jpg" alt="" class="avatar">
             <br>
             <br>
             <i class="bi bi-person-circle"><?php echo $_SESSION['usuario'];?></i>

             </a>

            </section>
            <hr>
            <section class="section2">
              <a href="../index.php"><i class="bi bi-house"> Inicio</i></a>
              <br>
              <a href="../ListaTareas/index.php"><i class="bi bi-card-checklist">lista de Tareas</i></a>
              <br>
              <a href="../Calendario/index.php"><i class="bi bi-calendar">Calendaririo</i></a>
              <br>
              <a href="index.php"><i class="bi bi-bell">Notificaciones</i></a>
              <br>
              <a href="../CrearUsuarios/index.php"><i class="bi bi-pencil-square">Crear Usuarios</i></a>
              <br>
            </section>
            <hr>
            <section class="section3">
              <a href="../InicioSesion/cerrar.php"><i class="bi bi-box-arrow-right">Salir</i></a>
              <br>
            </section>
        </div>
        <div class="contenido"> 
        <h2 class="text-center">Datos Usuario</h2>
        <form action="editar_usuario.php" method="POST">
            <div class="form-group">
                <label for="usuario">Nombre Ususario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" disabled value="<?= $usuario_session ?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Contraseña</label>
                <input type="text" class="form-control" id="contrasena" name="contrasena" required value="<?= $contrasena_usuario ?>">
           
            <button type="button" class="btn btn-primary" id="guardarCambios">Guardar Cambios</button>
            
        </form>
        

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#guardarCambios').click(function(event) {
            event.preventDefault(); 
            
            
            if (confirm('¿Estás seguro de que quieres guardar los cambios?')) {
                
                $('form').submit();
            } else {
                
                return false;
            }
        });
    });
    </script>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
