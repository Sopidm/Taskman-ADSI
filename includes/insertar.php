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

    $notificacion_auditor = $conn->query("INSERT INTO notificaciones_usuarios(usuario_id,notificacion_id,tarea_id) values('$auditor',4,'$id_tarea')");
    if (!$notificacion_auditor) {
        echo "Error al insertar notificación para auditor: " . $conn->error;
    }
    
    // Recorrer el array de usuarios asignados y realizar la inserción en la nueva tabla
    foreach($asignados as $usuario) {
    $nueva_asignacion = $conn->query("INSERT INTO usuariotarea (tblUsuarioCodigo, tblTareaCodigo) VALUES ('$usuario', '$id_tarea')");
    $notificacion_asignar = $conn->query("INSERT INTO notificaciones_usuarios(usuario_id,notificacion_id,tarea_id) values('$usuario',5,'$id_tarea')");
    if (!$notificacion_asignar) {
        echo "Error al insertar notificación para usuario asignado: " . $conn->error;
    }
}
// header("../ListaTareas/index.php");

    
}

// buscar usuarios

$ususarios = $conn->query("SELECT * from usuario");





