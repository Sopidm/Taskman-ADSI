<?php 
include "notificacion.php";


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
        <h2 class="text-center">Notificaciones</h2>
        <br>
        <a href="crear.php"><button>Crear Notificacion</button></a>
        <br>
        <br>
        <h3>Notificaciones</h3>
        <table>
          <tr>
            <th></th>
            <th>Nombre</th>
            <th>Fecha</th>
          </tr>
          <?php 
          if($notificaciones_total->num_rows > 0){
          
          while($fila_notificaciones = $notificaciones_total->fetch_assoc()){ 
            ?>
          <tr class="fila-notificacion" data-nombre="<?= $fila_notificaciones['nombre'] ?>" data-fecha="<?= $fila_notificaciones['fecha'] ?>" data-tarea="<?= $fila_notificaciones['titulo'] ?>" >
            <td><input type="checkbox"></td>
            <td><?= $fila_notificaciones['nombre'] ?></td>
            <td><?= $fila_notificaciones['fecha'] ?></td>
          </tr>
          <?php 
          if($notificaciones_total_nuevo_usuario->num_rows > 0){
            while($fila_notificaciones_nuevo_usu = $notificaciones_total_nuevo_usuario->fetch_assoc()){
            ?>
          <tr class="fila-notificacion-nuevo-user" data-nombre="<?= $fila_notificaciones_nuevo_usu['nombre'] ?>" data-fecha="<?= $fila_notificaciones_nuevo_usu['fecha'] ?>" data-usuario="<?= $fila_notificaciones_nuevo_usu['usuario'] ?>" data-contrasena="<?= $fila_notificaciones_nuevo_usu['contra_tempo'] ?>">
          
            <td><input type="checkbox"></td>
            <td><?= $fila_notificaciones_nuevo_usu['nombre'] ?></td>
            <td><?= $fila_notificaciones_nuevo_usu['fecha'] ?></td>
          </tr>
          <?php
            }
          }
          }
          }else{?>
          <tr>
            <td></td>
            <td><h3>No tienes notificaciones</h3></td>
            <td></td>
          </tr>
          <?php } ?>
        </table>

    </div>

    <!-- Modal para mostrar detalles de notificación -->
    <div class="modal fade" id="modalDetalleNotificacion" tabindex="-1" role="dialog" aria-labelledby="modalDetalleNotificacionLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetalleNotificacionLabel">Detalles de Notificación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Nombre:</strong> <span id="nombreNotificacion"></span></p>
                        <p><strong>Fecha:</strong> <span id="fechaNotificacion"></span></p> <p><strong>Tarea:</strong> <span id="tituloTarea"></span></p>
                       
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Modal para mostrar detalles de notificación -->
    <div class="modal fade" id="modalDetalleNotificacionUsuarioNuevo" tabindex="-1" role="dialog" aria-labelledby="modalDetalleNotificacionLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetalleNotificacionLabel">Detalles de Notificación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Nombre:</strong> <span id="nombreNotificacionUsusu"></span></p>
                        <p><strong>Fecha:</strong> <span id="fechaNotificacionusu"></span></p> <p><strong>Usuario Creado:</strong> <span id="UsusarioCreado"></span></p>
                        <p><strong>Contraseña Temporal:</strong> <span id="ContraTempo"></span></p>
                       
                    </div>
                    
                </div>
            </div>
        </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('.fila-notificacion').click(function() {
                var nombre = $(this).data('nombre');
                var fecha = $(this).data('fecha');
                var tarea = $(this).data('tarea');
                $('#nombreNotificacion').text(nombre);
                $('#fechaNotificacion').text(fecha);
                $('#tituloTarea').text(tarea);
                $('#modalDetalleNotificacion').modal('show');
            });

            $('.close').click(function(){
              $('#modalDetalleNotificacion').modal('hide');

            });

            $('.fila-notificacion-nuevo-user').click(function() {
                var nombre = $(this).data('nombre');
                var fecha = $(this).data('fecha');
                var usuario = $(this).data('usuario');
                var contraTempo = $(this).data('contrasena');
                $('#nombreNotificacionUsusu').text(nombre);
                $('#fechaNotificacionusu').text(fecha);
                $('#UsusarioCreado').text(usuario);
                $('#ContraTempo').text(contraTempo);
                $('#modalDetalleNotificacionUsuarioNuevo').modal('show');
            });

            $('.close').click(function(){
              $('#modalDetalleNotificacionUsuarioNuevo').modal('hide');

            });
        });
    </script>  
    
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
