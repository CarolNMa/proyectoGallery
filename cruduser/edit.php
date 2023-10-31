<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "gallery";
 
    // Crear conexion
    $conex = new mysqli($servername, $username, $password, $database);

    $id = "";
    $name = "";
    $password = "";
    $email = "";
    $phone = "";
    $type = "";
    

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Método GET: Mostrar los datos del usuario

        if (!isset($_GET["id"])) {
            header("location: /gallery/cruduser/index.php");
            exit;
        }

        $id = $_GET["id"];

        // Leer la fila del cliente seleccionado de la tabla de la base de datos
        $sql = "SELECT * FROM usuarios WHERE idUsuario=$id";
        $result = $conex->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location: /gallery/cruduser/index.php");
            exit;
        }

        $name = $row["nomUsuario"];
        $password = $row["conUsuario"];
        $email = $row["emailUsuario"];
        $type = $row["tipoUsuario"];
    }
    else {
        // Método POST: Actualizar los datos del usuario

        $id = $_POST["id"];
        $name = $_POST["name"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $type = $_POST["tipoUsuario"];
        

        do {
            if ( empty($id) || empty($name) || empty($password) || empty($email)  || empty($type) ) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            $sql = "UPDATE usuarios " .
            "SET nomUsuario = '$name', emailUsuario = '$email', conUsuario ='$password', tipoUsuario = '$type'" . 
            "WHERE idUsuario = $id";

            $result = $conex->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $conex->error;
                break;
            }

            $successMessage = "Usuario actualizado correctamente";

            header("location: /gallery/cruduser/index.php");
            exit;

        } while (true);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CRUD</title>
    <link rel="stylesheet" href="/gallery/boostrap/bootstrap513/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Nuevo Usuario</h2>

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
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contraseña</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                  </div>
                </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">tipoUsuario</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tipoUsuario" value="<?php echo $type; ?>">
                </div>
            
            </div>


            <?php
                if (!empty($successMessage)) {
                    echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
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
                    <a class="btn btn-outline-primary" href="/gallery/cruduser/index.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>