<?php 
include "../Notificaciones/notificacion.php";
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
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Proyecto TASKMAN | Inicio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css?family=Muli%7CRoboto:400,300,500,700,900" rel="stylesheet">
</head>

  <body>
   

  <header>
      <img src="images/avatar.jpg" alt="camila" class="profile-image">
      <div class="hero-text">
        <h1 class="name">Proyecto TASKMAN</h1>
           <h3 class="profession">ADSI</h3>
      </div>
    </header>
  <p>&nbsp;</p>
    <section class="nav">MENÚ PRINCIPAL</section>
	  <p>&nbsp;</p>
  <main class="flex">
		
    <div class="card">
        <h2>TASKMAN</h2>
        <p>Es una aplicación para la creación y gestión de tareas.&nbsp; &nbsp;&nbsp;</p>
      
    <p><a href="#"><img src="images/avatar.jpg" width="150" height="150" alt=""/></a></p></div>

      <div class="card">
        <h2>Secciones</h2>
        <p>Ingresa y gestiona tareas en nuestras secciones.&nbsp; &nbsp;&nbsp;</p>
		  <p>&nbsp;</p>
        <div class="secciones"> <a href="../ListaTareas/index.php" target="_blank"><img src="images/task.png" title="Sección Tareas"></a>
          <a href="#" target="_blank"><img src="images/user.png" title="Sección Usuarios"></a>
          <a href="../Calendario/index.php" target="_blank"><img src="images/cal.png" title="Sección Calendarios" ></a> 
          <a href="../Notificaciones/index.php" target="_blank"><img src="images/noti.png" title="Sección Notificaciones" ></a>
        </div>
    </div>
      <div class="card">
        <h2>Salir del Aplicativo</h2>
        <p>Si deseas salir del aplicativo, da click en el ícono.&nbsp; &nbsp;</p>
		  <p><a href="../InicioSesion/cerrar.php"><img src="images/salir.png" width="150" height="150" alt=""/></a></p> 
      </div>
  </main>
    <footer>
      <nav> <a href="https://www.facebook.com" target="_blank"><img src="images/facebook.png" width="25" height="25" alt=""/></a> </nav>
      <p class="copyright"> &copy; 2023 ADSI.</p>
      <a href="https://www.sena.edu.co/" target="_blank"><img src="images/sena.png" width="97" height="88" alt=""/></a>
      <p class="copyright">&nbsp;</p>
    </footer>
  </body>
  </html>
