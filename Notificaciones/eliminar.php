<?php 
include "../includes/connect.php";
$id = $_GET['codigo'];
$eliminar = $conn->query("DELETE FROM notificaciones_usuarios WHERE id = $id"); 
header("Location: index.php");
$conn->close();
?>