<?php 
include "../includes/connect.php";

$query= "SELECT Ta.codigo, Ta.titulo, Ta.tblEstadoId, Ta.tblCategoriaId,
Ta.tblPrioridadId,Ta.fecha_vencimiento,
Es.estados,
Ca.categorias,
Pr.prioridades
FROM tareas as Ta
INNER JOIN estado as Es ON Ta.tblEstadoId = Es.idEstado
INNER JOIN categoria as Ca ON Ta.tblCategoriaId = Ca.IdCategoria
 INNER JOIN prioridad as Pr ON Ta.tblPrioridadId = Pr.IdPrioridad ORDER BY Ta.codigo ASC ";
$query = mysqli_query($conn, $query);
$array_fecha = getdate();
$fecha_actual =  $array_fecha ['year']."-".$array_fecha ['mon']."-".$array_fecha ['mday'];
while ($fila = mysqli_fetch_assoc($query)){
 $date1 = new DateTime($fecha_actual);
 $date2 = new DateTime($fila['fecha_vencimiento']);
 $diff = $date1->diff($date2);    
 $intervalodias = $diff->days;               
 if($date1 > $date2){                    
   $intervalodias = -$intervalodias;

}
 $codigo = $fila['codigo'];
 //verificar si la notificacion ya existe
    
    $verificacion_notificacion = $conn->query("SELECT nu.*, tarea.codigo AS tarea_codigo, usuario.codigo AS usuario_codigo, notificacion.id AS notificacion_id
    FROM notificaciones_usuarios AS nu
    INNER JOIN tareas AS tarea ON nu.tarea_id = tarea.codigo
    INNER JOIN usuario AS usuario ON nu.usuario_id = usuario.codigo
    INNER JOIN notificaciones AS notificacion ON nu.notificaciones_id = notificacion.id;
    ");

    if(mysqli_num_rows($verificacion_notificacion)> 0){

    }else{

        $tareas_usuarios = $conn->query("SELECT * from usuario_tarea")
        while($fila_tareas_usuarios = $tareas_usuarios->fetch_assoc() ){


 //
            if($intervalodias >= 7){
            
            }if($intervalodias < 7 and $intervalodias >= 4){
                $notificacion_dias = $conn->query("INSERT INTO notificaciones_ususarios () ")
            } if($intervalodias < 4 and $intervalodias >= 0){
            
            }if($intervalodias < 0){
            

            }


    }
    }
    }

$conn->close();


?>