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
        <h2>Lista de categorías</h2>
        <a class="btn btn-primary" href="../crudcate/create.php" role="button">Nuevo categoría</a>
        <a class="btn btn-success" href="../php/admin.php" role="button">volver</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "gallery";

                    // Crear conexion
                    $connection = new mysqli($servername, $username, $password, $database);

                    // Verificar conexion
                    if ($connection->connect_error) {
                        die("Conexion fallida: " . $connection->connect_error);
                    } 

                    // Leer todas las filas de la base de datos
                    $sql = "SELECT * FROM categorias";
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Consulta invalida: " . $connection->error);
                    }

                    // Leer datos de cada fila
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[idCategoria]</td>
                            <td>$row[descripcion]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='/gallery/crudcate/edit.php?id=$row[idCategoria]'>Editar</a>
                                <a class='btn btn-danger btn-sm' href='/gallery/crudcate/delete.php?id=$row[idCategoria]'>Eliminar</a>
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