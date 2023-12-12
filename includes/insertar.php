<?php 
include "connect.php";

if(isset($_POST['insertar'])){
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $categoria = $_POST['categoria'];
    $prioridad = $_POST['prioridad'];
    $estado = $_POST['estado'];

    $editar = $conn->query("INSERT INTO tareas(titulo,descripcion,fecha_vencimiento,tblCategoriaId,tblPrioridadId,tblEstadoId) values ('$titulo','$descripcion','$fecha_vencimiento','$categoria','$prioridad','$estado')");
    header("Location: ../ListaTareas/index.php");
    
}
?>
