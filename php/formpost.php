<?php
include("../includes/conexion.php");


$emailUsuario=$_POST['email'];
$conUsuario=$_POST['password'];

$sqlid="SELECT idUsuario FROM usuarios WHERE emailUsuario='$emailUsuario'";
$resultadoid=mysqli_query($conex,$sqlid);
$id=mysqli_fetch_array($resultadoid);

session_start();
$_SESSION['id']=$id['idUsuario'];


$consulta="SELECT * FROM usuarios WHERE emailUsuario='$emailUsuario' AND conUsuario='$conUsuario'";
$resultado=mysqli_query($conex,$consulta);
$tabla=mysqli_fetch_array($resultado);

    
      if($tabla){
        echo "<script>window.location.href='../index.php';</script>";
        
      }else{

         echo "<script>alert('USTED NO ES USUARIO');</script>";
         echo "<script>window.location.href='../html/usuario.html';</script>";

         mysqli_free_result($resultado);
         mysqli_close($conex);
      }
?>
     

 

