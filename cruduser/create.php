<?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $database = "gallery";

    // Crear conexion
    $conex = new mysqli($servername, $username, $pass, $database);

    $id = "";
    $name = "";
    $contra = "";
    $email = "";
    $tipo = "";
   
    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $contra = $_POST["contra"];
        $email = $_POST["email"];
        $tipo = $_POST["tipoUsuario"];
        
        do {
            if (empty($id) || empty($name) || empty($contra) || empty($email) || empty($tipo)  ) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            // Agregar un nuevo usuario a la base de datos
            $sql = "INSERT INTO usuarios (idUsuario, nomUsuario, conUsuario, emailUsuario,  tipoUsuario ) " . 
                   "VALUES ('$id', '$name', '$contra', '$email', '$tipo')";
            $result = $conex->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $conex->error;
                break;
            }

            $id = "";
            $name = "";
            $contra = "";
            $emailUsuario = "";
            $tipo = "";
           

            $successMessage = "Usuario agregado correctamente";

            header("location: /galinter/cruduser/index.php");
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
    <link rel="stylesheet" href="c:\xampp\htdocs\gallery\cruduser">  
      <link rel="stylesheet" href="/gallery/boostrap/bootstrap513/css/bootstrap.min.css">
    <script src="/gallery/boostrap/bootstrap513/css/bootstrap.min.css"></script>
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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contraseña</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="contra" value="<?php echo $contra; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tipo</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tipoUsuario" value="<?php echo $tipo; ?>">
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
                    <a class="btn btn-outline-primary" href="gallery/cruduser/index.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>