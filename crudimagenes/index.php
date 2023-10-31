<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de CRUD</title>
    <link rel="stylesheet" href="/gallery/boostrap/bootstrap513/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Imagenes</h2>

        <a class="btn btn-success" href="../php/admin.php" role="button">Volver</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Id Imagen</th>
                    <th>id Categoria</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>id Usuario</th>
                    <th>Estado</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
                </tr>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "gallery";

                    // Crear conexion
                    $conex = new mysqli($servername, $username, $password, $database);

                    // Verificar conexion
                    if ($conex->connect_error) {
                        die("Conexion fallida: " . $conex->connect_error);
                    } 

                    // Leer todas las filas de la base de datos
                    $sql = "SELECT * FROM imagenes";
                    $result = $conex->query($sql);

                    if (!$result) {
                        die("Consulta invalida: " . $conex->error);
                    }
                 
                        while($row = $result->fetch_assoc()){
                            echo "
                            <tr>
                            <td> $row[idimagen] </td>
                            <td>$row[idCategoria]</td>
                            <td> $row[foto] </td>
                            <td> $row[nombre] </td>
                            <td> $row[idUsuario]</td>
                           
                            <td> $row[estado] </td>
                            <td> $row[desa] </td>
                            <td>
                            <form method='GET'>
                            <a class='btn btn-primary btn-sm' href='/gallery/crudimagenes/edit.php?id=$row[idimagen]'>Editar</a>
                            <a class='btn btn-danger btn-sm' href='/gallery/crudimagenes/delete.php?id=$row[idimagen]'>Eliminar</a>
                           </form>
                            </td>
                       </tr> 
                         ";
                    }
                                
                  