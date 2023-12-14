<?php 

session_start();
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
        <h2 class="text-center">Nueva Notificación</h2>
        <form action="">
            <div class="form-group">
                <label for="nombre_notificacion">Nombre Notificación</label>
                <input type="text" class="form-control" id="nombre_notificacion" name="nombre_notificacion" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="criterios">Criterios</label>
                <select class="form-control" id="criterios" name="criterios">
                    <option value="usuario_asignado">Usuario Asignado</option>
                    <option value="tarea_por_cerrarse">Tarea por Cerrarse</option>
                    <option value="tarea_creada">Tarea Creada</option>
                    <option value="tarea_cerrada">Tarea Cerrada</option>
                    <option value="tarea_entregada">Tarea Entregada</option>
                    <option value="fecha_notificacion">Fecha Notificación</option>
                    <option value="nuevo_usuario_creado">Nuevo Usuario Creado</option>
                    <option value="ninguna">Ninguna</option>
                </select>
            </div>
            <div class="form-group">
                <label for="asignacion">Asignación</label>
                <select class="form-control" id="asignacion" name="asignacion">
                    <option value="usuario">Usuario</option>
                    <option value="tarea_creada">Tarea Creada</option>
                    <option value="tarea_cerrada">Tarea Cerrada</option>
                    <option value="tarea_entregada">Tarea Entregada</option>
                    <option value="fecha_notificacion">Fecha Notificación</option>
                    <option value="nuevo_usuario_creado">Nuevo Usuario Creado</option>
                    <option value="ninguna">Ninguna</option>
                </select>
            </div>
            <div class="form-group">
                <label for="supervisor">Supervisor</label>
                <select class="form-control" id="supervisor" name="supervisor">
                    <!-- Aquí deberás agregar las opciones de supervisores disponibles -->
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_envio">Fecha de Envío de la Notificación</label>
                <input type="date" class="form-control" id="fecha_envio" name="fecha_envio" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
