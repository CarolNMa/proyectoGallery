<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>usuarios</title>
    <link rel="stylesheet" href="/gallery/boostrap/bootstrap513/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container my-5">
        
        <h2>Lista de Usuarios</h2>
        <a class="btn btn-primary" href="/gallery/cruduser/create.php" role="button">Nuevo usuario</a>
        <a class="btn btn-success" href="../php/admin.php" role="button">Volver</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Contraseña</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $pass = "";
                    $database = "gallery";

                    // conexion
                    $conex = new mysqli($servername, $username, $pass, $database);

                    // Verificar conexion
                    if ($conex->connect_error) {
                        die("Conexion fallida: " . $conex->connect_error);
                    } 

                    // Lee todas las filas de la base de datos
                    $sql = "SELECT * FROM usuarios";
                    $result = $conex->query($sql);

                    if (!$result) {
                        die("Consulta invalida: " . $conex->error);
                    }

                    // Leer datos de cada fila
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[idUsuario]</td>
                            <td>$row[nomUsuario]</td>
                            <td>$row[conUsuario]</td>
                            <td>$row[emailUsuario]</td>
                            <td>$row[tipoUsuario]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='/gallery/cruduser/edit.php?id=$row[idUsuario]'>Editar</a>
                                <a class='btn btn-danger btn-sm' onclick={preEliminar()} href='/gallery/cruduser/delete.php?id=$row[idUsuario]'>Eliminar</a>
                            </td>
                        </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>