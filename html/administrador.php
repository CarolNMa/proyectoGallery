
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/boostrap/bootstrap513/css/bootstrap.min.css">
   <link rel="stylesheet" href="/boostrap/bootstrap513/js/bootstrap.bundle.js">
    <link rel="stylesheet" href="../PROYECTO FINAL/css/galeria.css">
   
    <title>Gallery international</title>
</head>
<body style="background-color:rgb(255, 255, 255)">
   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Gallery International</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
             
          
           
            
              
                
              </div>
            </li>
          </ul>
        </div>
      </nav>
         
      
     </div>
           <div class="container mt-5">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header text-center bg-primary">Iniciar Sesion</div>
                  <div class="card-body ">
                    <form action="../html/administrador.php" method="post">
                      <div class="form-group mb-2">
                        <label for="email">Correo Electronico</label>
                        <input type="email" name="email" id="email"  class="form-control" placeholder="Ingrese su Correo Electronico"></div>
                        <div class="form-group mb-2">
                          <label for="password">Contraseña</label>
                          <input type="password" class="form-control" name="password" id="password" placeholder="Ingrese su Contraseña"></div>
                          <div class="text-center">
                          <input type="submit" class="form_submit" value="Iniciar Sesion"></input>
                          </div>

                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
           </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include("../includes/conexion.php");

if($_SERVER['REQUEST_METHOD']=='POST'){


$emailUsuario=$_POST['email'];
$conUsuario=$_POST['password'];

$sqlid="SELECT idUsuario FROM usuarios WHERE emailUsuario='$emailUsuario'";
$resultadoid=mysqli_query($conex,$sqlid);

$id=mysqli_fetch_array($resultadoid);
if(($id)){
 
  session_start();
  $_SESSION['id']=$id['idUsuario'];
  
  
  $consulta="SELECT * FROM usuarios WHERE emailUsuario='$emailUsuario' AND conUsuario='$conUsuario'";
  $resultado=mysqli_query($conex,$consulta);
  $tabla=mysqli_fetch_array($resultado);
  
    if($tabla[3]==$emailUsuario && $tabla[2]==$conUsuario){  
     
      if($tabla[4]==1){
        echo "<script>window.location.href='../php/admin.php';</script>";
      }
      else{
        echo "<script>window.location.href='../php/usuarioo.php';</script>";
      }
    }
    else{
      // echo "<script>alert('USTED NO ES USUARIO');</script>";
      echo "<script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
      })
      </script>";
    }
}else{

  echo "<script>
  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  })
  </script>";
}
}
  
        // if($tabla){
        //   echo "<script>window.location.href='../php/usuarioo.php';</script>";
          
        // }else{
  
        //    echo "<script>alert('USTED NO ES USUARIO');</script>";
        //    echo "<script>window.location.href='../html/usuario.html';</script>";
  
        //    mysqli_free_result($resultado);
        //    mysqli_close($conex);
        // }

?>
     

 



     