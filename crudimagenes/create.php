<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "gallery";

    // Crear conexion
    $conex = new mysqli($servername, $username, $password, $database);

    $idimagen="";
    $idCategoria = "";
    $foto = "";
    $descripcion = "";
    $idUsuario = "";
    $nombre = "";
    $estado = "";


    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idimagen = $_POST ["id"];
        $idCategoria = $_POST ["idcategoria"];
        $foto = $_POST["foto"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["desa"];
        $idUsuario = $_POST["idusuario"];
      
        $estado = $_POST["estado"];

        do {
            if (empty($idimagen) || empty($descripcion)) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            // Agregar un nuevo usuario a la base de datos
            $sql = "INSERT INTO imagenes (idimagen, idCategoria, foto, desa, idUsuario, nombre, estado)" .
            "VALUES ('$idimagen','$idCategoria' , '$foto' , '$nombre' ,'$descripcion' '$idUsuario' , '$estado' )";
            $result = $conex->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $conex->error;
                break;
            }
            $idimagen = "";
            $idCategoria = "";
            $foto = "";
            $nombre = "";
            $descripcion = "";
            $idUsuario = "";
            $estado = "";

            $successMessage = "imagen agregada correctamente";

            header("location: /gallery/crudimagenes/index.php");
            exit;

        } while (false);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CRUD</title>
    <link rel="stylesheet" href="/gallery/boostrap/bootstrap513/css/bootstrap.min.css"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Nueva Imagen</h2>

        <?php
            if (!empty($errorMessage)) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id" value="<?php echo $idimagen; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Descripción</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="descripcion" value="<?php echo $descripcion; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Id Categoria</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="idcategoria" value="<?php echo $idCategoria; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Foto</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="foto" value="<?php echo $foto; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Id Usuario</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="idusuario" value="<?php echo $idUsuario; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>">
                </div>
                <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Descripcion</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="desa" value="<?php echo $descripcion; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Estado</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="estado" value="<?php echo $estado; ?>">
                </div>
            </div>

            <?php
                if (!empty($successMessage)) {
                    echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success añert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                    ";
                }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/gallery/crudimagenes/index.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>