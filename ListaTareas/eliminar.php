<?php 
include "../includes/connect.php";
$codigo = $_GET['codigo'];
$eliminar = $conn->query("DELETE FROM tareas WHERE codigo = '$codigo'");

header("Location: index.php");
$conn->close();

?>