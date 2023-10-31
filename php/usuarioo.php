<?php 
include("../includes/conexion.php");
session_start();

$nombreUsuario="";

if(isset($_SESSION['id'])){
  $id=$_SESSION['id'];

  $sql="SELECT nomUsuario FROM usuarios WHERE idUsuario='$id'";
  $consulta=mysqli_query($conex,$sql);
  $resultado=mysqli_fetch_array($consulta);

  $nombreUsuario=$resultado['nomUsuario'];

    $sql2= "SELECT * FROM categorias";
    $result=mysqli_query($conex,$sql2);
}else{
  //echo "<script>alert('Inicie sesión para acceder a más contenido');</script>";//
}

if($_SERVER["REQUEST_METHOD"]==="POST"){
  if(isset($_POST["enviar"])){
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $foto=$_FILES['file']['name'];
    $categoria=$_POST['categoria'];
    
    if(isset($foto)&& $foto != ""){
      $tipo = $_FILES['file']['type'];
      $temp = $_FILES['file']['tmp_name'];

      if( !((strpos($tipo, 'png') || strpos($tipo,'jpeg') || strpos($tipo, 'webp') || strpos($tipo, 'jpg') ))){
        
        echo "<script>alert('Tipo de foto inválido'); </script>";
      }else{
        
        $sql="INSERT INTO `imagenes`(`idimagen`, `idCategoria`, `foto`, `nombre`, `desa`,`idUsuario`, `valoracion`, `estado`) VALUES ('','$categoria','$foto','$nombre','$descripcion','$id','0','0')";
        $consulta=$conex->query($sql);
        if($consulta){
          move_uploaded_file($temp,'../images/'.$foto);
          echo "<script>alert('Foto subida exitosamente'); </script>";

        }
      }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="/boostrap/bootstrap513/css/bootstrap.min.css">
   <link rel="stylesheet" href="/boostrap/bootstrap513/js/bootstrap.bundle.js">
    <link rel="stylesheet" href="css/galeria.css">
    <title>Gallery international</title>
  
</head>
<body>
   
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../index.php">Bienvenido usuario</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-contro9ls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">      
            <button class="btn btn-primary " onclick="mostraralerta()">Salir</button>
    </div>
    <script>
      function mostraralerta(){
        if (confirm("¿desea salir?")){
          window.location.href = "..//index.php"
        }
      }
      </script>
                
    
   <?php echo " <p class='text-light m-3'>",$nombreUsuario,"</p>" ?>
  </nav>   
  <div class="container w-100 d-flex flex-row  rounded-3 mt-5">
    <form class=" bg-success w-50 p-5 rounded-3 " method="POST" enctype="multipart/form-data">
    <div class="mb-1 text-white text-center">
      <h2>Envianos tu foto favorita</h2>
    </div>
    <div class="mb-3">
      <label for="text"class="form-label">Categoria</label>
      <select name="categoria" id="categoria">
          <?php
           
           while ($row = mysqli_fetch_assoc($result)) {
          
       
          ?>
           <option value="<?php echo $row['idCategoria']  ?>"><?php echo $row['descripcion'] ?></option>
           <?php
           
           }
           ?>
      </select>
   

    </div>
    <div class="mb-1">
      <label for="email"class="form-label">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="mb-1">
      <label for="email"class="form-label">Descripción</label>
      <input type="text" class="form-control" id="descripcion" name="descripcion" required>
    </div>
    <div class="mb-1">
      <label for="file"class="form-label">Ingrese su Archivo</label>
      <input type="file" class="form-control" id="file" name="file" required>
    </div>
    <div class="text-center">
      <input type="submit" class="form_submit p-1 mt-2 btn-primary" value="enviar" name="enviar"></input>
    </div>
    </form>
   

    </div>
  </div> 
</body>
  
  
  
  
  
  
  