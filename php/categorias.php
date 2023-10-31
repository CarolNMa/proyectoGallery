<?php
include("../includes/conexion.php");

    if(isset($_GET['categoria'])){
    $categoria=$_GET['categoria'];
    $sql="SELECT imagenes.foto, imagenes.nombre, imagenes.desa FROM imagenes WHERE idCategoria='$categoria' ORDER BY RAND()";
    $result=$conex->query($sql);
    }else{
      $sql="SELECT foto, valoracion FROM imagenes ORDER BY RAND()";
      $result=$conex->query($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../boostrap/bootstrap513/css/bootstrap.min.css">
    <link rel="stylesheet" href="../boostrap/bootstrap513/js/bootstrap.bundle.js">
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
      <form method="POST" action="categorias.php">
        <a class="navbar-brand" href="../index.php">Gallery International</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
             <a class="nav-link" href="../php/categorias.php?categoria=1">Animales <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../php/categorias.php?categoria=2">Sitios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../php/categorias.php?categoria=3">Platos internacionales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../php/categorias.php?categoria=4">Arquitectura</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../php/categorias.php?categoria=5">Eventos</a>
              </li>
          
             
          </ul>
        </div>
      </form>
      </nav>
      <section>
      <div class="container mt-3 ">
        <div class="row h-25">
         
          <?php
          if(isset($_GET['categoria'])){
          while ($row = mysqli_fetch_assoc($result)) {
            $ruta_imagen = $row['foto'];
            $descrip = $row['nombre'];
          
          ?>
          <div class="col-md-4 mb-1">
            <div class="card mb-4 shadow-lg custom-div  bg-white  ">
              <img src="../images/<?php echo $ruta_imagen ?>" class="imagen" alt="Galeria">
              <div class="container">
                <h3 class="text-primary"><?php echo $descrip ?> </h3>
                
           
             
          </div>
           </div>
          </div>
          <?php 
          }
          }else{
            while ($row = mysqli_fetch_assoc($result)) {
             $ruta_imagen = $row['foto']; 
            
          ?>
            <div class="col-md-4 mb-1">
             <div class="card mb-4 shadow-lg custom-div  bg-white  ">
               <img src="../images/<?php echo $ruta_imagen ?>" class="imagen" alt="Galeria">
           
             </div>
           </div>

          <?php  
           }}
          ?>
        </div>
      </div>
        
      </section>
    
    </body>
  </html>    