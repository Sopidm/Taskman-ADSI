<?php 
include "../includes/connect.php";
session_start();
$usuario_session = $_SESSION['usuario'];

$usuario_id = $conn->query("SELECT * from usuario where usuario = '$usuario_session'");

$fila_usu = $usuario_id->fetch_assoc();
$usuario_id = $fila_usu['codigo'];

// notificacion para dias faltantess
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

    //codigo tarea
    $codigo = $fila['codigo'];
    //verificar si la notificacion ya existe
        
        // $verificacion_notificacion = $conn->query("SELECT nu.*, tarea.codigo AS tarea_codigo, usuario.codigo AS usuario_codigo, notificacion.id AS notificacion_id
        // FROM notificaciones_usuarios AS nu
        // INNER JOIN tareas AS tarea ON nu.tarea_id = tarea.codigo
        // INNER JOIN usuario AS usuario ON nu.usuario_id = usuario.codigo
        // INNER JOIN notificaciones AS notificacion ON nu.notificaciones_id = notificacion.id;
        // where ");

        

            $tareas_usuarios = $conn->query("SELECT * from usuariotarea where tblUsuarioCodigo	= '$usuario_id' and tblTareaCodigo = '$codigo' ");
            if (!$tareas_usuarios) {
                echo "Error en la consulta: " . $conn->error;
            }

            if($tareas_usuarios->num_rows > 0){
                $fila_tarea =  $tareas_usuarios ->fetch_assoc();
                $tareas_usuarios -> $fila_tarea['tblTareaCodigo'];

        //hacerla de 2 maneras, 1 hace una consulta por cada usuario y mira que tarea cumple con el intervalo y despues verifica a que usuario se le dio la tarea y se le envia la noti, 2 con el usuario de session mirar que tarea tiene y si cumplen con el intervalo
                    if($intervalodias >= 7){
                    
                    }if($intervalodias < 7 and $intervalodias >= 4){
                        $notificacion_1 = $conn->query("SELECT * from notificaciones_usuarios where usuario_id = '$usuario_id' and notificacion_id = '1' and tarea_id = '$codigo' ");

                        if(mysqli_num_rows($notificacion_1)> 0){

                        }else{
                            $nueva_noti_1 = $conn->query("INSERT INTO notificaciones_usuarios (	usuario_id, notificacion_id,tarea_id) values ('$usuario_id','1','$tareas_usuarios')");
                            if (!$nueva_noti_1) {
                                echo "Error al insertar notificación para auditor: " . $conn->error;
                            }
                        }
                    } if($intervalodias < 4 and $intervalodias >= 0){
                        $notificacion_1 = $conn->query("SELECT * from notificaciones_usuarios where usuario_id = '$usuario_id' and notificacion_id = '1' and tarea_id = '$codigo' ");

                        if(mysqli_num_rows($notificacion_1)> 0){

                        }else{
                            $nueva_noti_1 = $conn->query("INSERT INTO notificaciones_usuarios (	usuario_id, notificacion_id,tarea_id) values ('$usuario_id','2','$tareas_usuarios')");
                            if (!$nueva_noti_1) {
                                echo "Error al insertar notificación para auditor: " . $conn->error;
                            }
                        }
                    
                    }if($intervalodias < 0){
                        $notificacion_1 = $conn->query("SELECT * from notificaciones_usuarios where usuario_id = '$usuario_id' and notificacion_id = '1' and tarea_id = '$codigo' ");

                        if(mysqli_num_rows($notificacion_1)> 0){

                        }else{
                            $nueva_noti_1 = $conn->query("INSERT INTO notificaciones_usuarios (	usuario_id, notificacion_id,tarea_id) values ('$usuario_id','3','$tareas_usuarios')");
                            if (!$nueva_noti_1) {
                                echo "Error al insertar notificación para auditor: " . $conn->error;
                            }
                        }
                    

                    }
            }


        
        

}


//Mostrar notificaciones

$notificaciones_total = $conn->query(("SELECT notificaciones_usuarios.*, noti.nombre 
FROM notificaciones_usuarios
INNER JOIN notificaciones AS noti ON notificaciones_usuarios.notificacion_id = noti.id
WHERE notificaciones_usuarios.usuario_id ='$usuario_id'"));


$conn->close();


?>