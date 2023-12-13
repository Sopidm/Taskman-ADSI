<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Nueva Notificación</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Nueva Notificación</h2>
        <form action="">
            <div class="form-group">
                <label for="nombre_notificacion">Nombre Notificación</label>
                <input type="text" class="form-control" id="nombre_notificacion" name="nombre_notificacion" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="criterios">Criterios</label>
                <select class="form-control" id="criterios" name="criterios">
                    <option value="usuario_asignado">Usuario Asignado</option>
                    <option value="tarea_por_cerrarse">Tarea por Cerrarse</option>
                    <option value="tarea_creada">Tarea Creada</option>
                    <option value="tarea_cerrada">Tarea Cerrada</option>
                    <option value="tarea_entregada">Tarea Entregada</option>
                    <option value="fecha_notificacion">Fecha Notificación</option>
                    <option value="nuevo_usuario_creado">Nuevo Usuario Creado</option>
                    <option value="ninguna">Ninguna</option>
                </select>
            </div>
            <div class="form-group">
                <label for="asignacion">Asignación</label>
                <select class="form-control" id="asignacion" name="asignacion">
                    <option value="usuario">Usuario</option>
                    <option value="tarea_creada">Tarea Creada</option>
                    <option value="tarea_cerrada">Tarea Cerrada</option>
                    <option value="tarea_entregada">Tarea Entregada</option>
                    <option value="fecha_notificacion">Fecha Notificación</option>
                    <option value="nuevo_usuario_creado">Nuevo Usuario Creado</option>
                    <option value="ninguna">Ninguna</option>
                </select>
            </div>
            <div class="form-group">
                <label for="supervisor">Supervisor</label>
                <select class="form-control" id="supervisor" name="supervisor">
                    <!-- Aquí deberás agregar las opciones de supervisores disponibles -->
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_envio">Fecha de Envío de la Notificación</label>
                <input type="date" class="form-control" id="fecha_envio" name="fecha_envio" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/