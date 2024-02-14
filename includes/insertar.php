<?php 
include "connect.php";

session_start();

if(isset($_POST['insertar'])){
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $categoria = $_POST['categoria'];
    $prioridad = $_POST['prioridad'];
    $estado = $_POST['estado'];
    $recursos = $_POST['recursos'];
    $auditor = $_POST['auditor'];

    $asignados = $_POST['asignados'];
    
    $nueva_tarea = $conn->query("INSERT INTO tareas (titulo,descripcion,fecha_vencimiento,tblCategoriaId,tblPrioridadId,tblEstadoId,recursos,tblAuditoriaId) values ('$titulo','$descripcion','$fecha_vencimiento','$categoria','$prioridad','$estado','$recursos','$auditor')");
    
    $id_tarea = $conn->insert_id;

    $notificacion_auditor = $conn->query("INSERT INTO notificaciones_usuarios(usuario_id,notificaciones_id,tarea_id) values('$auditor','1','$id_tarea')");
    // Recorrer el array de usuarios asignados y realizar la inserción en la nueva tabla
    foreach($asignados as $usuario) {
    $nueva_asignacion = $conn->query("INSERT INTO usuariotarea (tblUsuarioCodigo, tblTareaCodigo) VALUES ('$usuario', '$id_tarea')");
}

    
}

// buscar usuarios

$ususarios = $conn->query("SELECT * from usuario");

header("../ListaTareas/index.php");



