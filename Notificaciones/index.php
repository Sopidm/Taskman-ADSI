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
        <table>
          <tr>
            <th></th>
            <th>Nombre</th>
            <th>Fecha</th>
          </tr>
          <?php 
          if($notificaciones_total->num_rows > 0){
          while($fila_notificaciones = $notificaciones_total->fetch_assoc()){  ?>
          <tr>
            <td><input type="chekbox"></td>
            <td><?= $fila['nombre'] ?></td>
            <td><?= $fila['fecha'] ?></td>
          </tr>
          <?php }
          }else{?>
          <tr>
            <td></td>
            <td><h3>No tienes notificaciones</h3></td>
            <td></td>
          </tr>
          <?php } ?>
        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
