<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/boostrap/bootstrap513/css/bootstrap.min.css">
    <link rel="stylesheet" href="/boostrap/bootstrap513/js/bootstrap.bundle.js">
   
    <title>Gallery international</title>
</head>
<body style="background-color:#63C5DA;">
   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Gallery International</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
           
            <li class="nav-item">
                <a class="nav-link" href="../php/categorias.php">Categorias</a>
              </li>
            
            </ul>
        </div>
    </nav>


           <div class="container mt-3">
            <div class="row justify-content-center">
             <div class="col-md-6">
                <form action="../php/login.php" method="post">
                    <div class="container rounded p-4 bg-secondary">
                   
                        <div class="mb-1 text-white">
                          <h2>Registro de Usuario</h2>
                          </div>
                           <div>
                            <label for="username"class="form-label">Ingrese su Id</label>
                            <input type="text" class="form-control"  id="usuario" name="usuario" required>
                        </div>
                        <div class="mb-1">
                          <label for="text"class="form-label">Ingrese su nombre y apellidos</label>
                          <input type="text" class="form-control" id="nombre" name="nombre" required>
                      </div>
                        <div class="mb-1">
                            <label for="email"class="form-label">Ingresa tu correo electronico</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-1">
                            <label for="password"class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="clave" name="clave" required>
                        </div>
                      
                      
                          <div class="text-center">
                            <input type="submit" class="btn btn-primary" value="Registrarse" name="registro"></input>
                            
                          </div>
                        </div>
                      </div>
                    </div>         
                  </div>    
                </form>
              </div>
            </div>
          </div>

                    
             </div>
            </div>
           </div>

           

</body>
<script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
  include('../includes/conexion.php');
  //include('php/controusu.php');//
  if($_SERVER['REQUEST_METHOD']=='POST'){

    if(empty($_POST["usuario"] ||  $_POST["nombre"]) || empty($_POST["email"]) || empty("clave")){
       echo"Está vacio";
    }else{

        
        $nombre=$_POST["nombre"];
        $id=$_POST["usuario"];
        $clave=$_POST["clave"];
        $correo=$_POST["email"];

        $sql2="SELECT idUsuario FROM usuarios";
        $result= $conex->query($sql2);     
        if($result->num_rows >0){
          $ids= array();
          while($row = $result->fetch_assoc()){
          $ids[] = $row["idUsuario"];
          }
        }else{
          echo "No se encontraron resultados";
        }
        $sql= $conex->query("INSERT INTO usuarios(idUsuario,nomUsuario,conUsuario,emailUsuario) VALUES('$id','$nombre','$clave','$correo')");
        if ($sql) {
          
          echo "<script>
         Swal.fire({
          icon: 'success',
          title: 'Genial',
          })
          
           echo <script>window.location.href='../index.php';</script> ';
         </script>";
          header("Location:../index.php");
        }else{
          echo "<script>
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
          })
          </script>";
        }
 
     }
    }
?>

                