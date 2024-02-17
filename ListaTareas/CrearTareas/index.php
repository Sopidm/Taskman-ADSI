<?php 
include "../../includes/insertar.php";

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
              
              <br>
              <hr>
              <a href="../../index.php"><i class="bi bi-house"> Inicio</i></a>
              <br>
              <a href="../index.php"><i class="bi bi-card-checklist"> lista de Tareas</i></a>
              <br>
              <a href="../../Calendario/index.php"><i class="bi bi-calendar"> Calendario</i></a>
              <br>
              <a href="../../Notificaciones/index.php"><i class="bi bi-bell"> Notificaciones</i></a>
              <br>
              <a href="Notificaciones/"><i class="bi bi-pencil-square"> Crear Usuarios</i></a>
              <br>
            </section>
            <hr>
            <section class="section3">
              <a href="Salir/"><i class="bi bi-box-arrow-right">Salir</i></a>
              <br>
            </section>
        </div>
        <div class="contenido">
            <form class="row g-3 needs-validation" action="../../includes/insertar.php" novalidate  method="post">
                <div id="titulo"><h3>CREAR TAREA</h3>
                </div>
                <hr>
                
                <div class="col-md-4">
                  <label for="titulo" class="form-label">TÍTULO</label>
                  <textarea type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" required></textarea>
                  <div class="valid-feedback">
                  </div>
                </div>
               
                <div class="col-md-4">
                  <label for="categoria" class="form-label">CATEGORÍA</label>
                  <select class="form-select" id="categoria" name="categoria" required>
                    <option selected disabled value="">Seleccione...</option>
                    <option value="1">Personal</option>
                    <option value="2">Trabajo</option>
                    <option value="3">Estudio</option>
                  </select>  
                </div>
                <hr>
                <div class="col-md-4">
                    <label for="validationCustom05" class="form-label">RECURSOS</label>
                    <textarea name="recursos" id="validationCustom05" cols="30" rows="5"></textarea>
                  </div>
                  <div class="col-md-4">
                    <label for="prioridad" class="form-label">PRIORIDAD</label>
                    <select class="form-select" id="prioridad" name="prioridad" required>
                      <option selected disabled value="">Seleccione...</option>
                      <option value="1">Alta</option>
                      <option value="2">Media</option>
                      <option value="3">Baja</option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="estado" class="form-label">ESTADO</label>
                    <select class="form-select" id="estado" name="estado" required>
                      <option selected disabled value="">Seleccione...</option>
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
                    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción de la tarea" rows="1" required></textarea>
                  </div>
                  <hr>
                  
                  <div class="col-md-12">
                    <label for="fecha_vencimiento" class="form-label">FECHA FIN</label>
                    <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" required>
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="col-md-6">
                      <h5>AUDITOR</h5>
                      
                      <input class="form-control me-2 light-table-filter" type="text" name="buscador" id="buscador" data-table="table_id" placeholder="Buscar auditor" aria-label="Search">
                      
                      <table class="table_id" style="max-height: 100px !important; overflow:scroll;">
                      <?php while($filas_usiarios = $ususarios->fetch_assoc()){  ?> 
                      
                        <tr>
                          <td><input type="radio" style="margin: 10px;" value="<?= $filas_usiarios['codigo'] ?>" name="auditor"></td>
                          <td ><?= $filas_usiarios['usuario'] ?></td>
                        </tr>
                      <?php } ?>
                      </table>
                        
                       
                  </div>
                  <div class="col-md-6">
                     <h5>Asignar</h4>
                      
                      <input class="form-control me-2 light-table-filter" type="text" name="buscador" id="buscador" data-table="table_id_asignar" placeholder="Buscar auditor" aria-label="Search">
                      
                      <table class="table_id_asignar" style="max-height: 150px; overflow:scroll;">
                      <?php
                      mysqli_data_seek($ususarios, 0);
                      while($filas_usiarios = $ususarios->fetch_assoc()){  ?> 
                      
                        <tr>
                          <td><input type="checkbox" style="margin: 10px;" value="<?= $filas_usiarios['codigo'] ?>" name="asignados[]"></td>
                          <td ><?= $filas_usiarios['usuario'] ?></td>
                        </tr>
                        <?php } ?>
                      </table>
                        
                       
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary" name="insertar" type="submit" >Guardar</button>
                    <a href="../index.php"><button  type="button" class="btn btn-outline-danger" >Cancelar</button></a>
                  </div>  
            </form>
            <?php 

           
            ?>

        </div>
    </div>
   
    <script src="../../js/buscador.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>