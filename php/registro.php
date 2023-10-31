<?php
    include("../includes/conexion.php");

    $idUsuario = $_POST['idUsuario'];
    $nomUsuario = $_POST['nomUsuario'];
    $conUsuario = $_POST['conUsuario'];
    $emailUsuario = $_POST['email'];


   $sql = "INSERT INTO usuarios VALUES ('$idUsuario','$nomUsuario','$conUsuario','$email')";

   if (mysqli_query($conex,$sql)) {
    echo"Usuario Registrado";
    echo "<script>window.location.href='../index.php';</script>";

   }else {
    echo "Error".$sql .  "<br>" . mysqli_error($conex);  
   }
    
?>