<?php 
include "../includes/connect.php";
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
    <title>Editar Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../ListaTareas/CrearTareas/styles.css">
  </head>
  <body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="../../images/logo.enc" width="50px" height="60px">TASKMAN</a>
        </div>
      </nav>
    <div class="container">
        <div class="usuario">
            <section class="section"> 
             <a href="Perfil/index.html" ><img src="../../images/avatar-icon-vector-illustration.jpg" alt="" class="avatar">
             <br>
             <br>
             <i class="bi bi-person-circle"><?php echo $_SESSION['usuario'];?></i>

             </a>
            </section>
            <hr>
            <section class="section2">
              <a href="../index.php"><i class="bi bi-house"> Inicio</i></a>
              <br>
              <br>
              <a href="index.php"><i class="bi bi-card-checklist">lista de Tareas</i></a>
              <br>
              <br>
              <a href="../Calendario/index.php"><i class="bi bi-calendar">Calendaririo</i></a>
              <br>
              <br>
              <a href="../Notificaciones/index.php"><i class="bi bi-bell">Notificaciones</i></a>
              <br>
              <a href="Notificaciones/"><i class="bi bi-pencil-square">Crear Usuarios</i></a>
              <br>
            </section>
            <hr>
            <section class="section3">
              <a href="../InicioSesion/cerrar.php"><i class="bi bi-box-arrow-right">Salir</i></a>
              <br>
            </section>
        </div>
        <div class="contenido">
            <?php 
            $codigo = $_GET['codigo'];
            $editar = $conn->query("SELECT Ta.codigo, Ta.titulo, Ta.tblEstadoId, Ta.tblCategoriaId,
            Ta.tblPrioridadId,Ta.fecha_vencimiento,Ta.descripcion,
            Es.estados,
            Ca.categorias,
            Pr.prioridades
            FROM tareas as Ta
            INNER JOIN estado as Es ON Ta.tblEstadoId = Es.idEstado
            INNER JOIN categoria as Ca ON Ta.tblCategoriaId = Ca.IdCategoria
             INNER JOIN prioridad as Pr ON Ta.tblPrioridadId = Pr.IdPrioridad WHERE Ta.codigo ='$codigo'");
            $row= $editar->fetch_assoc();
            ?>
            <form class="row g-3 needs-validation"  method="post">
                <div id="titulo"><h3>CREAR TAREA</h3>
                </div>
                <hr>
                <!-- <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">USUARIO</label>
                  <input type="text" class="form-control" id="validationCustom01" placeholder="Nombre" >
                  <div class="valid-feedback">
                  </div>
                </div> -->
                <div class="col-md-4">
                  <label for="titulo" class="form-label">TÍTULO</label>
                  <textarea type="text" class="form-control" id="titulo" name="titulo" placeholder="Título"><?= $row['titulo'];?></textarea>
                  <div class="valid-feedback">
                  </div>
                </div>
                <!-- <div class="col-md-4">
                  <label for="validationCustom03" class="form-label">CÓDIGO</label>
                  <input type="num" class="form-control" id="validationCustom02" placeholder="Código">
                  <div class="invalid-feedback">
                    Please provide a valid city.
                  </div>
                </div> -->
                <div class="col-md-4">
                  <label for="categoria" class="form-label">CATEGORÍA</label>
                  <select class="form-select" id="categoria" name="categoria">
                    <option value="" ><?= $row['categorias'];?></option>
                    <option value="1">Personal</option>
                    <option value="2">Trabajo</option>
                    <option value="3">Estudio</option>
                  </select>  
                </div>
                <hr>
                <!-- <div class="col-md-4">
                    <label for="validationCustom05" class="form-label">RECURSOS</label>
                    <select class="form-select" id="validationCustom05">
                      <option selected disabled value="">Seleccione...</option>
                      <option>Item-1</option>
                      <option>Item-2</option>
                      <option>Item-3</option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                  </div> -->
                  <div class="col-md-4">
                    <label for="prioridad" class="form-label">PRIORIDAD</label>
                    <select class="form-select" id="prioridad" name="prioridad">
                      <option selected  value="" ><?= $row['prioridades'];?></option>
                      <option value="1">Alta</option>
                      <option value="2">Media</option>
                      <option value="3">Baja</option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="estado" class="form-label">ESTADO</label>
                    <select class="form-select" id="estado" name="estado">
                      <option selected  value="" ><?= $row['estados'];?></option>
                      <option value="1">En curso</option>
                      <option value="2">Pendiente</option>
                      <option value="3">Terminado</option>
                      <option value="4">Cerrado</option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="mb-1">
                    <label for="descripcion" class="form-label">DESCRIPCION DE LA TAREA</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción de la tarea" rows="1"><?= $row['descripcion'];?></textarea>
                  </div>
                  <hr>
                  <!-- <div class="col-md-4">
                    <label for="validationCustom08" class="form-label">FECHA INICO</label>
                    <input type="date" class="form-control" id="validationCustom03">
                    <div class="invalid-feedback">
                    </div>
                  </div> -->
                  <div class="col-md-4">
                    <label for="fecha_vencimiento" class="form-label">FECHA FIN</label>
                    <textarea type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento"><?= $row['fecha_vencimiento'];?></textarea>
                    <div class="invalid-feedback">
                    </div>
                  </div>
                   <!-- <div class="col-md-4">
                      <label for="auditoria" class="form-label">AUDITOR</label>
                      <select class="form-select" id="auditoria" name="auditoria" >
                        <option selected disabled value="">Seleccione...</option>
                        <option>Auditor-1</option>
                        <option>Auditor-2</option>
                        <option>Auditor-3</option>
                        <option>Auditor-4</option>
                        </select>
                  </div> -->
                  <div class="col-12">
                    <button class="btn btn-success" name="editar" type="submit" onclick="redireccion()">Guardar</button>
                    <a href="index.php"><button  type="button" class="btn btn-outline-danger" onclick="redireccion()" >Cancelar</button></a>
                  </div>  
            </form>
            <?php 
                if(isset($_POST['editar'])){
                    $titulo = $_POST['titulo'];
                    $descripcion = $_POST['descripcion'];
                    $fecha_vencimiento = $_POST['fecha_vencimiento'];
                    $categoria = $_POST['categoria'];
                    $prioridad = $_POST['prioridad'];
                    $estado = $_POST['estado'];

                    $insertar = $conn->query("UPDATE tareas SET titulo = '$titulo', descripcion = '$descripcion', fecha_vencimiento= '$fecha_vencimiento' WHERE codigo='$codigo'");

                    if(!empty($categoria)){
                      $insertar = $conn->query("UPDATE tareas Set 	tblCategoriaId = '$categoria' WHERE codigo='$codigo'");
                    }
                    if(!empty($prioridad)){
                      $insertar = $conn->query("UPDATE tareas Set 	tblPrioridadId = '$prioridad' WHERE codigo='$codigo'");

                    }
                    if(!empty($estado)){
                      $insertar = $conn->query("UPDATE tareas Set 	tblEstadoId = '$estado' WHERE codigo='$codigo'");

                    }
                       
                }
                ?>

        </div>
    </div>
    
    
    <script>
      function redireccion() {
      window.location.href = 'index.php';
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>