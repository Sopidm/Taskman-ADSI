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
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TASKMAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
  <body>
    <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">
       <a class="navbar-brand" href="../images/logo.enc"><img src="../images/logo.enc" width="50px" height="60px">TASKMAN</a>
      </div>
      </nav>
      <div class="container">
        <div class="usuario">
          <section class="section">                  
            <a href="../Calendario/index.php" ><img src="../images/avatar-icon-vector-illustration.jpg" alt="" class="avatar">
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
                  <a href="index.php"><i class="bi bi-calendar">Calendaririo</i></a>
                  <br>
                  <a href="../Notificaciones/index.php"><i class="bi bi-bell">Notificaciones</i></a>
                  <br>
                  <a href="../CrearUsuarios/"><i class="bi bi-pencil-square">Crear Usuarios</i></a>
                  <br>
                </section>
                <hr>
                <section class="section3">
                  <a href="Salir/"><i class="bi bi-box-arrow-right">Salir</i></a>
                  <br>
                </section>
            </div>
            <div class="contenido"> Calendario de Tareas
              <div id="calendario">
                <div class="navegacion">
                  <span class="flecha" id="mes-anterior">&lt;</span>
                  <span class="flecha" id="mes-siguiente">&gt;</span>
                  <h2 id="mes-actual"></h2>
                  </div>
                  <table id="tabla-calendario"></table>
                  <div id="popup" class="popup">
                    <div class="popup-content">
                      <h3 id="popup-title"></h3>
                      <p id="popup-message"></p>
                      <div id="popup-buttons">
                        <a href="../ListaTareas/index.php" id="view-task-button" class="btn btn-primary">Ver tarea</a>
                        <button id="create-task-button" class="btn btn-primary">Crear tarea</button>
                        </div>
                        <div id="popup" class="popup">
                          <div class="popup-content">
                            <h3 id="popup-title"></h3>
                            <p id="popup-message"></p>
                            <div id="popup-buttons">
                              <a href="../ListaTareas/index.html" id="view-task-button" class="btn btn-primary">Ver tarea</a>
                              <button id="create-task-button" class="btn btn-primary">Crear tarea</button>
                              <button id="cerrar-ventana" class="btn btn-secundary">cerrar</button>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
              <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
              <script src="script.js"></script>
  </body>
</html>
