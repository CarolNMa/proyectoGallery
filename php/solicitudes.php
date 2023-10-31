<?php
include("../includes/conexion.php");

    if(isset($_GET['idAprobado'])){
      $idAprobado=$_GET['idAprobado'];
      $sql1="UPDATE imagenes SET estado='1' WHERE idimagen='$idAprobado'";
      $result1=$conex->query($sql1);
    
    }
    
    if(isset($_GET['idDesaprobado'])){
        $idDesaprobado=$_GET['idDesaprobado'];
        $sql1="DELETE FROM imagenes WHERE idimagen='$idDesaprobado'";
        $result1=$conex->query($sql1);  
    }
    
    $sql="SELECT * FROM imagenes WHERE estado='0'";
    $result=$conex->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/gallery/boostrap/bootstrap513/css/bootstrap.min.css">
    <title>Admin</title>
    <style>
        .imagen{
            height:300px;
            max-width:500px;
            
        }
        .contenedor{
            transition: transform 0.3s ease;

        }
        .contenedor:hover{
            transform: scale(1.05);
        }
    </style>
</head>
<body style="background-color:#63C5DA;">
   
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Bienvenido Admin</a>
        <div class="container">
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/gallery/php/solicitudes.php">Solicitudes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/gallery/cruduser/index.php">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/gallery/crudcate/index.php">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/gallery//index.php">Imagenes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../index.php">Volver</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <section class="container-fluid p-5">
    <div class="w-100 mt-3 ">
        <div class="row h-25">
         
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            $ruta_imagen = $row['foto'];
            $id= $row['idimagen']
          
          ?>
          <div class="col-md-4 mb-1">
            <div class="card mb-4 shadow-lg custom-div  bg-white rounded contenedor " >
              <img src="../images/<?php echo $ruta_imagen ?>" class="imagen " alt="Galeria">
              <div class="d-flex flex-row shadow-md"><a class="btn btn-success w-100 fw-bold" href="./solicitudes.php?idAprobado=<?php echo $id ?>">Aprobar</a><a class="btn btn-danger w-100 fw-bold" href="./solicitudes.php?idDesaprobado=<?php echo $id ?>">Desaprobar</a>  </div>
           </div>
          </div>
          <?php 
          }
          ?>
        </div>
      </div>
    </section>
</body>
</html>