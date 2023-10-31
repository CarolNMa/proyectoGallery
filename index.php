<?php 

include("./includes/conexion.php");

$sql="SELECT imagenes.foto, usuarios.nomUsuario, imagenes.nombre, imagenes.desa FROM imagenes,usuarios WHERE imagenes.estado='1' AND imagenes.idUsuario=usuarios.idUsuario ORDER BY RAND()";
$result=$conex->query($sql);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="boostrap/bootstrap513/css/bootstrap.min.css">
   <link rel="stylesheet" href="boostrap/bootstrap513/js/bootstrap.bundle.js">
   <link rel="stylesheet" href="boostrap/bootstrap513/js/bootstrap.js">
  <link rel="stylesheet" href="css/galeria.css">
   
    <title>Gallery international</title>
    <style>
        .imagen{
            height:300px;
            max-width:500px;
            
        }
        .contenedor{
            transition: transform 0.3s ease;

        }
        .contenedor:hover{
            transform: scale(1.10);
        }
    </style>
</head>
<body style="background-color:#63C5DA;">
   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Gallery International</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="php/login.php">Registro <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="php/categorias.php">Categorias</a>
            </li>
           
            
            
            
              <div class="container mt-1 ">
                <a class="navbar-brand mr-auto" href="php/iniciar.php" class="logolink">
                  <img src="images/logo.jpg" alt="Logo" class="logo-img">
                  
                </a>
              </div>
                  
            </li>
          </ul>
         
          <section class="container-fluid p-3">
     
          
        </div>
      </nav>
      <section class="container-fluid bg-primary bg-light p-5  col-sm">
         <h1 class="text-dark text-center ">Welcome to the International Gallery</h1>
         <h4 class="text-primary text-center">Nuestra galeria de imagenes en linea que celebra la
          diversidad y creatividad del mundo del arte, desde pinturas clasicas hasta fotografias
          contemporaneas y diseño grafico, innovador, nuestra galeria reune lo mejor de las expresiones visuales
         </h4>

      </section>
      <section class="container-fluid p-5">
    <div class="w-100 mt-3 ">
        <div class="row h-25">
         
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            $ruta_imagen = $row['foto'];
            $propietario = $row['nomUsuario'];
            $descrip = $row['nombre'];
            $desa = $row['desa'];
      
          
          ?>

           
            
         
          
          <div class="col-md-4 mb-1">
            <div class="card mb-4 shadow-lg custom-div  bg-white rounded contenedor " >
              <img src="./images/<?php echo $ruta_imagen ?>" class="imagen " alt="Galeria">
              <div class="container">
                <h3 class="text-primary"><?php echo $descrip ?></h3>
                <h6 class="text-dark"><?php echo $desa ?></h6>
                <h5 class="text-danger">Publicado por: <?php echo $propietario?></h5>
                
           
             
          </div>
              
           </div>
          </div>
          <?php 
          }
          ?>
        </div>
      </div>
    </section>
    <section class="container-fluid bg-ligth p-1">
    <a class="navbar-brand row justify-content-center" href="https://api.whatsapp.com/send?phone=+573144587196" target="_blank">
                  <img src="images/wari.png" alt="Logo" class="logo-img">
                  <a class="navbar-brand row justify-content-center" href="https://www.facebook.com/MelanyOrtiz" target="_blank">
                   <img src="images/face.jpg" alt="Logo" class="logo-img">
                  <a class="navbar-brand row justify-content-center" href="https://api.whatsapp.com/send?phone=+573144587196" target="_blank">
                  <img src="images/olll.png" alt="Logo" class="logo-img">
    </section>
 
                  


      



<?php 
session_abort();
?>
</body>
</html>