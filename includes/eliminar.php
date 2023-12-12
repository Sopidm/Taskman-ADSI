<?php 
include "connect.php";
$codigo = $_GET['codigo'];
$eliminar = $conn->query("DELETE FROM tareas WHERE codigo = '$codigo'");

header("Location: ../ListaTareas/index.php")
?>